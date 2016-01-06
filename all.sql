-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-01-06 13:02:25
-- 服务器版本： 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- 表的结构 `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `dept` varchar(20) DEFAULT NULL,
  `grade` varchar(20) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  `class_name` varchar(10) DEFAULT NULL,
  `major` varchar(20) DEFAULT NULL,
  `sta_id` int(11) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `class`
--

INSERT INTO `class` (`class_id`, `dept`, `grade`, `year`, `class_name`, `major`, `sta_id`, `intro`) VALUES
(1, '计算机', '0', '2013', '计科2班', '计科', 20130002, '2013计算机计科2班'),
(2, '计算机', '0', '2015', '计科2班', '计科', 20130003, '2015计算机计科2班');

-- --------------------------------------------------------

--
-- 表的结构 `class_leader`
--

CREATE TABLE `class_leader` (
  `class_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `is_monitor` int(1) DEFAULT NULL,
  `position` varchar(10) DEFAULT NULL,
  `power` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course` varchar(20) DEFAULT NULL,
  `tea_id` int(11) DEFAULT NULL,
  `classroom` varchar(20) DEFAULT NULL,
  `teach_time` varchar(20) DEFAULT NULL,
  `total_time` varchar(20) DEFAULT NULL,
  `course_year_term` varchar(10) DEFAULT NULL,
  `property` varchar(20) DEFAULT NULL,
  `credit` varchar(10) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `course`
--

INSERT INTO `course` (`course_id`, `course`, `tea_id`, `classroom`, `teach_time`, `total_time`, `course_year_term`, `property`, `credit`, `intro`) VALUES
(1, 'C++语言程序设计', 54140001, 'A1301', '112', '第1周到第18周	', '20151', '必修课', '4.0', 'C++语言程序是程序猿的基础课程\r\n		'),
(2, 'Java程序设计', 54140002, 'A2302', '234', '第1周到第18周		', '20151', '辅修课', '3.0', 'Java程序设计，上过的人都说好\r\n		'),
(3, '数据库', 54140002, 'A1301', '356', '第1周到第18周	', '20151', '必修课', '4.0', '数据库是一门高深课程\r\n		'),
(4, '数据结构', 54140003, 'A2301', '378', '第1周到第18周	', '20151', '必修课', '4.0', '数据结构是一门高深课程\r\n		'),
(5, '算法设计', 54140004, 'A1201', '412', '第1周到第18周	', '20151', '必修课', '4.0', '算法设计是一门高深的课程\r\n		');

-- --------------------------------------------------------

--
-- 表的结构 `emp_basic_info`
--

CREATE TABLE `emp_basic_info` (
  `sta_id` int(11) NOT NULL,
  `sta_name` varchar(20) DEFAULT NULL,
  `sex` char(1) DEFAULT 'm',
  `entry_time` varchar(20) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  `power` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `emp_basic_info`
--

INSERT INTO `emp_basic_info` (`sta_id`, `sta_name`, `sex`, `entry_time`, `position`, `power`) VALUES
(20130001, '吴智强', '男', '2013', '教务员', ''),
(20130002, '陈明宇', '男', '2013', '辅导员', ''),
(20130003, '陈琦琦', '女', '2012', '辅导员', ''),
(20130004, '王大力', '男', '2014', '教务员', ''),
(20130344, '黄炳麟', '男', '2013', '办公室', '4');

-- --------------------------------------------------------

--
-- 表的结构 `emp_identification_info`
--

CREATE TABLE `emp_identification_info` (
  `sta_id` int(11) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `birth` varchar(20) DEFAULT NULL,
  `id_no` varchar(18) DEFAULT NULL,
  `race` varchar(10) DEFAULT NULL,
  `polit` varchar(10) DEFAULT NULL,
  `native_place` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `health` varchar(10) DEFAULT NULL,
  `experience` varchar(120) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `emp_identification_info`
--

INSERT INTO `emp_identification_info` (`sta_id`, `address`, `birth`, `id_no`, `race`, `polit`, `native_place`, `tel`, `health`, `experience`, `intro`, `password`) VALUES
(20130001, '广州', '2000/2/2', '445224200002021121', '汉', '党员', '广东', '18888888888', '良好', '大学本科', '', '000000'),
(20130002, '', '', '', '', '', '', '', '', '', '', '000000'),
(20130003, '', '', '', '', '', '', '', '', '', '', '000000'),
(20130004, '广州', '1945/4/4', '514862533485454758', '朝鲜族', '党员', '东北', '15687542106', '良好', '东北大学', '', '000000'),
(20130344, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '000000');

-- --------------------------------------------------------

--
-- 表的结构 `evaluate`
--

CREATE TABLE `evaluate` (
  `eva_id` int(11) NOT NULL,
  `eva_year_term` varchar(10) DEFAULT NULL,
  `is_over` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `evaluate_list`
--

CREATE TABLE `evaluate_list` (
  `eva_one_id` int(11) NOT NULL,
  `eva_id` int(11) DEFAULT NULL,
  `eva_stu_id` int(11) DEFAULT NULL,
  `score` int(4) DEFAULT NULL,
  `context` varchar(300) DEFAULT NULL,
  `time` varchar(20) DEFAULT NULL,
  `eva_course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `financial_account`
--

CREATE TABLE `financial_account` (
  `money_id` int(11) NOT NULL,
  `money_time` varchar(20) DEFAULT NULL,
  `get_in_from` varchar(20) DEFAULT NULL,
  `in_out` varchar(10) DEFAULT NULL,
  `cur_money` int(30) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL,
  `sta_id` int(11) DEFAULT NULL,
  `req_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `financial_report`
--

CREATE TABLE `financial_report` (
  `req_id` int(11) NOT NULL,
  `req_type` varchar(10) DEFAULT NULL,
  `req_res_group_id` int(11) DEFAULT NULL,
  `req_time` varchar(20) DEFAULT NULL,
  `req_money` int(10) DEFAULT NULL,
  `req_intro` varchar(300) DEFAULT NULL,
  `verify_statue` varchar(20) DEFAULT NULL,
  `verify_time` varchar(20) DEFAULT NULL,
  `sta_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE `message` (
  `message_id` varchar(20) NOT NULL,
  `message_title` varchar(30) DEFAULT NULL,
  `message_text` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `message_interconnect`
--

CREATE TABLE `message_interconnect` (
  `trans_id` int(11) NOT NULL,
  `message_id` varchar(20) DEFAULT NULL,
  `src_type` varchar(10) DEFAULT NULL,
  `src_stu_id` int(11) DEFAULT NULL,
  `tar_type` varchar(10) DEFAULT NULL,
  `tar_stu_id` int(11) DEFAULT NULL,
  `send_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `res_group`
--

CREATE TABLE `res_group` (
  `res_group_id` int(11) NOT NULL,
  `res_group_name` varchar(20) DEFAULT NULL,
  `tea_id` int(11) DEFAULT NULL,
  `project` varchar(20) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `res_group_achievement`
--

CREATE TABLE `res_group_achievement` (
  `result_id` int(11) NOT NULL,
  `res_group_id` int(11) DEFAULT NULL,
  `result_time` varchar(20) DEFAULT NULL,
  `result_intro` varchar(300) DEFAULT NULL,
  `verify_statue` varchar(20) DEFAULT NULL,
  `tea_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `res_group_log`
--

CREATE TABLE `res_group_log` (
  `log_id` int(11) NOT NULL,
  `res_group_id` int(11) DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `update_date` varchar(20) DEFAULT NULL,
  `member_id` varchar(20) DEFAULT NULL,
  `log_content` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `res_member`
--

CREATE TABLE `res_member` (
  `member_id` varchar(20) NOT NULL,
  `res_group_id` int(11) DEFAULT NULL,
  `member_type` varchar(20) DEFAULT NULL,
  `stu_id` int(11) DEFAULT NULL,
  `tea_id` int(11) DEFAULT NULL,
  `power` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `stu_award`
--

CREATE TABLE `stu_award` (
  `stu_id` int(11) DEFAULT NULL,
  `award_time` varchar(20) DEFAULT NULL,
  `award_name` varchar(20) DEFAULT NULL,
  `award_intro` varchar(300) DEFAULT NULL,
  `verify_statue` varchar(20) DEFAULT NULL,
  `award_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `stu_basic_info`
--

CREATE TABLE `stu_basic_info` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(20) DEFAULT NULL,
  `sex` char(1) DEFAULT 'm',
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stu_basic_info`
--

INSERT INTO `stu_basic_info` (`stu_id`, `stu_name`, `sex`, `class_id`) VALUES
(2013010001, '萝莉姐\r\n		', '女', 1),
(2013010002, '董阿朋\r\n		', '男', 1),
(2013010003, '洪阿狗\r\n		', '男', 1),
(2013010004, '谢阿杰\r\n		', '男', 1),
(2015020001, '林思宏\r\n		', '男', 2),
(2015020002, '陈耀培\r\n		', '男', 2),
(2015020003, '陈源\r\n		', '男', 2),
(2015020004, '林俊杰\r\n		', '男', 2),
(2015020005, '李涵\r\n		', '男', 2),
(2015020006, '林超\r\n		', '女', 2);

-- --------------------------------------------------------

--
-- 表的结构 `stu_course`
--

CREATE TABLE `stu_course` (
  `course_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `score` varchar(10) DEFAULT NULL,
  `is_fail` char(1) DEFAULT '0',
  `is_evaluate` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stu_course`
--

INSERT INTO `stu_course` (`course_id`, `stu_id`, `score`, `is_fail`, `is_evaluate`) VALUES
(1, 2015020001, '-1', '0', 0),
(2, 2015020001, '-1', '0', 0),
(3, 2015020001, '-1', '0', 0),
(4, 2015020001, '-1', '0', 0),
(5, 2015020001, '-1', '0', 0);

-- --------------------------------------------------------

--
-- 表的结构 `stu_evaluate`
--

CREATE TABLE `stu_evaluate` (
  `stu_id` int(11) NOT NULL,
  `course_year_term` varchar(10) NOT NULL,
  `avg_score` float(6,4) DEFAULT NULL,
  `gain_credit` int(10) DEFAULT NULL,
  `gpd` float(6,4) DEFAULT NULL,
  `class_rank` int(5) DEFAULT NULL,
  `grade_rank` int(5) DEFAULT NULL,
  `fail_num` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `stu_identification_info`
--

CREATE TABLE `stu_identification_info` (
  `stu_id` int(11) NOT NULL,
  `loc` varchar(10) DEFAULT NULL,
  `birth` varchar(20) DEFAULT NULL,
  `id_no` varchar(18) DEFAULT NULL,
  `race` varchar(10) DEFAULT NULL,
  `polit` varchar(10) DEFAULT NULL,
  `native_place` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `health` varchar(10) DEFAULT NULL,
  `enroll_time` varchar(20) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stu_identification_info`
--

INSERT INTO `stu_identification_info` (`stu_id`, `loc`, `birth`, `id_no`, `race`, `polit`, `native_place`, `tel`, `health`, `enroll_time`, `intro`, `password`) VALUES
(2013010001, '', '', '', '', '', '', '', '', '', '', '000000'),
(2013010002, '', '', '', '', '', '', '', '', '', '', '000000'),
(2013010003, '', '', '', '', '', '', '', '', '', '', '000000'),
(2013010004, '', '', '', '', '', '', '', '', '', '', '000000'),
(2015020001, '', '', '', '', '', '', '', '', '', '', '000000'),
(2015020002, '', '', '', '', '', '', '', '', '', '', '000000'),
(2015020003, '', '', '', '', '', '', '', '', '', '', '000000'),
(2015020004, '', '', '', '', '', '', '', '', '', '', '000000'),
(2015020005, '', '', '', '', '', '', '', '', '', '', '000000'),
(2015020006, '', '', '', '', '', '', '', '', '', '', '000000');

-- --------------------------------------------------------

--
-- 表的结构 `stu_union`
--

CREATE TABLE `stu_union` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(20) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stu_union`
--

INSERT INTO `stu_union` (`group_id`, `group_name`, `intro`) VALUES
(1, '学生创新俱乐部', '');

-- --------------------------------------------------------

--
-- 表的结构 `stu_union_act`
--

CREATE TABLE `stu_union_act` (
  `act_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `act_name` varchar(12) DEFAULT NULL,
  `act_time` varchar(20) DEFAULT NULL,
  `act_position` varchar(20) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `stu_union_member`
--

CREATE TABLE `stu_union_member` (
  `group_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `is_leader` int(1) DEFAULT NULL,
  `gro_position` varchar(20) DEFAULT NULL,
  `power` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `stu_union_member`
--

INSERT INTO `stu_union_member` (`group_id`, `stu_id`, `is_leader`, `gro_position`, `power`) VALUES
(1, 2015020001, 1, '创设人', '4');

-- --------------------------------------------------------

--
-- 表的结构 `teacher_award`
--

CREATE TABLE `teacher_award` (
  `award_id` int(11) NOT NULL,
  `tea_id` int(11) DEFAULT NULL,
  `award_time` varchar(20) DEFAULT NULL,
  `award_name` varchar(20) DEFAULT NULL,
  `verify_statue` varchar(20) DEFAULT NULL,
  `award_intro` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher_award`
--

INSERT INTO `teacher_award` (`award_id`, `tea_id`, `award_time`, `award_name`, `verify_statue`, `award_intro`) VALUES
(1, 54140001, '20131', 'MVP', '未审核', 'NBA MVP');

-- --------------------------------------------------------

--
-- 表的结构 `teacher_basic_info`
--

CREATE TABLE `teacher_basic_info` (
  `tea_id` int(11) NOT NULL,
  `tea_name` varchar(20) DEFAULT NULL,
  `sex` char(1) DEFAULT 'm',
  `rank` varchar(20) DEFAULT NULL,
  `entry_time` varchar(20) DEFAULT NULL,
  `authority` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher_basic_info`
--

INSERT INTO `teacher_basic_info` (`tea_id`, `tea_name`, `sex`, `rank`, `entry_time`, `authority`) VALUES
(54140001, '马千里', '男', NULL, NULL, '4'),
(54140002, '隆承志', '男', '教授', '2005', '1'),
(54140003, '沃妍', '女', '副教授', '2001', '0'),
(54140004, '刘鹏', '男', '讲师', '2011', '0');

-- --------------------------------------------------------

--
-- 表的结构 `teacher_identification_info`
--

CREATE TABLE `teacher_identification_info` (
  `tea_id` int(11) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `birth` varchar(20) DEFAULT NULL,
  `id_no` varchar(18) DEFAULT NULL,
  `race` varchar(10) DEFAULT NULL,
  `polit` varchar(10) DEFAULT NULL,
  `native_place` varchar(20) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `health` varchar(10) DEFAULT NULL,
  `experience` varchar(120) DEFAULT NULL,
  `intro` varchar(300) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `teacher_identification_info`
--

INSERT INTO `teacher_identification_info` (`tea_id`, `address`, `birth`, `id_no`, `race`, `polit`, `native_place`, `tel`, `health`, `experience`, `intro`, `password`) VALUES
(54140001, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '000000'),
(54140002, '', '', '', '', '', '', '', '', '', '', '000000'),
(54140003, '', '', '', '', '', '', '', '', '', '', '000000'),
(54140004, '', '', '', '', '', '', '', '', '', '', '000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_fk` (`sta_id`);

--
-- Indexes for table `class_leader`
--
ALTER TABLE `class_leader`
  ADD PRIMARY KEY (`class_id`,`stu_id`),
  ADD KEY `class_leader_fk2` (`stu_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_fk` (`tea_id`);

--
-- Indexes for table `emp_basic_info`
--
ALTER TABLE `emp_basic_info`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `emp_identification_info`
--
ALTER TABLE `emp_identification_info`
  ADD PRIMARY KEY (`sta_id`);

--
-- Indexes for table `evaluate`
--
ALTER TABLE `evaluate`
  ADD PRIMARY KEY (`eva_id`);

--
-- Indexes for table `evaluate_list`
--
ALTER TABLE `evaluate_list`
  ADD PRIMARY KEY (`eva_one_id`),
  ADD KEY `evaluate_list_fk1` (`eva_id`),
  ADD KEY `evaluate_list_fk2` (`eva_stu_id`);

--
-- Indexes for table `financial_account`
--
ALTER TABLE `financial_account`
  ADD PRIMARY KEY (`money_id`),
  ADD KEY `financial_account_fk1` (`sta_id`),
  ADD KEY `financial_account_fk2` (`req_id`);

--
-- Indexes for table `financial_report`
--
ALTER TABLE `financial_report`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `financial_report_fk` (`req_res_group_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_interconnect`
--
ALTER TABLE `message_interconnect`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `message_interconnect_fk1` (`message_id`),
  ADD KEY `message_interconnect_fk7` (`src_stu_id`);

--
-- Indexes for table `res_group`
--
ALTER TABLE `res_group`
  ADD PRIMARY KEY (`res_group_id`),
  ADD KEY `res_group_fk` (`tea_id`);

--
-- Indexes for table `res_group_achievement`
--
ALTER TABLE `res_group_achievement`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `res_group_achievement_fk1` (`res_group_id`),
  ADD KEY `res_group_achievement_fk2` (`tea_id`);

--
-- Indexes for table `res_group_log`
--
ALTER TABLE `res_group_log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `res_group_log_fk1` (`res_group_id`),
  ADD KEY `res_group_log_fk2` (`member_id`);

--
-- Indexes for table `res_member`
--
ALTER TABLE `res_member`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `res_member_fk1` (`tea_id`),
  ADD KEY `res_member_fk2` (`stu_id`),
  ADD KEY `res_member_fk3` (`res_group_id`);

--
-- Indexes for table `stu_award`
--
ALTER TABLE `stu_award`
  ADD PRIMARY KEY (`award_id`),
  ADD KEY `stu_award_fk` (`stu_id`);

--
-- Indexes for table `stu_basic_info`
--
ALTER TABLE `stu_basic_info`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `stu_basic_info_fk` (`class_id`);

--
-- Indexes for table `stu_course`
--
ALTER TABLE `stu_course`
  ADD PRIMARY KEY (`course_id`,`stu_id`),
  ADD KEY `stu_course_fk2` (`stu_id`);

--
-- Indexes for table `stu_evaluate`
--
ALTER TABLE `stu_evaluate`
  ADD PRIMARY KEY (`stu_id`,`course_year_term`);

--
-- Indexes for table `stu_identification_info`
--
ALTER TABLE `stu_identification_info`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `stu_union`
--
ALTER TABLE `stu_union`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `stu_union_act`
--
ALTER TABLE `stu_union_act`
  ADD PRIMARY KEY (`act_id`),
  ADD KEY `stu_union_act_fk` (`group_id`);

--
-- Indexes for table `stu_union_member`
--
ALTER TABLE `stu_union_member`
  ADD PRIMARY KEY (`group_id`,`stu_id`),
  ADD KEY `stu_union_member_fk2` (`stu_id`);

--
-- Indexes for table `teacher_award`
--
ALTER TABLE `teacher_award`
  ADD PRIMARY KEY (`award_id`),
  ADD KEY `teacher_award_fk` (`tea_id`);

--
-- Indexes for table `teacher_basic_info`
--
ALTER TABLE `teacher_basic_info`
  ADD PRIMARY KEY (`tea_id`);

--
-- Indexes for table `teacher_identification_info`
--
ALTER TABLE `teacher_identification_info`
  ADD PRIMARY KEY (`tea_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `evaluate`
--
ALTER TABLE `evaluate`
  MODIFY `eva_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `evaluate_list`
--
ALTER TABLE `evaluate_list`
  MODIFY `eva_one_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `financial_account`
--
ALTER TABLE `financial_account`
  MODIFY `money_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `financial_report`
--
ALTER TABLE `financial_report`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `message_interconnect`
--
ALTER TABLE `message_interconnect`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `res_group`
--
ALTER TABLE `res_group`
  MODIFY `res_group_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `res_group_achievement`
--
ALTER TABLE `res_group_achievement`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `res_group_log`
--
ALTER TABLE `res_group_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `stu_award`
--
ALTER TABLE `stu_award`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `stu_union`
--
ALTER TABLE `stu_union`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `stu_union_act`
--
ALTER TABLE `stu_union_act`
  MODIFY `act_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `teacher_award`
--
ALTER TABLE `teacher_award`
  MODIFY `award_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 限制导出的表
--

--
-- 限制表 `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_fk` FOREIGN KEY (`sta_id`) REFERENCES `emp_basic_info` (`sta_id`);

--
-- 限制表 `class_leader`
--
ALTER TABLE `class_leader`
  ADD CONSTRAINT `class_leader_fk1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `class_leader_fk2` FOREIGN KEY (`stu_id`) REFERENCES `stu_basic_info` (`stu_id`);

--
-- 限制表 `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_fk` FOREIGN KEY (`tea_id`) REFERENCES `teacher_basic_info` (`tea_id`);

--
-- 限制表 `emp_identification_info`
--
ALTER TABLE `emp_identification_info`
  ADD CONSTRAINT `emp_identification_info_fk` FOREIGN KEY (`sta_id`) REFERENCES `emp_basic_info` (`sta_id`);

--
-- 限制表 `evaluate_list`
--
ALTER TABLE `evaluate_list`
  ADD CONSTRAINT `evaluate_list_fk1` FOREIGN KEY (`eva_id`) REFERENCES `evaluate` (`eva_id`),
  ADD CONSTRAINT `evaluate_list_fk2` FOREIGN KEY (`eva_stu_id`) REFERENCES `stu_basic_info` (`stu_id`);

--
-- 限制表 `financial_account`
--
ALTER TABLE `financial_account`
  ADD CONSTRAINT `financial_account_fk1` FOREIGN KEY (`sta_id`) REFERENCES `emp_basic_info` (`sta_id`),
  ADD CONSTRAINT `financial_account_fk2` FOREIGN KEY (`req_id`) REFERENCES `financial_report` (`req_id`);

--
-- 限制表 `financial_report`
--
ALTER TABLE `financial_report`
  ADD CONSTRAINT `financial_report_fk` FOREIGN KEY (`req_res_group_id`) REFERENCES `teacher_basic_info` (`tea_id`);

--
-- 限制表 `message_interconnect`
--
ALTER TABLE `message_interconnect`
  ADD CONSTRAINT `message_interconnect_fk1` FOREIGN KEY (`message_id`) REFERENCES `message` (`message_id`),
  ADD CONSTRAINT `message_interconnect_fk2` FOREIGN KEY (`src_stu_id`) REFERENCES `stu_basic_info` (`stu_id`),
  ADD CONSTRAINT `message_interconnect_fk3` FOREIGN KEY (`src_stu_id`) REFERENCES `teacher_basic_info` (`tea_id`),
  ADD CONSTRAINT `message_interconnect_fk4` FOREIGN KEY (`src_stu_id`) REFERENCES `stu_union` (`group_id`),
  ADD CONSTRAINT `message_interconnect_fk5` FOREIGN KEY (`src_stu_id`) REFERENCES `res_group` (`res_group_id`),
  ADD CONSTRAINT `message_interconnect_fk6` FOREIGN KEY (`src_stu_id`) REFERENCES `emp_basic_info` (`sta_id`),
  ADD CONSTRAINT `message_interconnect_fk7` FOREIGN KEY (`src_stu_id`) REFERENCES `class` (`class_id`);

--
-- 限制表 `res_group`
--
ALTER TABLE `res_group`
  ADD CONSTRAINT `res_group_fk` FOREIGN KEY (`tea_id`) REFERENCES `teacher_basic_info` (`tea_id`);

--
-- 限制表 `res_group_achievement`
--
ALTER TABLE `res_group_achievement`
  ADD CONSTRAINT `res_group_achievement_fk1` FOREIGN KEY (`res_group_id`) REFERENCES `res_group` (`res_group_id`),
  ADD CONSTRAINT `res_group_achievement_fk2` FOREIGN KEY (`tea_id`) REFERENCES `teacher_basic_info` (`tea_id`);

--
-- 限制表 `res_group_log`
--
ALTER TABLE `res_group_log`
  ADD CONSTRAINT `res_group_log_fk1` FOREIGN KEY (`res_group_id`) REFERENCES `res_group` (`res_group_id`),
  ADD CONSTRAINT `res_group_log_fk2` FOREIGN KEY (`member_id`) REFERENCES `res_member` (`member_id`);

--
-- 限制表 `res_member`
--
ALTER TABLE `res_member`
  ADD CONSTRAINT `res_member_fk1` FOREIGN KEY (`tea_id`) REFERENCES `teacher_basic_info` (`tea_id`),
  ADD CONSTRAINT `res_member_fk2` FOREIGN KEY (`stu_id`) REFERENCES `stu_basic_info` (`stu_id`),
  ADD CONSTRAINT `res_member_fk3` FOREIGN KEY (`res_group_id`) REFERENCES `res_group` (`res_group_id`);

--
-- 限制表 `stu_award`
--
ALTER TABLE `stu_award`
  ADD CONSTRAINT `stu_award_fk` FOREIGN KEY (`stu_id`) REFERENCES `stu_basic_info` (`stu_id`);

--
-- 限制表 `stu_basic_info`
--
ALTER TABLE `stu_basic_info`
  ADD CONSTRAINT `stu_basic_info_fk` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- 限制表 `stu_course`
--
ALTER TABLE `stu_course`
  ADD CONSTRAINT `stu_course_fk1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `stu_course_fk2` FOREIGN KEY (`stu_id`) REFERENCES `stu_basic_info` (`stu_id`);

--
-- 限制表 `stu_evaluate`
--
ALTER TABLE `stu_evaluate`
  ADD CONSTRAINT `stu_evaluate_fk` FOREIGN KEY (`stu_id`) REFERENCES `stu_basic_info` (`stu_id`);

--
-- 限制表 `stu_identification_info`
--
ALTER TABLE `stu_identification_info`
  ADD CONSTRAINT `stu_id_info_fk` FOREIGN KEY (`stu_id`) REFERENCES `stu_basic_info` (`stu_id`);

--
-- 限制表 `stu_union_act`
--
ALTER TABLE `stu_union_act`
  ADD CONSTRAINT `stu_union_act_fk` FOREIGN KEY (`group_id`) REFERENCES `stu_union` (`group_id`);

--
-- 限制表 `stu_union_member`
--
ALTER TABLE `stu_union_member`
  ADD CONSTRAINT `stu_union_member_fk1` FOREIGN KEY (`group_id`) REFERENCES `stu_union` (`group_id`),
  ADD CONSTRAINT `stu_union_member_fk2` FOREIGN KEY (`stu_id`) REFERENCES `stu_basic_info` (`stu_id`);

--
-- 限制表 `teacher_award`
--
ALTER TABLE `teacher_award`
  ADD CONSTRAINT `teacher_award_fk` FOREIGN KEY (`tea_id`) REFERENCES `teacher_basic_info` (`tea_id`);

--
-- 限制表 `teacher_identification_info`
--
ALTER TABLE `teacher_identification_info`
  ADD CONSTRAINT `teacher_identification_info_fk` FOREIGN KEY (`tea_id`) REFERENCES `teacher_basic_info` (`tea_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
