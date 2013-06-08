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

    Router::prefix('cockpit','admin');


