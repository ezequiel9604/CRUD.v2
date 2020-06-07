
<?php

/*
 *	this is the class which creates the connection to the database 
 */
class db_connection{

	/*
	 *	this is connection variable, this is defined protected because it will be used 
	 *	for all the classes which Inheritance of this class, those classes are ("querys.php")
	 */
	protected $link;


	/*
	 *	these are variables necessary for connection, these are going to be use in this class only.
	 *	there varibles will be defined with the array of file 'data_db_connection.php' who saves 
	 *	data for the connection
	 */	
	private $host, $user, $passwd, $dbname, $charset;


	/*
	 * contructor method which creates the connection to the database and save it in $link variable
	 */
	public function __construct(){

		# in this variable we save the connection data that was configure in the own file
		$data_connection= require_once('config/data_db_connection.php');


		$this->host= $data_connection['db_host'];
		$this->user= $data_connection['db_user'];
		$this->passwd= $data_connection['db_passwd'];
		$this->name= $data_connection['db_name'];
		$this->charset= $data_connection['db_charset'];

		try {

			# creating the connection which is saved in the connection variable $link
			$this->link= new PDO("mysql:host=$this->host; dbname=$this->name", $this->user, $this->passwd);

			# configuring the attribute for the errors and exceptions
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			# configuring the characters
			$this->link->exec("SET CHARACTER SET $this->charset");

			
		} catch (Exception $e) {
		
			# we call the 'error_management.php' file which takes care of the error messages.
			require_once('error_management.php');

			error_management::error_table($e->getTrace(), $e->getCode());

			exit();

		}

	}

}



