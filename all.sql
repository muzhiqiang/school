drop database if exists sms;

create database sms character set utf8;

use sms;

create table teacher_basic_info(
	tea_id varchar(12),
	tea_name varchar(20),
	sex char(1) default 'm',
	rank varchar(20),
	enrty_time date,
	authority varchar(20),
	primary key(tea_id)
)DEFAULT CHARSET=utf8; 

create table stu_union_member(
	group_id varchar(20),
	stu_no varchar(12),
	is_leader int(1),
	gro_position varchar(20),
	power varchar(10),
	primary key(group_id,stu_no)
)DEFAULT CHARSET=utf8;

create table stu_union(
	group_id varchar(20),
	group_name varchar(20),
	intro varchar(300),
	primary key(group_id)
)DEFAULT CHARSET=utf8;

create table emp_basic_info(
	sta_id varchar(20) not null,
	sta_name varchar(20),
	sex char(1) default 'm',
	enrty_time date,
	position varchar(20),
	power varchar(10),
	primary key(sta_id)
)DEFAULT CHARSET=utf8;

create table message(
	message_id varchar(20),
	message_text varchar(300),
	primary key (message_id)
)DEFAULT CHARSET=utf8;

create table stu_union_act(
	act_id varchar(20),
	group_id varchar(20),
	act_name varchar(12),
	act_time date,
	act_position varchar(20),
	intro varchar(300),
	primary key(act_id),
	constraint stu_union_act_fk foreign key(group_id) references stu_union(group_id)
)DEFAULT CHARSET=utf8;

create table teacher_award(
	award_id varchar(12),
	tea_id varchar(20),
	award_time date,
	award_name varchar(20),
	verify_statue varchar(20),
	primary key(award_id),
	constraint teacher_award_fk foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;

create table class(
	class_id varchar(20),
	dept varchar(20),
	grade varchar(20),
	year varchar(10),
	class_name varchar(10),
	major varchar(20),
	sta_id varchar(20),
	intro varchar(300),
	primary key(class_id),
	constraint class_fk foreign key(sta_id) references emp_basic_info(sta_id)
)DEFAULT CHARSET=utf8;

create table stu_basic_info(
	stu_id varchar(20) not null ,
	stu_name varchar(20),
	sex char(1) default 'm',
	class_id varchar(20),
	primary key(stu_id),
	constraint stu_basic_info_fk foreign key(class_id) references class(class_id) 
)DEFAULT CHARSET=utf8;

create table class_leader(
	class_id varchar(20),
	stu_id varchar(20),
	is_monitor int(1),
	position varchar(10),
	power varchar(10),
	primary key(class_id,stu_id),
	constraint class_leader_fk1 foreign key(class_id) references class(class_id),
	constraint class_leader_fk2 foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table res_group(
	res_group_id varchar(10),
	res_group_name varchar(20),
	tea_id varchar(20),
	project varchar(20),
	intro varchar(300),
	primary key(res_group_id),
	constraint res_group_fk foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;

create table res_member(
	member_id varchar(20),
	res_group_id varchar(10),
	member_type varchar(20),
	stu_id varchar(20),
	tea_id varchar(20),
	power varchar(20),
	primary key(member_id),
	constraint res_member_fk1 foreign key(tea_id) references teacher_basic_info(tea_id),
	constraint res_member_fk2 foreign key(stu_id) references stu_basic_info(stu_id),
	constraint res_member_fk3 foreign key(res_group_id) references res_group(res_group_id)
)DEFAULT CHARSET=utf8;




create table res_group_log(
	log_id varchar(20),
	res_group_id varchar(20),
	create_date date,
	update_date date,
	member_id varchar(20),
	log_content varchar(120),
	primary key(log_id),
	constraint res_group_log_fk1 foreign key(res_group_id) references res_group(res_group_id),
	constraint res_group_log_fk2 foreign key(member_id) references res_member(member_id)
	
)DEFAULT CHARSET=utf8;





create table stu_award(
	award_id varchar(20),
	stu_no varchar(12),
	award_time date,
	award_name varchar(20),
	award_intro varchar(300),
	award_rank varchar(10),
	verify_statue varchar(20),
	primary key(award_id),
	constraint stu_award_fk foreign key(stu_no) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table course(
	course varchar(20),
	course_id varchar(20),
	teacher_id varchar(20),
	classroom varchar(20),
	teach_time varchar(20),
	total_time int(10),
	course_year_term varchar(10),
	property varchar(20),
	credit int(5),
	intro varchar(300),
	primary key(course_id),
	constraint course_fk foreign key(teacher_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;

create table stu_course(
	course_id varchar(20),
	stu_id varchar(12),
	score varchar(10),
	is_fail char(1) default 0,
	primary key(course_id,stu_id),
	constraint stu_course_fk1 foreign key(course_id) references course(course_id),
	constraint stu_course_fk2 foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table stu_evaluate(
	stu_id varchar(12),
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
	stu_id varchar(12) not null,
	loc varchar(10),
	birth date,
	id_no varchar(18),
	race varchar(10),
	polit varchar(10),
	native_place varchar(20),
	tel varchar(20),
	health varchar(10),
	enroll_time date,
	intro varchar(300),
	password varchar(40),
	primary key(stu_id),
	constraint stu_id_info_fk foreign key(stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;

create table teacher_identification_info(
	tea_id varchar(12),
	address varchar(50),
	birth date,
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
	result_id varchar(20),
	res_group_id varchar(20),
	result_time date,
	result_intro varchar(300),
	verify_statue varchar(20),
	tea_id varchar(20),
	primary key(result_id),
	constraint res_group_achievement_fk1 foreign key(res_group_id) references res_group(res_group_id),
	constraint res_group_achievement_fk2 foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;









create table message_interconnect(
	trans_id varchar(20),
	message_id varchar(20),
	src_type varchar(10),
	src_stu_id varchar(20),
	tar_type varchar(10),
	tar_stu_id varchar(20),
	send_time date,
	primary key(trans_id),
	constraint message_interconnect_fk1 foreign key(message_id) references message(message_id),
	constraint message_interconnect_fk2 foreign key(src_stu_id) references stu_basic_info(stu_id),
	constraint message_interconnect_fk3 foreign key(src_stu_id) references teacher_basic_info(tea_id),
	constraint message_interconnect_fk4 foreign key(src_stu_id) references stu_union(group_id),
	constraint message_interconnect_fk5 foreign key(src_stu_id) references res_group(res_group_id),
	constraint message_interconnect_fk6 foreign key(src_stu_id) references emp_basic_info(sta_id),
	constraint message_interconnect_fk7 foreign key(tar_stu_id) references stu_basic_info(stu_id)
)DEFAULT CHARSET=utf8;


create table emp_identification_info(
	tea_id varchar(12),
	address varchar(50),
	birth date,
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
	constraint emp_identification_info_fk foreign key(tea_id) references teacher_basic_info(tea_id)
)DEFAULT CHARSET=utf8;

create table evaluate(
	eva_id varchar(20),
	eva_name varchar(20),
	eva_type varchar(10),
	tar_res_group_id varchar(20),
	primary key(eva_id),
	constraint evaluate_fk1 foreign key(tar_res_group_id) references res_group(res_group_id)
)DEFAULT CHARSET=utf8;

create table evaluate_list(
	eva_one_id varchar(20),
	eva_id varchar(20),
	eva_stu_id varchar(20),
	score int(4),
	context varchar(300),
	time date,
	primary key (eva_one_id),
	constraint evaluate_list_fk1 foreign key (eva_id) references evaluate (eva_id),
	constraint evaluate_list_fk2 foreign key (eva_stu_id) references stu_basic_info (stu_id)
)DEFAULT CHARSET=utf8;

create table financial_report(
	req_id varchar(20),
	req_type varchar(10),
	req_res_group_id varchar(20),
	req_time date,
	req_money int(10),
	req_intro varchar(300),
	verify_statue varchar(20),
	verify_time date,
	sta_id varchar(20),
	primary key(req_id),
	constraint financial_report_fk foreign key(req_res_group_id) references teacher_basic_info(tea_id)
	
)DEFAULT CHARSET=utf8;

create table financial_account(
	money_id varchar(20),
	money_time date,
	get_in_from varchar(20),
	in_out varchar(10),
	cur_money int(30),
	intro varchar(300),
	sta_id varchar(20),
	req_id varchar(20),
	primary key (money_id),
	constraint financial_account_fk1 foreign key(sta_id) references emp_basic_info(sta_id),
	constraint financial_account_fk2 foreign key(req_id) references financial_report(req_id) 
)DEFAULT CHARSET=utf8;

