<?php 

/**
 * login class
 */
class Login
{
	use Controller;

	public function index()
	{
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = new User;
			$arr['email'] = $_POST['email'];

			$row = $user->first($arr);
			
			if($row)
			{
				if($row->password === $_POST['password'])
				{
					$_SESSION['USER'] = $row;
					redirect('home');
				}
			}

			$user->errors['email'] = "Wrong email or password";

			$data['errors'] = $user->errors;
		}

		$this->view('index',$data);	
		// $this->view('signup',$data);
		// $this->view('admin/signup',$data);
		//$this->view('login',$data);
	}

}
