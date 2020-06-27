
<?php 

require_once("db_connection.php");

/**
 *  this is the class to create and use querys. some easy querys has been create to be used.
 *	also you can create your own querys for your proyect.
 */
class querys extends db_connection{

	# this variable is used to get the result in objects 
	private $result_like_object;

	# this variable is used to get the result in arrays
	private $result_like_array;

	# this variable is use to save the result before user call one of the querys method,
	# after that the value of this variable will be saved in one of the previous class variable
	# this is the pdo statement object
	private $resultset;
	

	public function __construct(){
		
		# this statement execute the constructor method of the father class 
		# also creates the connection to database
		parent::__construct();

		# initializing these two variable as array first one array index and 
		# second one array object
		$this->result_like_array= array();

		$this->result_like_object= array();

	}

	public function select_all($table){

		try {

			$sql= "SELECT * FROM $table;";

			$this->resultset= $this->link->prepare($sql);

			$this->resultset->execute(array());
			
		} catch (Exception $e) {
			
			require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());

		}

	}

	# this method returns the result of the sql query as array
	# it can be index array or object array 	

	public function get_query_results($type= "array"){

		if ($type == "array") {

			$this->result_like_array= $this->resultset->fetchAll(PDO::FETCH_ASSOC);

			return $this->result_like_array;

		}
		else if($type == "index"){

			$this->result_like_array= $this->resultset->fetchAll(PDO::FETCH_NUM);

			return $this->result_like_array;

		}
		else if($type == "object"){

			$this->result_like_object= $this->resultset->fetchAll(PDO::FETCH_OBJ);

			return $this->result_like_object;

		}
		
	}

	# returns the affected rows of the last query
	public function rows_affected(){

		return $this->resultset->rowCount();
	}

	# please after this comments you can create your own methods



	public function describe_table($table) {
		
		try {

			$sql= "DESCRIBE $table;";

			$this->resultset= $this->link->prepare($sql);

			$this->resultset->execute(array());

			return true;
			
		} catch (Exception $e) {
			
			/*require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());*/

			return false;

		}

	}

	public function show_databases(){

		try {

			$sql= "SHOW DATABASES;";

			$this->resultset= $this->link->prepare($sql);

			$this->resultset->execute(array());
			
		} catch (Exception $e) {
			
			require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());

		}

	}

	public function use_database($dbname) {

		try {

			$sql= "USE $dbname;";

			$this->resultset= $this->link->prepare($sql);

			$this->resultset->execute(array());

			return true;
			
		} catch (Exception $e) {
			
			/*require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());*/

			return false;

		}

	}

	public function select_one($name, $value, $table) {
		
		try {

			$sql= "SELECT $name FROM $table WHERE $name = ?;";

			$this->resultset= $this->link->prepare($sql);

			$this->resultset->bindParam(1, $value, PDO::PARAM_STR);

			$this->resultset->execute();

			return true;
			
		} catch (Exception $e) {
			
			require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());

			return false;

		}

	}

	public function select_one2($key, $value, $table) {
		
		try {

			$sql= "SELECT * FROM $table WHERE $key = ?;";

			$this->resultset= $this->link->prepare($sql);

			$this->resultset->bindParam(1, $value, PDO::PARAM_STR);

			$this->resultset->execute();

			return true;
			
		} catch (Exception $e) {
			
			require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());

			return false;

		}

	}


	public function insert_into_all($keys, $values, $table) {

		$fields= implode(" , ", $keys);

		$sql= "INSERT INTO $table($fields) VALUES (";

		for ($i=0; $i < count($keys); $i++) { 
			
			if ($i == count($keys)-1) {
				$sql = $sql . "?);";
				break;
			}

			$sql = $sql . "?,";
		}

		try {			

			$this->resultset= $this->link->prepare($sql);

			$cont=1;
			for ($i=0; $i < count($keys); $i++) { 
				$this->resultset->bindParam($cont, $values[$i]);
				$cont++;
			}

			$this->resultset->execute();

			return true;
			
		} catch (Exception $e) {
			
			require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());

			return false;

		}

	}	


	public function update_into_all($keys, $values, $table) {
		

		$sql= "UPDATE $table SET ";

		for ($i=1; $i < count($keys); $i++) { 

			if ($i == count($keys)-1) {
				$sql = $sql . $keys[$i] . " = ? ";
				break;
			}
			
			$sql =  $sql . $keys[$i] . " = ? , ";

		}

		$sql = $sql . " WHERE " . $keys[0] . " = '" .$values[0] . "' ;";

		try {

			$this->resultset= $this->link->prepare($sql);

			for ($i=1; $i < 6; $i++) { 
				$this->resultset->bindParam($i, $values[$i]);
			}

			$this->resultset->execute();

			return true;

		 	
		 } catch (Exception $e) {
		 	
		 	require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());

			return false;

		 } 

	}


	public function delete_register($table, $condition) {
		
		try{

			$sql= "DELETE FROM $table WHERE cedula= ?";

			$this->resultset= $this->link->prepare($sql);

			$this->resultset->bindParam(1, $condition, PDO::PARAM_STR);

			$this->resultset->execute();

			return true;


		}catch(Exception $e){

			
			require_once("error_management.php");

			error_management::error_table($e->getTrace(), $e->getCode());

			return false;
			
		}

	}

}


