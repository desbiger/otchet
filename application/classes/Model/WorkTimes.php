<?php defined('SYSPATH') or die('No direct script access.');

	class Model_WorkTimes extends ORM
	{
		protected $_table_name = 'work_times';
		protected $_belongs_to = array(
			'worker' => array(
				'model' => 'Workers'
			)
		);
	}