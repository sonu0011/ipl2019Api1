<?php 
include_once 'db_operations.php';
$con =new DbOperation();
if ($_SERVER['REQUEST_METHOD'] =='POST') {
	
		//Branch Details
		if (isset($_POST['batting_leaders'])) {

			$res = $con->batting_leaders();
			echo $res;
		}
		if (isset($_POST['bowling_leaders'])) {

			$res = $con->bowling_leaders();
			echo $res;
		}
		if (isset($_POST['team_details'])) {

			$res = $con->team_details();
			echo $res;
		}
		if (isset($_POST['get_batting_details'])) {
			$res =$con->get_batting_details($_POST['query']);
			echo $res;
			
		}

		if (isset($_POST['get_bowling_details'])) {
			$res =$con->get_bowling_details($_POST['query']);
			echo $res;
			
		}
		if (isset($_POST['get_drawer_details'])) {
			$res =$con->get_drawer_details();
			echo $res;
			
		}
		if (isset($_POST['get_drawer_full_details'])) {
			$res =$con->get_drawer_full_details($_POST['drawer_item']);
			echo $res;
			
		}
		if (isset($_POST['full_team_details'])) {
			$res =$con->full_team_details($_POST['request_type'],$_POST['team_id']);
			echo $res;
			
		}
		if (isset($_POST['getTeamItemDetails'])) {
			$res =$con->getTeamItemDetails($_POST['team_id']);
			echo $res;
			
		}
		
		
	
}

?>