
<?php 

require_once("core/controller_base.php");

class READ_controller extends controller_base {
	
	public function __construct() {

		parent::__construct();

		$this->load_model("READ_model");

echo "

<style>

p.error{
	font-family: sans-serif;
	font-size: 18;
	display: inline-block;
	padding:10px 15px;
	border-radius:8px;
	text-shadow: 1px 1px 2px #666;
	background-color: #ff6666;
	border:2px solid #b30000;
	color: #800000;
}

</style>

";

	}


	# Any other method below this is not part of this framework
	# please, create method after this comments.

	public function Read($post) {

		$exist= $this->models['READ_model']->change_database_name($post['db-name']);

		if ($exist) { # if database exists

			// TODO: validate if the table exists or not.

			$META= $this->models['READ_model']->Get_fields_table($post['table']);

			if (!is_null($META)) { # if table is contained in same database
			
				$result= $this->models['READ_model']->Get_data_table($post['table']);

				session_start(); 
				$_SESSION['DBNAME']= $post['db-name']; # stores database's name 
				$_SESSION['TABLE']= $post['table']; # stores table's name 


				$this->load_view("show_data", $result, $META);	

			}
			else{

				echo "<p class='error'>Table is not contained in this database.
				<a href='".$_SERVER['PHP_SELF']."'>Go back!</a>.</p>";

			}

		}
		else{

			echo "<p class='error'>Database does not exist.
				<a href='".$_SERVER['PHP_SELF']."'>Go back!</a>.</p>";

		}


	}


}
