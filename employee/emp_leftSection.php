<div class='col-xs-2' id="leftSection">
	<ul class='nav nav-pills nav-stacked text-center'>
		<!--
		<li id="emp_homePage">
			<a class='row' href="./emp_homePage.php">
				<p class='navbar-font'>我的首页</p>
			</a>
		</li>	
		-->	
		<li id="emp_info">
			<a class='row' href="./emp_info.php">
				<p class='navbar-font'>我的信息</p>
			</a>
		</li>
				<!--
		<li id ="emp_message">
			<a class='row' href="./emp_message.php">
				<p class='navbar-font'>消息管理</p>
			</a>
		</li>
		-->
		<?php 
			if($_SESSION['Position'] == '办公室') {
		?>
		<li id ="emp_manageEmp" >
			<a class='row' href="./emp_manageEmp.php">
				<p class='navbar-font'>人事管理</p>
			</a>
		</li>
		<li id ="emp_moneyRequest">
			<a class='row' href="./emp_moneyRequest.php">
				<p class='navbar-font'>经费审批</p>

			</a>
		</li>
		<?php 
			}
		?>
	<!--	<li id ="emp_bill">
			<a class='row' href="./emp_bill.php">
				<p class='navbar-font'>财务账目</p>
			</a>
		</li> -->
		<?php 
			if($_SESSION['Position'] == '教务员') {
		?>
		<li  id="emp_manageAllClass">
			<a class='row' href="./emp_manageAllClass.php">
				<p class='navbar-font'>班级管理（教务员）</p>
			</a>
		</li> 
		<li id="emp_manageCourse">
			<a class='row' href="./emp_manageCourse.php">
				<p class='navbar-font'>课程管理</p>
			</a>
		</li>
		<li id ="emp_manageOrg" >
			<a class='row' href="./emp_manageOrg.php">
				<p class='navbar-font'>学生组织管理</p>
			</a>
		</li>
		<?php 
			}
		?>
		<!--		
		<li id ="emp_manageInstr">
			<a class='row' href="./emp_manageInstr.php">
				<p class='navbar-font'>辅导员管理</p>
			</a>
		</li>  -->
		<?php 
			if($_SESSION['Position'] == '辅导员') {
		?>
		<li id ="emp_manageOneClass">
			<a class='row' href="./emp_manageOneClass.php">
				<p class='navbar-font'>班级管理（辅导员）</p>
			</a>
		</li>
<!--
		<li  id="emp_manageStudent">
			<a class='row' href="./emp_manageStudent.php">
				<p class='navbar-font'>学生管理</p>
			</a>
		</li> -->
		<li id="emp_managePride">
			<a class='row' href="./emp_managePride.php">
				<p class='navbar-font'>获奖审查</p>
			</a>
		</li>	
		<?php 
			}
		?>	
	</ul>
</div>
