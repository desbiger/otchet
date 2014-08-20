<?php defined('SYSPATH') or die('No direct script access.');

	class Model_Workers extends ORM
	{
		protected $_table_name = 'workers';
		protected $_belongs_to = array(
				'status' => array(
						'model' => 'WorkerWhois',
						'foreign_key' => 'whois'
				),
			'user'=> array(
				'model' => 'User'
			)
		);
	}