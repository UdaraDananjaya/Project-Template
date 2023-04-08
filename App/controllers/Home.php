<?php 

/**
 * home class
 */
class Home
{
	use Controller;

	public function index()
	{
		$data = cust_log("ffff");
		$this->view('home');
		//$this->view('home',$data);
	}

}
