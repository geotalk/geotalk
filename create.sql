DROP DATABASE IF EXISTS hack
;

CREATE DATABASE IF NOT EXISTS hack
;

USE hack
;

DROP TABLE IF EXISTS friends;
DROP TABLE IF EXISTS privacy;
DROP TABLE IF EXISTS tags;
DROP TABLE IF EXISTS post_tags;
DROP TABLE IF EXISTS location;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS block;
DROP TABLE IF EXISTS geode;
DROP TABLE IF EXISTS picture;

CREATE table friends(
friend_id	INT UNSIGNED NOT NULL AUTO_INCREMENT
,user_id1	VARCHAR(30)
,user_id2	VARCHAR(30)
,PRIMARY KEY (friend_id)
);


create table privacy(
v_id INT UNSIGNED NOT NULL AUTO_INCREMENT
,v_desc	VARCHAR(2000)
,PRIMARY KEY (v_id)
);

Create table tags(
tag_id INT UNSIGNED NOT NULL AUTO_INCREMENT
,tag	VARCHAR(2000)
,PRIMARY KEY (tag_id)
);

create table post_tags(
pt_id		INT UNSIGNED NOT NULL AUTO_INCREMENT
,tag_id		INT
,geode_id	INT 
,PRIMARY KEY (pt_id)
);

create table location(
location_id	INT UNSIGNED NOT NULL AUTO_INCREMENT
,latitude	DECIMAL(7,7)
,longitude	DECIMAL(7,7)
,PRIMARY KEY (location_id)
);

CREATE TABLE users(
user_id		INT UNSIGNED NOT NULL AUTO_INCREMENT
,profile_pic	VARCHAR(200)
,username	VARCHAR(30)
,pass		VARCHAR(30)
,description	VARCHAR(2000)
,notification	BOOLEAN
,PRIMARY KEY (user_id)
);

CREATE TABLE block(
block_id	INT UNSIGNED NOT NULL AUTO_INCREMENT
,u_id1		INT
,u_id2		INT 
,PRIMARY KEY (block_id)
);

CREATE TABLE geode(
geode_id	INT UNSIGNED NOT NULL AUTO_INCREMENT
,user_id		INT 
,pt_id		INT 
,location_id	INT
,geode_geode_id	INT
,post_text	VARCHAR(500)
,post_time	DATE
,rank		INT 
,PRIMARY KEY (geode_id)
);
	
CREATE TABLE picture(
picture_id	INT UNSIGNED NOT NULL AUTO_INCREMENT
,location_id	INT 
,geode_id	INT 
,url		VARCHAR(200)
,PRIMARY KEY (picture_id)
);