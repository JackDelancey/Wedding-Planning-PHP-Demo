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
	$venue = 'venue';
	$venue_id = 'venue_id';
	$i = $_GET['venueId'];
	$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
	$sql = "SELECT * FROM $venue WHERE $venue_id = $i";
	$res = & $db->query($sql);
	if (PEAR::isError($res)) {
		die($res->getMessage());
	}
	?>
	<table class"table">
		<th>Venues/Details</th>
		<th><?php echo 'venue_id'; ?></th>	
		<th><?php echo 'name'; ?></th>
		<th><?php echo 'capacity'; ?></th>
		<th><?php echo 'weekend_price'; ?></th>
		<th><?php echo 'weekday_price'; ?></th>
		<th><?php echo 'licensed'; ?></th>

	<?php while ($row = $res->fetchRow()) {
		?>
			<tr>
			<td></td>
			<td><?php echo $row['venue_id']; ?> </td>
			<td><?php echo $row['name']; ?> </td>
			<td><?php echo $row['capacity']; ?> </td>
			<td><?php echo $row['weekend_price']; ?> </td>
			<td><?php echo $row['weekday_price']; ?> </td>
			<td><?php echo $row['licensed']; ?> </td>
			</tr>
	<?php }
?>
		
</table>
</body>
</html>

