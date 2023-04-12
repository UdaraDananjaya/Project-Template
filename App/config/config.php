<?php
$config['system_dump'] =false;
$config['variable_dump'] =false;

// debug configuration
$config['debug'] =true;// enable debug mode (true/false)

define('BASE', 'http://localhost/project-template/'); // base url for the site

// site configuration
$config['app_name'] ="my webiste" ;// site name
$config['app_desc'] ="my webiste" ;// site name

// email configuration
$config['smtp_host'] ="smtp.example.com" ; // smtp server hostname
$config['smtp_port'] =587 ; // smtp server port
$config['smtp_username'] ="email@example.com" ; // smtp username
$config['smtp_password'] ="password" ; // smtp password
$config['admin_email'] ="admin@example.com" ; // administrator email address

// routes configuration
$config['defcon']='Admin'; // default controller
$config['defmet']= 'index'; // default controller
