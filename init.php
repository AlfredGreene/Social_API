<?php 

ob_start(); 
	 session_start();
	 
require_once 'connect/database.php';
require_once 'classes/users.php';
require 'linkedin_config.php';
require 'instagram.config.php';
require 'pinterest_config.php';
$users = new Users($db);
$errors  = array();
ob_flush();