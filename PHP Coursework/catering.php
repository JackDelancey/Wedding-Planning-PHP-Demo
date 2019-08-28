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
	border: 1px solid black;
	background-color: f2f2f2;
}

</style>
<body>
<?php
$numRows = 5;
$numColumns = 6;
$c1 = $_GET["c1"];
$c1 = $_GET["c2"];
$c1 = $_GET["c3"];
$c1 = $_GET["c4"];
$c1 = $_GET["c5"];
?>
<table class"table">
<?php for ($i=0;$i<$numRows;$i++): ?>
	<tr>
	<?php for ($j=0;$j<$numColumns;$j++): ?>
		<td><?php echo $j ?></td>
	<?php endfor; ?>
	</tr>
<?php endfor; ?>
</table>



<!--<table style="width:100%">
<tr>
<th>Cost Per Person/Party Size</th>
<th>5</th>
<th>10</th>
<th>15</th>
<th>20</th>
<th>25</th>
</tr>
<tr>
<td>30</td>
<td>150</td>
<td>300</td>
<td>450</td>
<td>600</td>
<td>750</td>
</tr>
<tr>
<td>35</td>
<td>175</td>
<td>350</td>
<td>525</td>
<td>700</td>
<td>875</td>
</tr>
<tr>
<td>40</td>
<td>200</td>
<td>400</td>
<td>600</td>
<td>800</td>
<td>1000</td>
</tr>
<tr>
<td>45</td>
<td>225</td>
<td>450</td>
<td>675</td>
<td>900</td>
<td>1125</td>
</tr>
</body>
</html>