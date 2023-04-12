<?php
class Admin
{
	use Controller;
	public function index()
	{
		if (empty($_SESSION['USER'])) {
			redirect('Admin/login');
		} // Check Is the user Login
		$user = new Admin_model; // Load Model
		$user->set_table('users'); // Set Model Table
		$data['page'] = "Dashboard"; // Page URL
		$data['pagegroup'] = ""; // Page Sub Group Customer -> Manage Customer
		$data['User'] = $_SESSION['USER']->email; // Login User Name
		$row = $user->custom_query("SELECT COUNT('product_id') as COUNT FROM `users`");
		$row2 = $user->custom_query("SELECT COUNT('product_id') as COUNT FROM `users`");
		$row3 = $user->custom_query("SELECT COUNT('product_id') as COUNT FROM `users`");
		$data['Dashboard'] = array("Customers" => "{$row[0]->COUNT}", "Products" => "{$row2[0]->COUNT}", "Orders" => "{$row3[0]->COUNT}");
		$row = $user->findAll();
		$data['Dashboard_table'] = $row;
		$this->view('Admin/index', $data);
		variable_dump(get_defined_vars());
	}
	public function listuser()
	{
		if (empty($_SESSION['USER'])) {
			redirect('Admin/login');
		} // Check Is the user Login
		$user = new Admin_model; // Load Model
		$user->set_table('users'); // Set Model Table
		$data['page'] = "User List"; // Page URL
		$data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
		$data['User'] = $_SESSION['USER']->email; // Login User Name
		$row = $user->findAll();
		$data['Usres_table'] = $row;
		$this->view('Admin/listuser', $data);
	}
	public function manageuser()
	{
		$data = [];
		if (empty($_SESSION['USER'])) {
			redirect('Admin/login');
		} // Check Is the user Login

		$data['page'] = "Manage User"; // Page URL
		$data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
		$data['User'] = $_SESSION['USER']->email; // Login User Name

		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user = new Admin_model;
			$user->set_table('users');
			$update_data = array("email" => $_POST['inputEmail'], "password" => $_POST['inputPassword'], "date" => $_POST['inputDate']);
			$user->update($_POST['inputId'], $update_data);
			redirect('Admin/listuser');
		}

		if (!empty($_GET['id'])) {
			$user = new Admin_model;
			$user->set_table('users');
			$arr['id'] = $_GET['id'];
			$data['Manage_User'] = $user->first($arr);
			$this->view('Admin/manageuser', $data);
		} else {
			redirect('Admin/listuser');
		}

		//$this->view('Admin/manageuser',$data);
	}
	public function login()
	{
		$data = [];
		if (!empty($_SESSION['USER'])) {
			redirect('Admin/index');
		}
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$user = new Admin_model;
			$user->set_table('users');
			$arr['email'] = $_POST['username'];
			$row = $user->first($arr);
			if ($row) {
				if ($row->password === $_POST['password']) {
					$_SESSION['USER'] = $row;
					redirect('Admin/index');
				}
			}
			$user->errors['email'] = "Wrong email or password";
			$data['errors'] = $user->errors;
		}
		$this->view('login', $data);
	}
	public function logout()
	{
		if (!empty($_SESSION['USER'])) unset($_SESSION['USER']);
		if (empty($_SESSION['USER'])) {
			redirect('Admin/login');
		}
	}
}
