<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="css/styles.css"/>
</head>
<body>

<h1>
	<span class="blue">C</span> 
	<span class="red">R</span>
	<span class="green">U</span>
	<span class="purple">D</span>
</h1>

<div class="finder-results">

<?php 	

		echo "<table> <tr>";

		for ($z=0; $z < count($metadata); $z++) { 
			
			echo "<th> " . $metadata[$z]. " </th>";
		}

		echo "<th class='action-btn'> Action: &nbsp;<a href='index.php?/INSERT_controller/Insert' class='btn-insert'>Insert</a></th>";

		echo "</tr>";
		
		for ($i=0; $i < count($data); $i++) { 
			
			echo "<tr>";

			for ($j=0; $j < count($data[$i]); $j++) { 
				
				echo "<td>" . $data[$i][$j] . "</td>";

			}

			echo "<td class='action-btn'> <a href='#' class='btn-update'>Update</a> &nbsp; <a href='#' class='btn-delete'>Delete</a></td>";

			echo "</tr>";

		}

		echo "</table>";


 ?>


</div>

</body>
</html>