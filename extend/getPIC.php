<?php function loadImage($fileName){
	$handle=NULL;
	if(!file_exists($fileName)){
		$error="����:�ļ�".$fileName."������";
		return $error;
	}
	$info=getimagesize($fileName);//���ͼ���ļ��Ĵ�С������ͼ��ĳߴ缰�ļ�����
	weith($info[2]){
	case IMAGETYPE_GIF: $handle=@imagecreatefromgif($fileName);break;
	case IMAGETYPE_JPEG: $handle=@imagecreatefromgpeg($fileName);break;
	case IMAGETYPE_PNG: $handle=@imagecreatefrompng($fileName);break;
	case IMAGETYPE_WBMP: $handle=@imagecreatefromwbmp($fileName);break;
	case IMAGETYPE_XBM: $handle=@imagecreatefromxbm($fileName);break;
	default: $error="����:�ļ�".$fileName."������ЧͼƬ��ʽ��ø�ʽ������ǰGD��֧��";
	return $error;
}
if(!$handle){
	$error="����:�ļ�".$fileName."��ʽ����ȷʶ�������ݿ����ѱ��ƻ����޷�����";
	return $error;
}
return $handle;
}
function imageToFile($srcHandle,$destFileName=NULL,$defaultType=IMAGETYPE_JPEG){
	//����ͼƬ�ļ��������ҳ��
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
		Function shrinkMap($srcPic,$destPic=NULL,$destWidth=0,$destHeight=0,$keepRate=true,$srcX=0,$srcY=0,$srcWidth=0,$srcHeight=0){//��������ͼ
			$error="";$rst=true;
			if($srcHandle=loadImage($srcPic)){//���÷�������ͼ���ļ�
				$srcPicInfo=getimagesize($srcPic);//��ȡͼ���ļ���Ϣ
				if($srcWidth<=0) $srcWidth=$srcPicInfo[0];
				if($srcHeight<=0) $srcHeight=$srcPicInfo[1];
				$WHRate=$srcWidth/$srcHeight;//���ÿ�߱�
				//�ж�����ͼ��С���������
				if($destWidth<=0&&$destHeight<=0){//�߿�δ����
				$destWidth=100;
				$destHeight=$destWidth/$WHRate;
			}
			else if($destWidth>0 && $destHeight<=0) $destHeight=$destWidth/$WHRate;
		//ֻ�����˿��
			else if($destHeight>0&&$destWidth<=0) $destWidth=$destHeight*$WHRate;//ֻ�����˸߶�
			else{//��߶�����
				if($keepRate){//����ԭ�б���
					if($destWidth/$destHeight>=$WHRate) $destWidth=$destHeight*$WHRate //�Ը�Ϊ׼
					else $destHeight=$destWidth/$WHRate;//�Կ�Ϊ׼
				}
			}
			$dstHandle=imagecreate($destWidth,$destHeight);
			if(!@imagecopyresized($dstHandle,$srcHandle,0,0,$srcX,$srcY,$destWidth,$destHeight,$srcWidth,$srcHeight)){
				$errorText="������С����ʧ��,���ܲ�������".$destPic;
				return $errorText;
			}
			//����ͼƬ�ļ�
			if(!imageToFile($dstHandle,$destPic,$srcPicInfo[2])){
				$errorText="�޷�����ͼƬ".$destPic;
				return $errorText;
			}
			return true;
		}
		else { $errorText=$error; return false;}
	}
	$srcPic="water.jpg";
	switch($_REQUEST["type"]){
		case "origin": header("Location:$srcPic");break;//ԭʼͼ��
		case "shrinkl": shrinkMap($srcPic,NULL,50);break;//����ͼ�����ֱ���
		//����ͼ���ı����
		case "shrink2":shrinkMap($srcPic,NULL,50,50,false);break;
	}
?>
