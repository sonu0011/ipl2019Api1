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

					
					
	
}
