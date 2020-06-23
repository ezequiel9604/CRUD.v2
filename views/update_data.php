<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Insert Register</title>
		<link rel="stylesheet" href="css/styles.css"/>
</head>
<body>
	


<form action='index.php?/INSERT_controller/Updated' method='post' id='insert'>
	
	<table>
		<tr>
			<th colspan='2'>INSERT REGISTER:</th>
		</tr>

<?php 

	for ($i=0; $i < count($metadata); $i++) { 
		
		echo "<tr>
				<td>
					<label for=''>".$metadata[$i].": </label>
				</td>
				<td>";

				if ($i == 0) {
					echo "<input type='text' name='".$metadata[$i]."' value='".$data[$i]."' class='input_disabled'/>";
				}
				else{
					echo "<input type='text' name='".$metadata[$i]."' value='".$data[$i]."' />";
				}

				
				echo "</td>";
	}
	

 ?>

		<tr>
			<td colspan='2'>
				<input type='submit' value='Save' />
			</td>
		</tr>
	</table>

</form>

</body>
</html>