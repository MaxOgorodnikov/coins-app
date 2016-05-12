<?php
	$config = array(
		'db' => array(
			'db1' => array(
				'dbname' => 'db_test',
				'username' => 'root',
				'password' => '',
				'host' => 'localhost'
			)
		),
		'urls' => array(
			'baseUrl' => 'http://test/'
		),
		'paths' => array(
			'models' 		=> $_SERVER['DOCUMENT_ROOT'] . 'application/models/',
			'views' 		=> $_SERVER['DOCUMENT_ROOT'] . 'application/views/',
			'controllers' 	=> $_SERVER['DOCUMENT_ROOT'] . 'application/controllers/',
			'templates' 	=> $_SERVER['DOCUMENT_ROOT'] . 'application/templates/',
			'images' 		=> '/web/images/',
			'css' 			=> '/web/css/',
			'js' 			=> '/web/js/'
		)
	);
		
	/*
		Error reporting.
	*/
	ini_set('error_reporting', 'true');
?>