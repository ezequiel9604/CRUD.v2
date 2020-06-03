
<?php 


/**
 * 	this is the model base class this is going to work as base and father class of the model classes
 *  in the model classes you have to create the logic of your proyect only like verify login, 
 *  calculate something that you will save in the data base
 */
class model_base {
	
	# this variable is going to save an object of the query class that you will you to cosult 
	# the data base only
	protected $query;

	public function __construct(){
		
		require_once("core/querys.php");

		$this->query= new querys();

	}

}

