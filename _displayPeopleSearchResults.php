<?php
// expects an array of $person; display the results in a table
// $persons = aray

?>




<head>

<script
src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>


<title>Person Search Results</title>

<style>
#users {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#users td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#users tr:nth-child(even){background-color: #f2f2f2;}

#users tr:hover {background-color: #ddd;}

#users th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #339;
  color: white;
}
</style>
</head>

<table id="users" class="display">
<thead>
<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Street</th>
	<th>City</th>
	<th>State</th>
	<th>ZIP</th>
</tr>
</thead>
<tbody>

<?php 
for ($x = 0; $x < count($persons); $x++) {
    
    echo "<tr>";    
        // example of the aray
        // $persons[0]['FIRST_NAME'] = 'Clark;
    echo "<td>" . $persons[$x]['ID'] . "</td>";
    echo "<td>" . $persons[$x]['FIRST_NAME'] . "</td>";
    echo "<td>" . $persons[$x]['LAST_NAME'] . "</td>";
    echo "<td>" . $persons[$x]['STREET'] . "</td>";
    echo "<td>" . $persons[$x]['CITY'] . "</td>";
    echo "<td>" . $persons[$x]['STATE'] . "</td>";
    echo "<td>" . $persons[$x]['ZIP'] . "</td>";        
    echo "</tr>";

}
?>

</tbody>
</table>
<script>
$(document).ready( function () {
    $('#users').DataTable();
} );</script>
