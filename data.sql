use sms;

insert into emp_basic_info values(110, '琪琪', 'f', '1', '2010/1/1', '1');
insert into emp_identification_info values(110, '华工', '1989/1/1', '445121','汉族', '党员', '揭阳', '18819451370', '癌症晚期', '研究生', '', '000000');
insert into class(dept, grade, year, class_name, major, sta_id, intro) values('妓院', '大三', '2013', '饥渴2', '饥渴', 110, '');
insert into stu_basic_info values(2013119, '吴某', '女', '1');
insert into stu_identification_info values(2013119, '华工', '1994/1/1', '445121', '汉族', '团员', '隆江', '18819451370', '健康', '2013/9/1', '', '0000000');

insert into teacher_basic_info values(210, 'MJ', '男', '1', '2000/1/1', '1');
insert into teacher_identification_info values(210, '华工', '1980/1/1', '4455', '汉族', '党员', '广东', '188888', '健康', '博士', '', '000000');
insert into course (course, tea_id, classroom, teach_time, total_time, course_year_term, property, credit, intro) values('java', 210, 'A1-101', '112', '第4周-第10周', '20151', '必修', '4', '');
insert into course (course, tea_id, classroom, teach_time, total_time, course_year_term, property, credit, intro) values('C++', 210, 'A1-101', '134', '第10周-第20周', '20151', '必修', '4', '');
insert into course (course, tea_id, classroom, teach_time, total_time, course_year_term, property, credit, intro) values('php', 210, 'A1-101', '256', '第1周-第20周', '20151', '必修', '4', '');
insert into course (course, tea_id, classroom, teach_time, total_time, course_year_term, property, credit, intro) values('数据库', 210, 'A1-101', '378', '第1周-第15周', '20151', '必修', '4', '');
insert into course (course, tea_id, classroom, teach_time, total_time, course_year_term, property, credit, intro) values('软件工程', 210, 'A1-101', '434', '第1周-第9周', '20151', '必修', '4', '');
insert into stu_award (stu_id, award_time, award_name, award_intro, award_rank, verify_statue) values(2013119, '20141', 'C++设计大赛', '', '安慰奖', '未通过');
insert into stu_award (stu_id, award_time, award_name, award_intro, award_rank, verify_statue) values(2013119, '20141', 'java设计大赛', '', '安慰奖', '未通过');
insert into stu_award (stu_id, award_time, award_name, award_intro, award_rank, verify_statue) values(2013119, '20151', 'php设计大赛', '', '安慰奖', '未通过');

insert into stu_course(course_id, stu_id, score, is_fail) values(1, 2013119, 0, 0);
insert into stu_course(course_id, stu_id, score, is_fail) values(2, 2013119, 0, 0);
insert into stu_course(course_id, stu_id, score, is_fail) values(3, 2013119, 0, 0);
insert into stu_course(course_id, stu_id, score, is_fail) values(4, 2013119, 0, 0);
insert into stu_course(course_id, stu_id, score, is_fail) values(5, 2013119, 0, 0);

insert into res_group(res_group_name, tea_id, project, intro) values('学创', 210, '', '');
insert into res_group(res_group_name, tea_id, project, intro) values('街舞', 210, '', '');
insert into res_member(member_id, res_group_id, member_type, stu_id, tea_id, power) values (1, 1, '部长', 2013119, 210, '');
insert into res_member(member_id, res_group_id, member_type, stu_id, tea_id, power) values (2, 2, '社员', 2013119, 210, '');

insert into res_group_log(res_group_id, create_date, update_date, member_id, log_content) values( 1, '2015/12/1', '2015/11/1', 1, '啦啦啦啦啦啦啦啦啦啦啦啦啦');
insert into class_leader(class_id, stu_id, is_monitor, position, power) values (1, 2013119, 0, '娱乐委员', '1');

insert stu_union(group_name, intro) values('社联', '');
insert stu_union_member(group_id, stu_id, is_leader, gro_position, power) values(1, 2013119, 0, '饮水机看守', 4);
