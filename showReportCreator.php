<?php
require_once 'header.php';
require_once 'autoLoader.php';
?>

<head>
<link rel="stylesheet" type="text/css" href="forms.css">
</head>

<div class="container">
<h2>Sales Report Generator</h2>

<form class="inputForm" action="processOrdersReport.php">

	<div class="form-group">
		<label for="startdate">
		Start Date:
		</label>
		<input class="form-control" name="startdate" type="date">
	</div>
	
	<div class="form-group">
		<label for="enddate">
		End Date:
		</label>
		<input class="form-control" name="enddate" type="date">
	</div>
	
	<a class="btn btn-dark" href="index.php"> Cancel</a>
	<input class="btn btn-primary" type="submit" value="Generate Report">

</form>
</div>