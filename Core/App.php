<?php
/**
 * Main Application
 */
class App
{
	private $controller = DEFCON;
	private $method 	= 'index';
	private function splitURL()
	{
		$URL = $_GET['url'] ?? DEFCON;
		$URL = explode("/", trim($URL, "/"));
		return $URL;
	}
	public function loadController()
	{
		$URL = $this->splitURL();
		/** select controller **/
		$filename = "../App/controllers/" . ucfirst($URL[0]) . ".php";
		if (file_exists($filename)) {
			require $filename;
			$this->controller = ucfirst($URL[0]);
			unset($URL[0]);
		} else {

			$filename = "../App/controllers/_404.php";
			require $filename;
			$this->controller = "_404";
		}
		$controller = new $this->controller;
		/** select method **/
		if (!empty($URL[1])) {
			if (method_exists($controller, $URL[1])) {
				$this->method = $URL[1];
				unset($URL[1]);
			}
		}
		call_user_func_array([$controller, $this->method], $URL);
	}
}
