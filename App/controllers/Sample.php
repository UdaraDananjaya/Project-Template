<?php
class Sample
{
    use Controller;
    public function index()
    {
        if (empty($_SESSION['USER'])) {
            redirect('Sample/login');
        } // Check Is the user Login
        $user = new Demo_model; // Load Model
        $user->set_table('users'); // Set Model Table
        $data['page'] = "Dashboard"; // Page URL
        $data['pagegroup'] = ""; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name
        $row = $user->custom_query("SELECT COUNT('id') as COUNT FROM `users`");
        $row2 = $user->custom_query("SELECT COUNT('id') as COUNT FROM `users`");
        $row3 = $user->custom_query("SELECT COUNT('id') as COUNT FROM `users`");
        $data['Dashboard'] = array("Customers" => "{$row[0]->COUNT}", "Products" => "{$row2[0]->COUNT}", "Orders" => "{$row3[0]->COUNT}");
        $row = $user->findAll();
        $data['Dashboard_table'] = $row;
        $this->view('Sample/index', $data);
    }
    public function List_User()
    {
        if (empty($_SESSION['USER'])) {
            redirect('Sample/login');
        } // Check Is the user Login
        $user = new Demo_model; // Load Model
        $user->set_table('users'); // Set Model Table
        $data['page'] = "User List"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name
        $row = $user->findAll();
        $data['Usres_table'] = $row;
        $this->view('Sample/list_user', $data);
    }
    public function Manage_User()
    {
        $data = [];
        if (empty($_SESSION['USER'])) {
            redirect('Sample/login');
        } // Check Is the user Login

        $data['page'] = "Manage User"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new Demo_model;
            $user->set_table('users');
            $update_data = array("email" => $_POST['inputEmail'], "password" => $_POST['inputPassword'], "date" => $_POST['inputDate']);
            $user->update($_POST['inputId'], $update_data, "id");
            redirect('Sample/List_User');
        }

        if (!empty($_GET['id'])) {
            $user = new Demo_model;
            $user->set_table('users');
            $arr['id'] = $_GET['id'];
            $data['Manage_User'] = $user->first($arr);
            $this->view('Sample/manage_user', $data);
        } else {
            redirect('Sample/List_User');
        }
    }

    public function Add_User()
    {
        $data = [];
        if (empty($_SESSION['USER'])) {
            redirect('Sample/login');
        } // Check Is the user Login

        $data['page'] = "Add User"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = new Demo_model;
            $user->set_table('users');
            $insert_data = array("email" => $_POST['inputEmail'], "password" => $_POST['inputPassword']);
            $user->insert($insert_data);
            redirect('Sample/List_User');
        }
        $this->view('Sample/add_user', $data);
    }
    public function Delete_User()
    {
        $data = [];
        if (empty($_SESSION['USER'])) {
            redirect('Sample/login');
        } // Check Is the user Login

        $data['page'] = "Add User"; // Page URL
        $data['pagegroup'] = "UserManagement"; // Page Sub Group Customer -> Manage Customer
        $data['User'] = $_SESSION['USER']->email; // Login User Name
        $user = new Demo_model;
        $user->set_table('users');
        $row = $user->custom_query("SELECT id,email FROM `users`;");
		$data['User_table'] = $row;

        if (!empty($_GET['delete'])) {
            $user->delete($_GET['delete']);
            redirect('Sample/List_User');
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $insert_data = array("email" => $_POST['inputEmail'], "password" => $_POST['inputPassword']);
            $user->insert($insert_data);
            redirect('Sample/List_User');
        }


        $this->view('Sample/delete_user', $data);
    }
    public function login()
    {
        $data = []; //Create View Data Array
        if (!empty($_SESSION['USER'])) { //Check Session
            redirect('Sample/index'); // If Session User Not empty Redirect 
        }
        if ($_SERVER['REQUEST_METHOD'] == "POST") { // If POST Data Available 
            $user = new Demo_model; //Create Model Object
            $user->set_table('users'); //Set Table
            $arr['email'] = $_POST['username']; // 
            $row = $user->first($arr);
            if ($row) {
                if ($row->password === $_POST['password']) {
                    $_SESSION['USER'] = $row;
                    redirect('Sample/index');
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
            redirect('Sample/login');
        }
    }
}
