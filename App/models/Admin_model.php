<?php 


/**
 * User class
 */
class Admin_model
{
	
	use Model;

	protected $table ;
	protected $allowedColumns = [];

	function set_table($name) {
		$this->table = $name;
	}

	function set_allowedColumns($allowedColumns) {
		$this->allowedColumns = $allowedColumns;
	}


}