<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Wedding Venue</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>

	<header class="header">
		<h1>Wedding Venues</h1>
		<p>This is a fun little tool to help you get the perfect wedding you deserve.</p>
	</header>
	
	<form action="wedding_results.php" method=GET>
		<div class="field">
			<label for="capacity">Capacity</label>
			<input type="number" name="capacity" id="capacity" value="0"/>
		</div>
		<div class="field">
			<label for="earliest">Earliest</label>
			<input type="date" name="earliest" id="earliest"/>
		</div>
		<div class="field">
			<label for="latest">Latest</label>
			<input type="date" name="latest" id="latest"/>
		</div>
		<div class="field">
			<label for="grade_1">Grade 1</label>
			<input type="radio" name="grade" id="grade_1" value="1" checked="checked">
		</div>
		<div class="field">
			<label for="grade_2">Grade 2</label>
			<input type="radio" name="grade" id="grade_2" value="2">
		</div>
		<div class="field">
			<label for="grade_3">Grade 3</label>
			<input type="radio" name="grade" id="grade_3" value="3">
		</div>
		<div class="field">
			<label for="grade_4">Grade 4</label>
			<input type="radio" name="grade" id="grade_4" value="4">
		</div>
		<div class="field">
			<label for="grade_5">Grade 5</label>
			<input type="radio" name="grade" id="grade_5" value="5">
		</div>
		<div id="actions">
			<input type="submit" value="Submit"/>
		</div>
	</form>
</body>
</html>