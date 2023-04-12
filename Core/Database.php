<?php
/**
 * Database Class
 */
trait Database
{
	private function connect()
	{
		$string = "mysql:hostname=" . CONFIG['db']['hostname'] . ";dbname=" . CONFIG['db']['database'];
		$con = new PDO($string, CONFIG['db']['username'],  CONFIG['db']['password']);
		return $con;
	}
	public function query($query, $data = [])
	{
		$con = $this->connect();
		$stm = $con->prepare($query);
		$check = $stm->execute($data);
		if ($check) {
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if (is_array($result) && count($result)) {
				return $result;
			}
		}
		return false;
	}
	public function get_row($query, $data = [])
	{
		$con = $this->connect();
		$stm = $con->prepare($query);

		$check = $stm->execute($data);
		if ($check) {
			$result = $stm->fetchAll(PDO::FETCH_OBJ);
			if (is_array($result) && count($result)) {
				return $result[0];
			}
		}
		return false;
	}
}
