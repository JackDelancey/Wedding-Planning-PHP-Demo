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
	$minCapacity = $_GET['minCapacity'];
	$maxCapacity = $_GET['maxCapacity'];
	$db->setFetchMode(MDB2_FETCHMODE_ASSOC);
	$sql = "SELECT name, weekend_price, weekday_price FROM venue WHERE licensed = 1 AND capacity >= $minCapacity AND capacity <= $maxCapacity";
	$res = & $db->query($sql);
	if (PEAR::isError($res)) {
		die($res->getMessage());
	}
	?>
	<table class"table">
		<th>Venues/Details</th>
		<th><?php echo 'name'; ?></th>
		<th><?php echo 'weekend_price'; ?></th>
		<th><?php echo 'weekday_price'; ?></th>

		<?php while ($row = $res->fetchRow()) {
			?>
			<tr>
				<td></td>
				<td><?php echo $row['name']; ?> </td>
				<td><?php echo $row['weekend_price']; ?> </td>
				<td><?php echo $row['weekday_price']; ?> </td>
			</tr>
			<?php }
			?>
			
		</table>
	</body>
	</html>

