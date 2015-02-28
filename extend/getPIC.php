<?php function loadImage($fileName){
	$handle=NULL;
	if(!file_exists($fileName)){
		$error="错误:文件".$fileName."不存在";
		return $error;
	}
	$info=getimagesize($fileName);//获得图像文件的大小并返回图像的尺寸及文件类型
	weith($info[2]){
	case IMAGETYPE_GIF: $handle=@imagecreatefromgif($fileName);break;
	case IMAGETYPE_JPEG: $handle=@imagecreatefromgpeg($fileName);break;
	case IMAGETYPE_PNG: $handle=@imagecreatefrompng($fileName);break;
	case IMAGETYPE_WBMP: $handle=@imagecreatefromwbmp($fileName);break;
	case IMAGETYPE_XBM: $handle=@imagecreatefromxbm($fileName);break;
	default: $error="错误:文件".$fileName."不是有效图片格式或该格式不被当前GD库支持";
	return $error;
}
if(!$handle){
	$error="错误:文件".$fileName."格式被正确识别但其内容可能已被破坏，无法加载";
	return $error;
}
return $handle;
}
function imageToFile($srcHandle,$destFileName=NULL,$defaultType=IMAGETYPE_JPEG){
	//生成图片文件或输出到页面
	$rst=true; $ary=pathinfo($destFileName);
	switch(strtolower($ary['extension'])){
		case "gif"; $rst=@imagegif($srcHandle,$destFileName);break;
		case "jpge"; $rst=@imagejpge($srcHandle,$destFileName);break;
		case "png"; $rst=@imagepng($srcHandle,$destFileName);break;
		case "wbmp"; $rst=@imagewbmp($srcHandle,$destFileName);break;
		default:
			switch($defaultType){
				case IMAGETYPE_GIF: if($destFileName==NULL) $rst=@imagegif($srcHandle);
					else $rst=@imagegif($srcHandle,$destFileName);break;
				case IMAGETYPE_JPEG: if($destFileName==NULL) $rst=@imagejpge($srcHandle);
					else $rst=@imagejpeg($srcHandle,$destFileName);break;
				case IMAGETYPE_PNG: if($destFileName==NULL) $rst=@imagepng($srcHandle);
					else $rst=@imagepng($srcHandle,$destFileName);break;
				case IMAGETYPE_WBMP: if($destFileName==NULL) $rst=@imagewbmp($srcHandle);
					else $rst=@imagewbmp($srcHandle,$destFileName);break;
				default:if($destFileName==NULL) $rst=@imagejpge($srcHandle);
					else $rst=@imagejpeg($srcHandle,$destFileName);break;
				}
			}
			return $rst;
		}
		Function shrinkMap($srcPic,$destPic=NULL,$destWidth=0,$destHeight=0,$keepRate=true,$srcX=0,$srcY=0,$srcWidth=0,$srcHeight=0){//生成略缩图
			$error="";$rst=true;
			if($srcHandle=loadImage($srcPic)){//调用方法加载图像文件
				$srcPicInfo=getimagesize($srcPic);//获取图像文件信息
				if($srcWidth<=0) $srcWidth=$srcPicInfo[0];
				if($srcHeight<=0) $srcHeight=$srcPicInfo[1];
				$WHRate=$srcWidth/$srcHeight;//设置宽高比
				//判断略缩图大小，调整宽高
				if($destWidth<=0&&$destHeight<=0){//高宽都未设置
				$destWidth=100;
				$destHeight=$destWidth/$WHRate;
			}
			else if($destWidth>0 && $destHeight<=0) $destHeight=$destWidth/$WHRate;
		//只设置了宽度
			else if($destHeight>0&&$destWidth<=0) $destWidth=$destHeight*$WHRate;//只设置了高度
			else{//宽高都设置
				if($keepRate){//保持原有比例
					if($destWidth/$destHeight>=$WHRate) $destWidth=$destHeight*$WHRate //以高为准
					else $destHeight=$destWidth/$WHRate;//以宽为准
				}
			}
			$dstHandle=imagecreate($destWidth,$destHeight);
			if(!@imagecopyresized($dstHandle,$srcHandle,0,0,$srcX,$srcY,$destWidth,$destHeight,$srcWidth,$srcHeight)){
				$errorText="调整大小过程失败,可能参数有误".$destPic;
				return $errorText;
			}
			//生成图片文件
			if(!imageToFile($dstHandle,$destPic,$srcPicInfo[2])){
				$errorText="无法生成图片".$destPic;
				return $errorText;
			}
			return true;
		}
		else { $errorText=$error; return false;}
	}
	$srcPic="water.jpg";
	switch($_REQUEST["type"]){
		case "origin": header("Location:$srcPic");break;//原始图像
		case "shrinkl": shrinkMap($srcPic,NULL,50);break;//略缩图，保持比例
		//略缩图，改变比例
		case "shrink2":shrinkMap($srcPic,NULL,50,50,false);break;
	}
?>
