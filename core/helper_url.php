
<?php 

/**
 *  we are going to use this class to goes to another controller or method, 
 *	if you have a form in your page you can use the method base_url('controller/method')
 *	the base_url prints the controller and method in href or action and
 *	it will be use by "index.php"
 */
class helper_url {

	# array variable to store the default controller and method
	private $url_default;

	function __construct() {

		# we store the default controller and method in this variable
		$this->url_default= require_once('config/default_controller.php');
		
	}

	public function base_url($url=""){ # format -> base_url('controller/method') 

		$controller=""; 
		$method="";

		if (!empty($url)) {
			
			$string= substr($url, 0);

			$rest="";
			$cont=0;

			while ($rest != "/") {

				
				$controller.= $rest; # returns the controller from $url
				$rest= substr($string, $cont, 1);
				$cont++;
			}
			
			$method= substr($string, $cont); # returns the method from $url
		}
		else{

			$controller= $this->url_default['default_controller'];
			$method= $this->url_default['default_method'];

		}

		echo "index.php?/$controller/$method"; # prints the links that will be used by "index.php" 

	}

}








