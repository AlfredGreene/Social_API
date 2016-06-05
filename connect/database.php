<?php
/* 
$config = array(
	'host'		=> 'localhost',
	'username' 	=> 'root',
	'password' 	=> '',
	'dbname' 	=> 'idesign'
);

$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['username'], $config['password'],
array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8")); */
?>

<?php



$config = array(
	'host'		=> '146.255.96.247',
	'username' 	=> 'user_dev1',
	'password' 	=> 'q@4yoXWIDI',
	'dbname' 	=> 'db_dev1'
);

$db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'], $config['username'], $config['password']); 
?>
