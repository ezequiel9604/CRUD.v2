
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="css/styles.css"/>
<script>	
window.addEventListener("load", function (){document.getElementById("table").focus();}, false);
</script>
</head>
<body>

<h1>
	<span class="blue">C</span> 
	<span class="red">R</span>
	<span class="green">U</span>
	<span class="purple">D</span>
</h1>

<form action="<?php echo $url->base_url('READ_controller/Read'); ?>" method="post" class="finder-form">
	
	<input type="text" name="table" autocomplete="off" id="table" />
	<input type="submit" value="Buscar" />

<?php 

	echo "<div class='select-db'>
			Select database:
			<select name='db-name' id=''>";

	for ($i=0; $i < count($data); $i++) { 
		
		echo "<option value='".$data[$i]."'>&nbsp; " .$data[$i] ."</option>";
	}


	echo "	</select>
		  </div>";

 ?>

</form>



</body>
</html>