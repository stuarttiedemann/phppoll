<?php
	include('inc/db_connect.php');
	// select statement ... get a random match from basketball.
	// check to see if they voted on it.  If they have, 
	// get a different one, otherwise use it.

	// Once they click on the vote button, we need to
	// make an AJAX call, to update the database...
	// Insert statemetnt ... that will add their vote to the vote 
	// table
	$query = "SELECT * FROM cars";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result)){
		$rows[] = $row;
	};
	$count = count($rows);

	// print_r($count);
	// exit;

	$rand1 = rand(0, count($rows)-1);
	$rand2 = rand(0, count($rows)-1);

	// for($i=0;$i<$count; $i++){
	// 	$car1 = $rows[$i]['car'];
	// 	print_r($car1);
	// 	for($j=$i+1; $j< $count; $j++){
	// 		$car2 = $rows[$j]['car'];
	// 		print_r($car2);
	// 	}
	// }

	$match_id = $rows[$rand]['id'];
	$car1 = $rows[$rand1]['car'];
	$car2 = $rows[$rand2]['car'];
	
	while($car1 == $car2){
		$rand2 = rand(0, count($rows)-1);
		$car2 = $rows[$rand2]['car'];

	}

	
	// print_r($car1);
	// exit;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Win or Not</title>
	
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>
<body>
	<div class="wrapper">
		<?php if($none): ?>
			<div id="vote-all">You have voted for all of the matchups!  Check back later.</div>
		<?php else: ?>
		<h1>Who will win the race?</h1>
		<div class="main-image-holder">
			<div class="image-left">
				<div class="image-holder">
					<img src="<?php print $car1; ?>">
				</div>
				<h3>Votes:</h3>
			</div>
			<div class="image-right">
				<div class="image-holder">
					<img src="<?php print $car2; ?>">
				</div>
				<h3>Votes:</h3>
			</div>
			<div class="button-holder">
				<button class="vote" type="submit">Vote</button>
				<button type="submit">Next</button>
				<button class="vote" type="submit">Vote</button>
			</div>
		</div>
	<? endif ;?>
	</div>
</body>
</html>