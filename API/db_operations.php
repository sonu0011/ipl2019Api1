<?php 
include_once('db_connection.php');

class DbOperation{
	private $con;
	function __construct(){
	    $obj = new Dbconnect();
		$this->con = $obj->returnobject();
	}
	
		function batting_leaders(){
					$products = array(); 
					$sql ="select * from batting_leaders";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					      					        $temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['image'];
					        $temp['heading'] =$row['heading'];
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				else {
					echo 'no result found';
				}
	}
	function bowling_leaders(){
					$products = array(); 
					$sql ="select * from bowling_leaders";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					      					        $temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['image'];
					        $temp['heading'] =$row['heading'];
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				else {
					echo 'no result found';
				}
	}


function team_details(){
					$products = array(); 
					$sql ="select * from teams";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    $temp['team_id'] =$row['team_id'];
					      					        $temp['team_image'] ="http://192.168.43.126/IPL2019/IMAGES/logo/".$row['team_image'];
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				else {
					echo 'no result found' ;
				}
	}
	function get_batting_details($query){
					$products = array(); 
					$sql="";
					if ($query == "Most 50") {
						$sql ="SELECT bat_name,bat_image,bat_fifties,bat_team_id FROM `batsman` WHERE bat_fifties != 0  ORDER by bat_fifties DESC LIMIT 10";
						$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();

					    					    $temp['team_id'] = $row['bat_team_id'];

					    $temp['name'] =$row['bat_name'];
					 	$temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bat_image'];
					 	$temp['feat'] =$row['bat_fifties'];
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
			}
				if ($query == "Biggest Six" || $query == "Best Strike Rate") {
					if ($query == "Best Strike Rate") {
						$sql ="SELECT bat_name,bat_image,bat_strike_rate,bat_team_id FROM `batsman` WHERE bat_strike_rate != 0  ORDER by bat_strike_rate DESC LIMIT 10";
					}
					if ($query == "Biggest Six") {
						$sql ="SELECT bat_name,bat_image,bat_longest_six,bat_team_id FROM `batsman` WHERE bat_longest_six != 0  ORDER by bat_longest_six DESC LIMIT 10";

						
					}
					
						$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    					    $temp['team_id'] = $row['bat_team_id'];

					    $temp['name'] =$row['bat_name'];
					 	$temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bat_image'];
					 	if ($query == "Biggest Six") {
					 		$temp['feat'] =$row['bat_longest_six'];
					 	}
					 	if ($query == "Best Strike Rate") {
					 		
					 		$temp['feat'] =$row['bat_strike_rate'];
					 		
					 	}
					 	
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
						
					}	
					}
					if ($query == "Most 100") {
						$sql ="SELECT bat_name,bat_image,bat_hundered,bat_team_id FROM `batsman` WHERE bat_hundered != 0  ORDER by bat_hundered DESC LIMIT 10";
						$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    					    $temp['team_id'] = $row['bat_team_id'];

					    $temp['name'] =$row['bat_name'];
					 	$temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bat_image'];
					 	$temp['feat'] =$row['bat_hundered'];
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				}
					if ($query == "Fastest 50") {
						$sql = "SELECT bat_name,bat_image,bat_fifty_ball,bat_team_id FROM `batsman` WHERE bat_fifty_ball != 0  ORDER by bat_fifty_ball ASC LIMIT 10";
									$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    					    $temp['team_id'] = $row['bat_team_id'];

					    $temp['name'] =$row['bat_name'];
					 	$temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bat_image'];
					 	$temp['feat'] =$row['bat_fifty_ball'];
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}

				}
				if ($query == "Fastest 100") {
						$sql = "SELECT bat_name,bat_image,bat_century_ball,bat_team_id FROM `batsman` WHERE bat_century_ball != 0  ORDER by bat_century_ball ASC LIMIT 10";
									$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {

					    $temp = array();
					    											    $temp['team_id'] = $row['bat_team_id'];

					    $temp['name'] =$row['bat_name'];
					 	$temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bat_image'];
					 	$temp['feat'] =$row['bat_century_ball'];
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				
				}
				if ($query == "Best Batting Average" || $query == "Orange Cap") {
					if ($query == "Best Batting Average") {
						$sql = "SELECT * FROM `batsman` WHERE bat_avg != 0 ORDER BY bat_avg DESC LIMIT 10";
						
					}
					if ($query == "Orange Cap") {
						$sql = "SELECT * FROM `batsman` WHERE bat_runs != 0 ORDER BY bat_runs DESC LIMIT 10";
						
					}
						
									$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    $temp['team_id'] = $row['bat_team_id'];
					    $temp['name'] =$row['bat_name'];
					 	$temp['matches'] = $row['bat_matches_played'];
					 	$temp['innings'] = $row['bat_innings'];
					 	$temp['runs'] = $row['bat_runs'];
					 	$temp['hs'] = $row['bat_highest_run'];
					 	$temp['average']  =$row['bat_avg'];
					 	$temp['fifty'] = $row['bat_fifties'];
					 	$temp['hundered'] = $row['bat_hundered'];
					 	$temp['fours'] = $row['bat_fours'];
					 	$temp['sixes'] = $row['bat_sixes'];
					 	 $temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bat_image'];
							array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				
				}
					if ($query == "Most Sixes" || $query == "Most Fours") {
						if ($query == "Most Sixes") {
							
						
						$sql = "SELECT bat_name,bat_image,bat_sixes,bat_team_id	 FROM `batsman` WHERE bat_sixes	 != 0  ORDER by bat_sixes DESC LIMIT 10";
						}
						if ($query == "Most Fours") {
						$sql = "SELECT bat_name,bat_image,bat_fours,bat_team_id	 FROM `batsman` WHERE bat_fours	 != 0  ORDER by bat_fours DESC LIMIT 10";	
							
						}
					
						
									$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    					    $temp['team_id'] = $row['bat_team_id'];

					    $temp['name'] =$row['bat_name'];
					 	$temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bat_image'];
					 	if ($query == "Most Fours") {
					 		$temp['feat'] =$row['bat_fours'];
					 	}
					 	if ($query == "Most Sixes") {
					 		$temp['feat'] =$row['bat_sixes'];
					 		
					 	}
					 	
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				
				}
			}
			function get_bowling_details($query)
			{
				$products = array();
				$sql ="";
					if ($query == "Most Maiden Overs"    || $query == "Most Dot Balls" 
						|| $query == "Fastest Ball"      || $query == "Best Strike Rate"
						|| $query == "Best Economy Rate" || $query == "Best Bowling Average"
						|| $query == "Best Bowling Innings" || $query =="Best Bowling Innings"
						|| $query == "Purple Cap" ){
						
						if ($query == "Most Maiden Overs") {
						$sql = "SELECT bow_name,bow_image,bow_maiden_over_count FROM bowler WHERE bow_maiden_over_count != 0 ORDER by bow_maiden_over_count DESC LIMIT 10";
						}
						if ($query == "Most Dot Balls") {
						$sql = "SELECT bow_name,bow_image,bow_dot_balls	 FROM `bowler` WHERE bow_dot_balls	 != 0  ORDER by bow_dot_balls DESC LIMIT 10";	
							
						}
						
							if ($query == "Fastest Ball") {
							$sql = "SELECT bow_name,bow_image,bow_fastest_ball FROM `bowler` WHERE bow_fastest_ball != 0  ORDER by bow_fastest_ball DESC LIMIT 10";	

							}
							if ($query == "Best Strike Rate") {
								$sql = "SELECT bow_name,bow_team_id,bow_image,bow_balls_bowled,bow_total_wickets,bow_strike_rate FROM `bowler` WHERE bow_strike_rate != 0  ORDER by bow_strike_rate ASC LIMIT 10";	
								
							}
							if ($query == "Best Economy Rate") {
								$sql = "SELECT bow_name,bow_team_id,bow_image,bow_runs_given,bow_over_bowled,bow_economy FROM `bowler` WHERE bow_economy != 0  ORDER by bow_economy ASC LIMIT 10";	
								
							}
							if ($query == "Best Bowling Average") {
								$sql = "SELECT bow_name,bow_team_id,bow_image,bow_runs_given,bow_total_wickets,bow_average FROM `bowler` WHERE bow_average != 0  ORDER by bow_average ASC LIMIT 10";	
								
							}
							if ($query == "Best Bowling Innings") {
								$sql = "SELECT * FROM `bowler` WHERE bow_total_wickets != 0  ORDER by bow_total_wickets DESC LIMIT 10";	
								
							}
							if ($query == "Purple Cap") {
								$sql = "SELECT * FROM `bowler`  ORDER by bow_total_wickets DESC LIMIT 10";	
								
							}
					
						
									$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();

					    $temp['name'] =$row['bow_name'];
					 	$temp['image'] ="http://192.168.43.126/IPL2019/IMAGES/".$row['bow_image'];
					 	if ($query == "Most Maiden Overs") {
					 		$temp['feat'] =$row['bow_maiden_over_count'];
					 	}
					 	if ($query == "Most Dot Balls") {
					 		$temp['feat'] =$row['bow_dot_balls'];
					 		
					 	}
					 	
					 	if ($query == "Fastest Ball") {
					 		$temp['feat'] =$row['bow_fastest_ball'];

					 		
					 	}
					 	if ($query == "Best Strike Rate") {
					 		$temp['team_id'] = $row['bow_team_id'];
					 		$temp['ball_bowled'] = $row['bow_balls_bowled'];
					 		$temp['total_wickets'] = $row['bow_total_wickets'];
					 		$temp['strike_rate'] = $row['bow_strike_rate'];
					 		
					 		
					 	}
					 	if ($query == "Best Economy Rate") {
					 		$temp['team_id'] = $row['bow_team_id'];
					 		$temp['runs_given'] = $row['bow_runs_given'];
					 		$temp['over_bowled'] = $row['bow_over_bowled'];
					 		$temp['economy'] = $row['bow_economy'];
					 		
					 		
					 	}
					 	if ($query == "Best Bowling Average") {
					 		$temp['team_id'] = $row['bow_team_id'];
					 		$temp['runs_given'] = $row['bow_runs_given'];
					 		$temp['total_wickets'] = $row['bow_total_wickets'];
					 		$temp['average'] = $row['bow_average'];
					 		
					 		
					 	}
					 	if ($query == "Purple Cap") {
					 		$temp['team_id'] = $row['bow_team_id'];
					 		$temp['matches_played'] = $row['bow_matches_played'];
					 		$temp['innings'] = $row['bow_innings'];
					 		$temp['over_bowled'] = $row['bow_over_bowled'];
					 		$temp['runs_given'] = $row['bow_runs_given'];
					 		$temp['total_wickets'] = $row['bow_total_wickets'];
					 		$temp['average'] = $row['bow_average'];
					 		$temp['economy'] = $row['bow_economy'];
					 		$temp['strike_rate'] = $row['bow_strike_rate'];
					 		$temp['four_wickets_count'] = $row['bow_four_wickets_count'];
					 		$temp['five_wickets_count'] = $row['bow_five_wickets_count'];
					 		
					 		
					 		
					 		
					 	}
					 	if ($query == "Best Bowling Innings") {
					 		$temp['team_id'] = $row['bow_team_id'];
					 		$temp['matches_played'] = $row['bow_matches_played'];
					 		$temp['innings'] = $row['bow_innings'];
					 		$temp['over_bowled'] = $row['bow_over_bowled'];
					 		$temp['runs_given'] = $row['bow_runs_given'];
					 		$temp['total_wickets'] = $row['bow_total_wickets'];
					 		$temp['average'] = $row['bow_average'];
					 		$temp['economy'] = $row['bow_economy'];
					 		$temp['strike_rate'] = $row['bow_strike_rate'];
					 		
					 		
					 	}
					 	
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				
				}
				
			}
			function get_drawer_details()
			{
				$products = array(); 
					$sql ="select * from drawer_items";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					     $temp['drawer_heading'] =$row['drawer_title'];
					     $temp['drawer_bg'] ="http://192.168.43.126/IPL2019/IMAGES/Drawer/".$row['drawer_bg'];
					     $temp['drawer_icon'] ="http://192.168.43.126/IPL2019/IMAGES/Drawer/".$row['drawer_icon'];
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);
		
				}
				

			}
			function get_drawer_full_details($drawer_item)
			{
					$products = array(); 
					if ($drawer_item =="SCHEDULE" ) {
					$sql ="select * from schedule";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					     $temp['match_no'] =$row['sch_match_number'];
					     $temp['team1_image'] ="http://192.168.43.126/IPL2019/IMAGES/logo/".$row['sch_first_team_logo'];
					     $temp['team2_image'] ="http://192.168.43.126/IPL2019/IMAGES/logo/".$row['sch_second_team_logo'];
					     $temp['date_time'] =$row['sch_date_time'];
					     $temp['venue'] =$row['sch_stadium_venue'];
					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);

					}
					
		
				}
				if ($drawer_item == "HIGHLIGHTS") {
					$sql = "SELECT result_match_num,result_declare,result_first_team_name,result_second_team_name,result_highlights_link,schedule.sch_date_time,scores.score_team1_score,scores.over_team1_over,scores.score_team2_score,scores.over_team2_over FROM results INNER JOIN SCHEDULE ON results.result_match_num = schedule.sch_match_number INNER JOIN scores ON scores.score_match_no =results.result_match_num";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					     $temp['match_no'] =$row['result_match_num'];
					     $temp['result_declare'] = $row['result_declare'];
					     $temp['team1Name'] =$row['result_first_team_name'];
					     $temp['team2Name'] =$row['result_second_team_name'];
					     //$temp['winning_team_id'] =$row['result_winning_team_id'];
					     $temp['highlights_link'] =$row['result_highlights_link'];
					     $temp['date_time'] =$row['sch_date_time'];
					     $temp['score_team1_score'] =$row['score_team1_score'];
					     $temp['over_team1_over'] =$row['over_team1_over'];
					     $temp['score_team2_score'] =$row['score_team2_score'];
					     $temp['over_team2_over'] =$row['over_team2_over'];
					    array_push($products, $temp);

					}
					echo json_encode($products);

					}
				}
					
					if ($drawer_item =="POINTS TABLE" ) {
					$sql ="SELECT * FROM `points_table` ORDER BY  pt_points,pt_net_run_rate";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					     $temp['team_Name'] =$row['pt_team_name'];
					    $temp['match_Played'] =$row['pt_mat_played'];
					    $temp['match_Won'] =$row['pt_mat_won'];
					    $temp['match_Lost'] =$row['pt_mat_lost'];
					     $temp['match_Tied'] =$row['pt_mat_tied'];
					     $temp['no_Result'] =$row['pt_no_result'];
						$temp['points'] =$row['pt_points'];
						$temp['net_run_rate'] =$row['pt_net_run_rate'];					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);

					}
						
					
		
				}
				if ($drawer_item =="MOST VALUABLE PLAYER" ) {
					$sql ="SELECT val_name,teams.team_title_short,val_points,val_matches_played,val_wickets,val_dots,val_fours,val_sixes,val_catches,val_stumping FROM valuable_player INNER JOIN teams on valuable_player.val_team_id =teams.team_id ORDER BY valuable_player.val_points DESC";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					     $temp['player_name'] =$row['val_name'];
					    $temp['team_name'] =$row['team_title_short'];
					    $temp['val_points'] =$row['val_points'];
					    $temp['matches_played'] =$row['val_matches_played'];
					     $temp['val_wickets'] =$row['val_wickets'];
					     $temp['val_dots'] =$row['val_dots'];
						$temp['val_fours'] =$row['val_fours'];
						$temp['val_sixes'] =$row['val_sixes'];	
						$temp['val_catches'] =$row['val_catches'];
						$temp['val_stumping'] =$row['val_stumping'];					       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);

					}
					
		
				}
				if ($drawer_item =="FAIR PLAY AWARD" ) {
					$sql ="SELECT teams.team_title_short,fp_matches_played,fp_team_points,fp_team_avg_points FROM fair_play_award INNER JOIN teams ON teams.team_id =fair_play_award.fp_team_id ORDER BY fp_team_points DESC";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    $temp['team_name'] =$row['team_title_short'];
					    $temp['matches_played'] =$row['fp_matches_played'];
						$temp['points'] =$row['fp_team_points'];
						$temp['fp_team_avg'] =$row['fp_team_avg_points'];	
										       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);

					}
					
		
				}
				if ($drawer_item =="MAN OF THE MATCH  AWARDS") {
					$sql ="SELECT *  FROM man_of_the_matches WHERE mom_player_awards != 0 ORDER BY mom_player_awards DESC LIMIT 10";
					$result = mysqli_query($this->con,$sql);
					if ($result) {
					while ($row =mysqli_fetch_assoc($result)) {
					    $temp = array();
					    $temp['player_name'] =$row['mom_player_name'];
					    $temp['team_logo'] ="http://192.168.43.126/IPL2019/IMAGES/logo/".$row['mom_team_image'];
						$temp['matches_played'] =$row['mom_player_matches'];
						$temp['awards_count'] =$row['mom_player_awards'];	
										       
					  
					    array_push($products, $temp);

					}
					echo json_encode($products);

					}
					
		
				}
					
				
					
								

			}

					
					
	
}
