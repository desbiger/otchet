<?php defined('SYSPATH') or die('No direct script access.');

	class Model_ProjectWiki extends ORM
	{
		protected $_table_name = 'project_wiki';
		protected $_belongs_to = array(
				'project' => array(
						'model' => 'Objects',
						'foreign_key' => 'project_id'
				),
				'worker' => array(
						'model' => 'Workers',
						'foreign_key' => 'author'
				),
		);
	}