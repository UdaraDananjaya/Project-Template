<?php 

/**
 * Admin class
 */
class Admin
{
	use Controller;

	public function index()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
		$data['active']="Dashboardx";
		$data['page']="Profile";
		// $data['page']="Alerts";
		// $data['pagegroup']="Components";
		$this->view('layout/header',$data);
		$this->view('index',$data);
		$this->view('layout/footer',$data);
		//$this->view('index',$data);
	
	}
	public function login()
	{

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
		$this->view('login',$data);
	}

}
