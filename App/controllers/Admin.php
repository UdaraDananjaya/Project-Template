<?php 

/**
 * Admin class
 */
class Admin
{
	use Controller;

	public function index()
	{
		if (empty($_SESSION['USER'])){redirect('Admin/login');}
		//$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->email;
		$data['page']="Dashboard";
		$data['pagegroup']="";
		// $data['page']="Alerts";
		// $data['pagegroup']="Components";
		//$this->view('layout/header',$data);
		//$this->view('index',$data);
		$this->view('Admin/index',$data);
		//$this->view('index',$data);
	}
	public function login()
	{
		$data=[];
		if (!empty($_SESSION['USER'])){redirect('Admin/index');}
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = new Admin_model;
			$user->set_table('users');
			$arr['email'] = $_POST['username'];
			$row = $user->first($arr);
			if($row)
			{
				if($row->password === $_POST['password'])
				{
					$_SESSION['USER'] = $row;
					redirect('Admin/index');
				}
			}
			$user->errors['email'] = "Wrong email or password";
			$data['errors'] = $user->errors;
		}
		$this->view('login',$data);
	}

}
