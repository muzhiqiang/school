<?php

	require_once $_SERVER['DOCUMENT_ROOT'].'/school/service/APICaller.php';
	
	$api = new APICaller();
	$_POST['Award_time'] = $_GET['year'].$_GET['term'];

	$controller = $_GET['type'].'Award';
	$result = $api->excute($controller, 'showYearAward');


	if($result['success'] != 1) {
		echo $result['data'];
		exit();
	}

	$num = count($result['data']);
		for($i =0; $i <$num; $i++) {
		$collapse = 'collapse'.$i;
		echo '<div class="panel panel-warning">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#courseDetail" href=#'.$collapse.'>
						'.$result['data'][$i]['Award_name'].'
					</a>
				<span class="badge pull-right">'.$result['data'][$i]['Verify_statue'].'</span>
				</h4>
			</div>
			<div id='.$collapse.' class="panel-collapse collapse">
				<div class="panel-body">
					<p>申请时间：'.$result['data'][$i]['Award_time'].'</p>
					<p>审核状态：'.$result['data'][$i]['Verify_statue'].'</p>
					<p>荣誉描述：'.$result['data'][$i]['Award_intro'].'</p>
				</div>
			</div>
		</div>';
	}

?>
