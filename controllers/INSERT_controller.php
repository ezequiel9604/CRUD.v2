

<?php 

require_once("core/controller_base.php");

class INSERT_controller extends controller_base {
	
	public function __construct() {

		parent::__construct();

		//$this->load_model("READ_model");

		$this->load_model("INSERT_model");

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

p.saved{
	font-family: sans-serif;
	font-size: 18;
	display: inline-block;
	padding:10px 15px;
	border-radius:8px;
	text-shadow: 1px 1px 2px #666;
	background-color: #66a3ff;
	border:2px solid #0047b3;
	color: ##0047b3;
}

</style>

";

	}


	# Any other method below this is not part of this framework
	# please, create method after this comments.


	public function Insert() {
		
		// TODO: programming here INSERT code
		session_start();
		
		$existdb= $this->models['INSERT_model']->change_database_name($_SESSION['DBNAME']);

		if ($existdb) {
			
			$META= $this->models['INSERT_model']->Get_fields_table($_SESSION['TABLE']);

			if (!is_null($META)) {  # if $META is not null
				
				$this->load_view('insert_data', array(), $META);
			}
			else{

				echo "table is not contained in this database. ";

				// TODO: add a link to go back
			}

		}
		else{

			// TODO: add a link to go back
			echo "database does not exist.";
		}

		
	}

	public function Inserted($post) {

		$array_index= array_values($post);
		$array_key= array_keys($post);

		session_start();

		$exist_register= $this->models['INSERT_model']->exist_register($array_key[0], 
			$array_index[0], $_SESSION['TABLE']);

		if (!$exist_register) {  # if not exist register
			
			$saved= $this->models['INSERT_model']->insert_data_table($array_key, $array_index,
				$_SESSION['TABLE']);

			if ($saved) {
				
				echo "<p class='saved'>Info saved in database.
				<a href='".$_SERVER['PHP_SELF']."'>Go back!</a>.</p>";

			}
			else{
				echo "<p class='error'>Info saved in database.
				<a href='".$_SERVER['PHP_SELF']."'>Go back!</a>.</p>";
			}

		}
		else{
			echo "<p class='error'>register already exist on this table.
				<a href='".$_SERVER['PHP_SELF']."'>Go back!</a>.</p>";
		}
	
	}


}
