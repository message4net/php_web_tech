#create database bookshop;
#create table book_class (book_class_id int(5) auto_increment,book_class_name varchar(30),book_type_id int(12), primary key (book_class_id));
#create table book_type (book_type_id int(4) auto_increment,book_type_name varchar(30), primary key (book_type_id));
#create table book_hot (hot_ID int(10) auto_increment,book_ID int(10),hot_order int(10),primary key (hot_ID));
#create table book_recommend (recom_ID int(10) auto_increment,book_ID int(10),recom_order int(10),primary key (recom_ID));
#create table book_new (new_ID int(10) auto_increment,book_ID int(10),new_order int(10),primary key (new_ID));
create table book_inf (bookid int(12) auto_increment,
book_no varchar(30),
book_name varchar(40),
author varchar(30),
publisher varchar(40),
pub_date datetime,
price float,
price_m float,
price_l_price float,
book_storenum int(4),
book_class_id int(5),
book_type_id int(4),
book_index mediumtext default null,
book_abstract mediumtext default null,
book_level tinyint(1) default '1',
book_level_pic varchar(255),
book_pic varchar(255),
input_date datetime,
book_bs varchar(2),
book_view int(10),
primary key (bookid));
create table book_cart (chat_ID int(12) auto_increment,
user_ID varchar(30),
book_ID int(12),
chat_session_ID varchar(32),
buy_num int(12) default '1',
order_ID int(10) default '0',
cart_time int(12),
primary key (chat_ID));
create table order_info (
order_ID int(10) auto_increment,
user_name varchar(30),
order_post varchar(10),
order_addr varchar(255),
order_phone varchar(20),
order_mail varchar(30),
order_send tinyint(2),
order_num int(4),
order_money float default '0.00',
order_state tinyint(2) default '0',
order_time timestamp default CURRENT_TIMESTAMP,
order_not text,
primary key (order_ID));
create table user_message (M_ID int(10) auto_increment,
book_ID int(10),
user_ID varchar(30),
message_content text,
message_time int(12),
primary key (M_ID));
create table order_send (send_ID int(10) auto_increment,
order_send tinyint(2),
primary key (send_ID));
create table order_fmoney (fmoney_ID int(10) auto_increment,
order_fmoney tinyint(2),
primary key (fmoney_ID));
