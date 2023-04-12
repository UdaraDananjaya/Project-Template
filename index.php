<?php
/**
 * SimpleX PHP Framework
 * @package SimpleXPHP
 * @author	Udara Dananjaya
 * @link    https://github.com/Udara-Dananjaya/Project-Template
 * @since	Version 1.0.0
 */

//Page Rendering
$config['Render_Start']= microtime(true);

//Start Session
session_start();

//Framework Initialization
require "Core/init.php";

//Error Reporting 
DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

//Create App Object And Load loadController()
$app = new App;
$app->loadController();

if (SYSTEM_DUMP) {system_dump($config['Render_Start'],microtime(true));} 
if (VARIABLE_DUMP) {variable_dump(get_defined_vars());} 

//var_dump(get_defined_vars());