

<?php 

require_once("core/model_base.php");

/**
 *   
 */
class INSERT_model extends model_base {
	
	public function __construct() {
		
		parent::__construct();

	}

	# Any other method below this is not part of this framework
	# please, create method after this comments.



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



	public function exist_register($name, $value, $table) { # check if register exists

		$this->query->select_one($name, $value, $table);

		if ($this->query->rows_affected() > 0) { # if exist register
			
			return true;
		}
		else{
			return false;
		}

	}


	public function insert_data_table($keys, $values, $table) { # insert a new register
		
		$this->query->insert_into_all($keys, $values, $table);

		if ($this->query->rows_affected() > 0) {
			return true;
		}
		else{
			return false;
		}

	}

}

