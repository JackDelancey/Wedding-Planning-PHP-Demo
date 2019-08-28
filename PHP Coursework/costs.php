<!DOCTYPE html>
<html>
<head></head>
<style>
	th.colhead{
		font-weight: bold;
		text-align: center;
		border: 1px solid black;
		background-color: f2f2f2;
	}
	tr.rowhead{
		text-align: center;

		background-color: f2f2f2;
	}
	th{
		padding:10px;
	}
	th, td{
		border: 1px solid black;
	}
	table{
		border-collapse: collapse;
	}
</style>
<body>
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
	$date = $_GET['date'];
	$psize = $_GET['partySize'];
	$dateTime = DateTime::createFromFormat('d/m/Y',$date);
	$date = $dateTime->format('Y-m-d');
	$isWeekend = ($dateTime->format ('N')>=6)?true:false;
	$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
	if ($isWeekend){
	$sql = "SELECT name, weekend_price AS price FROM venue WHERE $psize <= capacity AND venue_id NOT IN (SELECT venue_id FROM venue_booking WHERE date_booked = '$date')";
	} else {
	$sql = "SELECT name, weekday_price AS price FROM venue WHERE $psize <= capacity AND venue_id NOT IN (SELECT venue_id FROM venue_booking WHERE date_booked = '$date')";
	}
	$res = & $db->query($sql);
	if (PEAR::isError($res)) {
		die($res->getMessage());
	}
	?>
	<table class"table">
		<th>Venue/ Cost</th>
		<th><?php echo 'name'; ?></th>
		<th><?php echo 'price'; ?></th>
	<?php while ($row = $res->fetchRow()) {
		?>
			<tr>
			<td></td>
			<td><?php echo $row['name']; ?> </td>
			<td><?php echo $row['price']; ?> </td>
			</tr>
	<?php }
?>
		
</table>
</body>
</html>

