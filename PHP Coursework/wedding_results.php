<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">	
	<title>Results</title>
</head>
<body>
	<h1>Results</h1>
	<?php
	$host='co-project.lboro.ac.uk';
	$dbName='coa123wdb';
	include "/diska/www/include/coa123-13-connect.php"; 
	$dsn = "mysql://$username1:$password1@$host/$dbName";
	require_once 'MDB2.php';
	$db =& MDB2::connect($dsn);
	if (PEAR::isError($db)) {
		die($db->getMessage());
	}

	if (!empty($_GET['capacity'])) {
		$capacity = $_GET['capacity'];
	}
	if (!empty($_GET['earliest'])) {
		$earliest = $_GET['earliest'];
	}
	if (!empty($_GET['latest'])) {
		$latest = $_GET['latest'];
	}
	if (!empty($_GET['grade'])) {
		$grade = $_GET['grade'];
	} 
	
	$db->setFetchMode(MDB2_FETCHMODE_ASSOC);?>

	<table class"table">
		<th><?php echo 'Name'; ?></th>
		<th><?php echo 'Price'; ?></th>
		<th><?php echo 'Catering Cost'; ?></th>
		<th><?php echo 'Date'; ?></th>
		<th><?php echo 'licensed'; ?></th>

		<?php

		$earliest = $_GET['earliest'];
		$earliestDate = str_replace('/','-', $earliest);
		$newEarliest = Date('Y-m-d', strtotime($earliestDate));

		$latest = $_GET['latest'];
		$latestDate = str_replace('/','-', $latest);
		$newLatest = Date('Y-m-d', strtotime($latestDate));

		while($newEarliest <= $newLatest){

			$psize = $_GET['capacity'];
			$grade = $_GET['grade'];
			$fDay = strtotime($newEarliest);
			$dayIden = date('l',$fDay);

			if ($dayIden == 'Saturday' || $dayIden == 'Sunday'){
				$isWeekend = true;
			} else {
				$isWeekend = false;
			}
			if ($isWeekend){
				$sql = 
				"SELECT name, weekend_price AS price, licensed, capacity, venue_id
				FROM venue 
				WHERE $psize <= capacity  
				AND venue_id NOT IN 
				(SELECT venue_id FROM venue_booking WHERE date_booked = '$newEarliest')";
			} else {
				$sql = 
				"SELECT name, weekday_price AS price, licensed, capacity, venue_id
				FROM venue
				WHERE $psize <= capacity  
				AND venue_id NOT IN 
				(SELECT venue_id FROM venue_booking WHERE date_booked = '$newEarliest')";
			}
			?>
			<?php $res =& $db->query($sql);
			if(PEAR::isError($res)){
				die($res->getMessage());
			} ?>

			<?php while ($row = $res->fetchRow()) {
				$firstId = $row['venue_id'];
				$sql1 = "SELECT * FROM catering WHERE $grade = grade";
				$res1 =& $db->query($sql1);
				if(PEAR::isError($res1)){
					die($res1->getMessage());
				}?>
				<?php 
				while ($row1 = $res1->fetchRow()) {
					$secondId = $row1['venue_id'];
					if($firstId == $secondId){ ?>
					<tr>
						<td><?php echo $row['name']; ?> </td>
						<td><?php echo $row['price']; ?> </td>
						<td><?php echo $row1['cost']*$psize; ?> </td>
						<td><?php echo $newEarliest ?> </td>
						<?php if($row['licensed'] == 0){ ?>
						<td><?php echo "No" ?></td>
						<?php } else { ?>
						<td><?php echo "Yes" ?></td>
						<?php } ?>
					</tr>
					<?php
				} 
			}
		}
		$newEarliest = Date('Y-m-d', strtotime($newEarliest.' +1 day'));
	}?>
</body>
</html>