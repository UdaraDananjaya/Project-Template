<?php 

/**
 * home class
 */
class Web
{
	use Controller;

	public function index()
	{
		$data = cust_log("ffff");
		$this->view('web');
		//$this->view('home',$data);
	}

}
