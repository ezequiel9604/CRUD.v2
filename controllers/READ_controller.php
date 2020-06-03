
<?php 

require_once("core/controller_base.php");

class READ_controller extends controller_base {
	
	public function __construct() {

		parent::__construct();

		$this->load_model("READ_model");

	}

	public function Read($post) {

		$exist= $this->models['READ_model']->change_database_name($post['db-name']);

		if ($exist) { # if database exists

			// TODO: validate if the table exists or not.

			$META= $this->models['READ_model']->Get_fields_table($post['table']);

			if (!is_null($META)) { # if table is contained in same database
			
				$result= $this->models['READ_model']->Get_data_table($post['table']);

				$this->load_view("show_data", $result, $META);	
			}
			else{

				echo "table is not contained in this database.";
				//header("location:".$_SERVER['PHP_SELF']);
			}

		}
		else{

			echo "database does not exist.";
			//header("location:".$_SERVER['PHP_SELF']);
		}


	}

	# Any other method below this is not part of this framework
	# please, create method after this comments.




}
