<?php defined('SYSPATH') or die('No direct script access.');

	class Model_Objects extends ORM
	{
		protected $_table_name = 'objects';
		protected $_has_many = array(
				'tasks' => array(
						'model' => 'Tasks',
						'foreign_key' => 'project_id'
				),
				'wiki' => array(
						'model' => 'ProjectWiki',
						'foreign_key' => 'project_id'
				)
		);
		protected $_belongs_to = array(
				'stat' => array(
						'model' => 'ObjectStatus',
						'foreign_key' => 'status'
				)
		);
	}