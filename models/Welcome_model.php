
<?php 

require_once("core/model_base.php");

/**
 *   $this->query
 */
class Welcome_model extends model_base {
	
	public function __construct() {
		
		parent::__construct();

	}


	public function Get_databases() {

		$this->query->show_databases();

		$RS= $this->query->get_query_results("index");

		$result= array();

		for ($i=0; $i < count($RS); $i++) { 
			
			$result[$i]= $RS[$i][0]; // creates an array of 1 dimesion.

		}

		return $result;  
		
	}



}









 ?>