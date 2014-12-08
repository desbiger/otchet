<?php defined('SYSPATH') or die('No direct script access.');

	class Model_Clients extends ORM
	{
		protected $_table_name = 'clients';

		protected $_belongs_to = array(
				'status' => array(
						'model' => 'ClientStatuses'
				)
		);
		protected $_has_many = array(
				'projects' => array(
						'model' => 'Objects',
						'foreign_key' => 'client_id'
				)
		);

	}