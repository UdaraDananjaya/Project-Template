<?php

/**
 * Common Function List
 */
function show($stuff)
{
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}
function esc($str)
{
	return htmlspecialchars($str);
}
function redirect($path)
{
	header("Location: " . ROOT . $path);
	die;
}
function cust_log($log_data = '')
{
	$logFile = '../logs/system.log';
	$dateTime = date('Y-m-d H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];
	$message = "[$dateTime] [$ip] {{$log_data}}\n";
	file_put_contents($logFile, $message, FILE_APPEND);
	$logArray = file($logFile);
	$logArray = array_slice($logArray, -5);
	file_put_contents($logFile, implode('', $logArray));
}
function sanitize_input($input)
{
	$input = strip_tags($input);
	$input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
	$input = trim($input);
	return $input;
}
function rand_int($min, $max)
{
	return rand($min, $max);
}
function rand_str($length)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$random_string = '';
	for ($i = 0; $i < $length; $i++) {
		$random_string .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $random_string;
}
function encrypt_password($password, $salt)
{
	$encrypted_password = '';
	for ($i = 0; $i < strlen($password); $i++) {
		$char = $password[$i];
		$keychar = $salt[$i % strlen($salt)];
		$char = chr(ord($char) + ord($keychar));
		$encrypted_password .= $char;
	}
	return base64_encode($encrypted_password);
}
function decrypt_password($encrypted_password, $salt)
{
	$password = '';
	$encrypted_password = base64_decode($encrypted_password);
	for ($i = 0; $i < strlen($encrypted_password); $i++) {
		$char = $encrypted_password[$i];
		$keychar = $salt[$i % strlen($salt)];
		$char = chr(ord($char) - ord($keychar));
		$password .= $char;
	}
	return $password;
}
