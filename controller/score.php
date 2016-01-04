<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/controller/util.php';
class score {
	private $util_;

	public function __construct() {
		$this->util_ = new Util();
	}

	public function showScoreAction() {
		$sql1 = "select c.Course_ID,c.Course,sc.Score,c.Property,c.credit,c.intro from Course as c,Stu_Course as sc where c.Course_ID = sc.Course_ID and c.Course_year_term = $_POST[Course_year_term] and sc.Stu_ID = $_POST[Account]";
		
		require_once $_SERVER['DOCUMENT_ROOT'].'/school'.'/model/pod.php';
		$pod = new POD();
		$pod->connect();
		$result = $pod->query($sql1);
		foreach ($result as $key => $value) {

			$where = $result[$key]['Course_ID'];
			$sql2 = "select Stu_ID from Stu_Course where Course_ID='$where' order by Score desc";
			$ids = $pod->query($sql2);
			foreach ($ids as $rank => $id) {
				if( $id['Stu_ID'] == $_POST['Account'] ) {
					$result[$key]['rank'] = $rank+1;
					break;
				}

			}
		}
		$pod->close();
		return json_encode($result);
	}
}
?>
