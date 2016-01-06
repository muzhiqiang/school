drop database if exists sms;

create database sms character set utf8;

use sms;

create table teacher_basic_info(
	tea_id int not null,
	tea_name varchar(20),
	sex char(1) default 'm',
	rank varchar(20),
	entry_time varchar(20),
	authority varchar(20),
	primary key(tea_id)
)DEFAULT CHARSET=utf8; 


create table emp_basic_info(
	sta_id int not null,
	sta_name varchar(20),
	sex char(1) default 'm',
	entry_time varchar(20),
	position varchar(20),
	power varchar(10),
	primary key(sta_id)
)DEFAULT CHARSET=utf8;

create table message(
	message_id varchar(20),
	message_title varchar(30),
	message_text varchar(300),
	primary key (message_id)
)DEFAULT CHARSET=utf8;

create table teacher_award(
	award_id int auto_increment,
	tea_id int,
	award_time varchar(20),
	award_name varchar(20),
	verify_statue varchar(20),
	award_intro varchar(300),
	primary key(award_id),
	constraint teacher_award_fk foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;

create table class(
	class_id int auto_increment,
	dept varchar(20),
	grade varchar(20),
	year varchar(10),
	class_name varchar(10),
	major varchar(20),
	sta_id int,
	intro varchar(300),
	primary key(class_id),
	constraint class_fk foreign key(sta_id) references emp_basic_info(sta_id)
)DEFAULT CHARSET=utf8;

create table stu_basic_info(
	stu_id int not null,
	stu_name varchar(20),
	sex char(1) default 'm',
	class_id int,
	primary key(stu_id),
	constraint stu_basic_info_fk foreign key(class_id) references class(class_id) 
)DEFAULT CHARSET=utf8;

create table class_leader(
	class_id int,
	stu_id int,
	is_monitor int(1),
	position varchar(10),
	power varchar(10),
	primary key(class_id,stu_id),
	constraint class_leader_fk1 foreign key(class_id) references class(class_id),
	constraint class_leader_fk2 foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;


create table stu_union(
	group_id int auto_increment,
	group_name varchar(20),
	intro varchar(300),
	primary key(group_id)
)DEFAULT CHARSET=utf8;

create table stu_union_member(
	group_id int,
	stu_id int,
	is_leader int(1),
	gro_position varchar(20),
	power varchar(10),
	constraint stu_union_member_fk1 foreign key(group_id) references stu_union(group_id),
	constraint stu_union_member_fk2 foreign key(stu_id) references stu_basic_info(stu_id),
	primary key(group_id,stu_id)
)DEFAULT CHARSET=utf8;

create table stu_union_act(
	act_id int auto_increment,
	group_id int,
	act_name varchar(12),
	act_time varchar(20),
	act_position varchar(20),
	intro varchar(300),
	primary key(act_id),
	constraint stu_union_act_fk foreign key(group_id) references stu_union(group_id)
)DEFAULT CHARSET=utf8;

create table res_group(
	res_group_id int auto_increment,
	res_group_name varchar(20),
	tea_id int,
	project varchar(20),
	intro varchar(300),
	primary key(res_group_id),
	constraint res_group_fk foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;

create table res_member(
	member_id varchar(20),
	res_group_id int,
	member_type varchar(20),
	stu_id int,
	tea_id int,
	power varchar(20),
	primary key(member_id),
	constraint res_member_fk1 foreign key(tea_id) references teacher_basic_info(tea_id),
	constraint res_member_fk2 foreign key(stu_id) references stu_basic_info(stu_id),
	constraint res_member_fk3 foreign key(res_group_id) references res_group(res_group_id)
)DEFAULT CHARSET=utf8;




create table res_group_log(
	log_id int auto_increment,
	res_group_id int,
	create_date varchar(20),
	update_date varchar(20),
	member_id varchar(20),
	log_content varchar(120),
	primary key(log_id),
	constraint res_group_log_fk1 foreign key(res_group_id) references res_group(res_group_id),
	constraint res_group_log_fk2 foreign key(member_id) references res_member(member_id)
	
)DEFAULT CHARSET=utf8;





create table stu_award(
	stu_id int,
	award_time varchar(20),
	award_name varchar(20),
	award_intro varchar(300),
	verify_statue varchar(20),
	award_id int auto_increment,
	primary key(award_id),
	constraint stu_award_fk foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table course(
	course_id int auto_increment,
	course varchar(20),
	tea_id int,
	classroom varchar(20),
	teach_time varchar(20),
	total_time varchar(20),
	course_year_term varchar(10),
	property varchar(20),
	credit varchar(10),
	intro varchar(300),
	primary key(course_id),
	constraint course_fk foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;

create table stu_course(
	course_id int,
	stu_id int,
	score varchar(10),
	is_fail char(1) default 0,
	is_evaluate tinyint(1) NOT NULL default 0,	
	primary key(course_id,stu_id),
	constraint stu_course_fk1 foreign key(course_id) references course(course_id),
	constraint stu_course_fk2 foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table stu_evaluate(
	stu_id int,
	course_year_term varchar(10),
	avg_score float(6,4),
	gain_credit int(10),
	gpd float(6,4),
	class_rank int(5),
	grade_rank int(5),
	fail_num int(4),
	primary key(stu_id,course_year_term),
	constraint stu_evaluate_fk foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table stu_identification_info(
	stu_id int,
	loc varchar(10),
	birth varchar(20),
	id_no varchar(18),
	race varchar(10),
	polit varchar(10),
	native_place varchar(20),
	tel varchar(20),
	health varchar(10),
	enroll_time varchar(20),
	intro varchar(300),
	password varchar(40),
	primary key(stu_id),
	constraint stu_id_info_fk foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table teacher_identification_info(
	tea_id int,
	address varchar(50),
	birth varchar(20),
	id_no varchar(18),
	race varchar(10),
	polit varchar(10),
	native_place varchar(20),
	tel varchar(20),
	health varchar(10),
	experience varchar(120),
	intro varchar(300),
	password varchar(40),
	primary key(tea_id),
	constraint teacher_identification_info_fk foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;


create table res_group_achievement(
	result_id int auto_increment,
	res_group_id int,
	result_time varchar(20),
	result_intro varchar(300),
	verify_statue varchar(20),
	tea_id int,
	primary key(result_id),
	constraint res_group_achievement_fk1 foreign key(res_group_id) references res_group(res_group_id),
	constraint res_group_achievement_fk2 foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;




create table message_interconnect(
	trans_id int auto_increment,
	message_id varchar(20),
	src_type varchar(10),
	src_stu_id int,
	tar_type varchar(10),
	tar_stu_id int,
	send_time varchar(20),
	primary key(trans_id),
	constraint message_interconnect_fk1 foreign key(message_id) references message(message_id),
	constraint message_interconnect_fk2 foreign key(src_stu_id) references stu_basic_info(stu_id),
	constraint message_interconnect_fk3 foreign key(src_stu_id) references teacher_basic_info(tea_id),
	constraint message_interconnect_fk4 foreign key(src_stu_id) references stu_union(group_id),
	constraint message_interconnect_fk5 foreign key(src_stu_id) references res_group(res_group_id),
	constraint message_interconnect_fk6 foreign key(src_stu_id) references emp_basic_info(sta_id),
	constraint message_interconnect_fk7 foreign key(src_stu_id) references class(class_id)
)DEFAULT CHARSET=utf8;


create table emp_identification_info(
	sta_id int,
	address varchar(50),
	birth varchar(20),
	id_no varchar(18),
	race varchar(10),
	polit varchar(10),
	native_place varchar(20),
	tel varchar(20),
	health varchar(10),
	experience varchar(120),
	intro varchar(300),
	password varchar(40),
	primary key(sta_id),
	constraint emp_identification_info_fk foreign key(sta_id) references emp_basic_info(sta_id)
)DEFAULT CHARSET=utf8;

create table evaluate(
	eva_id int auto_increment,
  	eva_year_term varchar(10) DEFAULT NULL,
  	is_over tinyint(1) NOT NULL DEFAULT '0',
	primary key(eva_id)
)DEFAULT CHARSET=utf8;

create table evaluate_list(
	eva_one_id int auto_increment,
	eva_id int,
	eva_stu_id int,
	score int(4),
	context varchar(300),
	time varchar(20),
	eva_course_id int(11),
	primary key (eva_one_id),
	constraint evaluate_list_fk1 foreign key (eva_id) references evaluate (eva_id),
	constraint evaluate_list_fk2 foreign key (eva_stu_id) references stu_basic_info (stu_id)
)DEFAULT CHARSET=utf8;

create table financial_report(
	req_id int auto_increment,
	req_type varchar(10),
	req_res_group_id int,
	req_time varchar(20),
	req_money int(10),
	req_intro varchar(300),
	verify_statue varchar(20),
	verify_time varchar(20),
	sta_id int,
	primary key(req_id),
	constraint financial_report_fk foreign key(req_res_group_id) references teacher_basic_info(tea_id)
	
)DEFAULT CHARSET=utf8;

create table financial_account(
	money_id int auto_increment,
	money_time varchar(20),
	get_in_from varchar(20),
	in_out varchar(10),
	cur_money int(30),
	intro varchar(300),
	sta_id int,
	req_id int,
	primary key (money_id),
	constraint financial_account_fk1 foreign key(sta_id) references emp_basic_info(sta_id),
	constraint financial_account_fk2 foreign key(req_id) references financial_report(req_id) 
)DEFAULT CHARSET=utf8;

