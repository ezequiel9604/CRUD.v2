
<?php 

# $this->models[$filename]

require_once("core/controller_base.php");

class Welcome extends controller_base {
	
	public function __construct() {

		parent::__construct();

		$this->load_model("Welcome_model");

	}

	public function index() {

		$META= $this->models['Welcome_model']->Get_databases();

		$this->load_view("index", $META);
	}

	# Any other method below this is not part of this framework
	# please, create method after this comments.




}
