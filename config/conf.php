<?php
class Conf{
	
	static $debug = 1; 

	static $databases = array(

		'default' => array(
			'host'		=> 'localhost',
			'database'	=> 'tasks',
			'login'		=> 'root',
			'password'	=> ''
		)
	);
}

    define('URL_ROOT', "http://localhost/tasks");

    Router::prefix('cockpit','admin');


