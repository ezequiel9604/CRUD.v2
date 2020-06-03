
<?php 

/**
 * 	this is the controller base class, this will be used as base and father class
 *	for all controller classes. this class has 2 useful methods (load_view and load_model)
 */
class controller_base {

	# in this variable you will save the models that you will use in your proyect
	# the variable is an associated array. format $this->models['model_name'];
	protected $models;
	
	public function __construct(){

		$this->models= array();
	}

	public function load_view($filename, $data= array(), $metadata= array()){ # method which calls the view that will show up
		
		# these statements verify if $filename has the the php extension (welcome.php)
		$rest="";
		$dot=false;
		
		for ($i=0; $i < strlen($filename); $i++) { 
			
			$rest= substr($filename, $i, 1);

			if ($rest == ".") {
				$dot= true;
			}
		}

		# if $filename has the php extension it takes it out
		$rest="";
		$filename_without_extension="";
		
		if ($dot) {

			$cont= 0;

			while($rest != ".") {
				
				$filename_without_extension.= $rest;

				$rest= substr($filename, $cont, 1);

				$cont++;
			}

			require_once("core/helper_url.php");

			$url= new helper_url();

			require_once("views/".$filename_without_extension.".php");

		}
		else{

			require_once("core/helper_url.php");

			$url= new helper_url();

			require_once("views/".$filename.".php");

		}

	}

	public function load_model($filename) { # method which calls the view
		
		# these statements verify if $filename has the the php extension (welcome.php)
		$rest="";
		$dot=false;
		
		for ($i=0; $i < strlen($filename); $i++) { 
			
			$rest= substr($filename, $i, 1);

			if ($rest == ".") {
				$dot= true;
			}
		}

		# if $filename has the php extension it takes it out
		$rest="";
		$filename_without_extension="";
		
		if ($dot) {

			$cont= 0;

			while($rest != ".") {
				
				$filename_without_extension.= $rest;

				$rest= substr($filename, $cont, 1);

				$cont++;
			}

			require_once("models/".$filename_without_extension.".php");

			$this->models[$filename_without_extension]= new $filename_without_extension();

		}
		else{

			require_once("models/".$filename.".php");

			$this->models[$filename]= new $filename();

		}

	}

}



