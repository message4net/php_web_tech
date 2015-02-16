create database chat;
create table user (name varchar(20),password varchar(20),is_online set('1','0'));
create table chatroom (id int(11) auto_increment,author varchar(20),chattime timestamp,emotion varchar(20),action varchar(20),color varchar(20),text text,primary key (id));