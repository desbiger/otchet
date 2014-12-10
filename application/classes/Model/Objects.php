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
				),
				'client' => array(
						'model' => 'Clients',
				)
		);

		function find_all($ignore_access = false)
		{
			if (!$ignore_access) {
				$this->where('id', 'IN', Acl::factory()
						->GetMyProjects());

			}

			if ($this->_loaded) {
				throw new Kohana_Exception('Method find_all() cannot be called on loaded objects');
			}

			if (!empty($this->_load_with)) {
				foreach ($this->_load_with as $alias) {
					// Bind auto relationships
					$this->with($alias);
				}
			}
			$this->_build(Database::SELECT);

			return $this->_load_result(true);
		}
	}