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
			
			echo "<tr> <form action='index.php?/INSERT_controller/Update' method='post'>";

			for ($j=0; $j < count($data[$i]); $j++) { 
				
				
				/*echo "<td>" . $data[$i][$j] . "</td>";*/

				if ($j == 0) {
					
					echo "<td> <input type='text' name='cedula' 
					value='" . $data[$i][$j] . "'  /> </td>";
				}
				else{
					echo "<td>" . $data[$i][$j] . "</td>";
				}

			}

		echo "<td class='action-btn'> <input type='submit' value='Update' class='btn-update'/> &nbsp; <a href='index.php?/INSERT_controller/Delete' class='btn-delete'>Delete</a></td>";

			echo "</form></tr>";

		}

		echo "</table>";


 ?>


</div>

</body>
</html>