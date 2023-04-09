<?php

/**
 * Framework Initialization
 * `spl_autoload_register` is a PHP function used for automatic class loading.
 * config -> Configuration file
 * functions -> Common functions
 * Database -> Database Common file
 * Model -> Database Model
 * Controller -> Controller Class
 * App -> URL Routing and Front-Controller file
 */

spl_autoload_register(function ($classname) {
	require $filename = "../App/models/" . ucfirst($classname) . ".php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'App.php';
