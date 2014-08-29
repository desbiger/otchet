<?php defined('SYSPATH') or die('No direct script access.');

	class Model_Tasks extends ORM
	{
		protected $_table_name = 'tasks';

		protected $_belongs_to = array(
				'boss' => array(
						'model' => 'Workers',

						'foreign_key' => 'boss_of_task'
				),
				'worker' => array(
						'model' => 'Workers',

						'foreign_key' => 'worker_id'
				),
				'project' => array(
						'model' => 'Objects'
				),


		);
		protected $_has_one = array(
				'ready' => array(
						'model' => 'ReadyTasks',
						'foreign_key' => 'task_id',
				)
		);
		protected $_has_many = array(
				'date' => array(
						'model' => 'WorkTimes',
						'foreign_key' => 'task_id'
				),
				'workers' => array(
						'model' => 'Workers',
						'through' => 'task_workers'
				),
				'files' => array(
						'model' => 'File',
						'foreign_key' => 'task_id'
				),
				'comments' => array(
						'model' => 'TaskComments',
						'foreign_key' => 'task_id',
				),
				'small_task' => array(
						'model' => 'SmallTasks',
						'foreign_key' => 'task_id',
				)
		);
	}