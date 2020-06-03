<?php 


if (empty($_GET)) { # if $_GET is empty then call the default controller and method, it is always (wellcome, index), please do not delete those files in (default_controller.php)

	# includes the file with the specified controller
	$default_path= require_once("config/default_controller.php");
	require_once("controllers/".$default_path['default_controller'].".php");

	# call the method of the controller that was included
	$instance= new $default_path["default_controller"]();
	$instance->index();

}
else{

	# $_GET = index.php?/controller/method
	$url= key($_GET); # returns /controller/method
	$string= substr($url, 1); #returns controller/method

	$controller=""; # variable to store the controller
	$method=""; # variable to store the method

	$rest="";
	$cont=0;

	while ($rest != "/") {
		
		$controller.= $rest;
		$rest= substr($string, $cont, 1);
		$cont++;

	}

	$method= substr($string, $cont);

	if (empty($_POST)) {
		
		# includes the file with the specified controller
		require_once("controllers/$controller.php");

		# call the method of the controller that was included
		$instance= new $controller();
		$instance->$method();

	}
	else{

		# includes the file with the specified controller
		require_once("controllers/$controller.php");

		# call the method of the controller that was included using the $_POST as parameter
		$instance= new $controller();
		$instance->$method($_POST);

	}	

}

# Designed by Ezequiel.


