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


		function find_all($ignor_access = false)
		{
			if(!$ignor_access){
					$this->where('id', 'IN', Acl::factory()->GetMyClients());
					$this->or_where('create_by', '=', WORKER_ID);
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

		function AddCLient($array)
		{
			$valid = Validation::factory($array);
			$valid->label('name', 'Компания / клиент');
			$valid->rule('name', 'not_empty');

			if ($valid->check()) {
				$id = $this->set('name', Arr::get($_POST, 'name'))
						->set('description', Arr::get($_POST, 'description'))
						->set('create_by', WORKER_ID)
						->save();
			}
		}
	}