<div class="container">

<head>
<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
  
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #339;
  color: white;
}
</style>
</head>

<table id="customers" class="display">
<thead>
<tr>
	<th>ID</th>
	<th>Date</th>
	<th>Total Price</th>
	<th>User ID</th>
	<th>Address ID</th>
</tr>
</thead>
<tbody>

<?php 
//$reportTotal = 0;

for ($x = 0; $x < count($saleReport); $x++) {

    echo "<tr>";    
    echo "<td>" . $saleReport[$x]['ID'] . "</td>";
    echo "<td>" . $saleReport[$x]['DATE'] . "</td>";
    echo "<td>$" . $saleReport[$x]['TOTAL_PRICE'] . "</td>";
    echo "<td>" . $saleReport[$x]['USERS_ID'] . "</td>";
    echo "<td>" . $saleReport[$x]['ADDRESSES_ID'] . "</td>";
    echo "</tr>";

}
?>

</tbody>
</table>

<script>
$(document).ready( function () {
    $('#customers').DataTable();
} );
</script>

</div>
