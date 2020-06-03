
<?php 

require_once("core/model_base.php");

/**
 *   $this->query
 */
class READ_model extends model_base {
	
	public function __construct() {
		
		parent::__construct();

	}


	public function change_database_name($dbname) {
		
		return $this->query->use_database($dbname);
	}


	public function Get_fields_table($table) {

		$value= $this->query->describe_table($table);

		if ($value) {
			
			$RS= $this->query->get_query_results("index");

			$result= array();

			for ($i=0; $i < count($RS); $i++) { 
				
				$result[$i]= $RS[$i][0]; # creates an array of 1 dimension.
			}

			return $result;
		}
		else{

			return null;
		}
		
	}


	public function Get_data_table($table) {

		//$this->query->change_database($table)

		$this->query->select_all($table);

		$result= $this->query->get_query_results("index");

		return $result;
		
	}



}
