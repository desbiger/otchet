<?

	class Kohana_Task
	{
		/**
		 * @param $task_id
		 * @param $owner_id
		 * @return ORM
		 * Сохраняем отчет постановщику задачи о готовности
		 */
		static function SetReady($task_id, $owner_id)
		{
			return ORM::factory('ReadyTasks')
					->set('owner', $owner_id)
					->set('task_id', $task_id)
					->save();
		}

		/**
		 * @return Database_Result
		 * находит все мои задач в статусе - готовые к сдачи
		 */
		static function MyTasksReady()
		{
			return ORM::factory('Tasks')
					->join('ready_tasks')
					->on('ready_tasks.task_id', '=', 'tasks.id')
					->where('ready_tasks.owner', '=', WORKER_ID)
					->find_all();
		}

		/**
		 * @param $task_id
		 * @return ORM
		 * Делаем прочитанным что задача сделана
		 */
		static function SetSeen($task_id)
		{
			return ORM::factory('ReadyTasks')
					->where('task_id', '=', $task_id)
					->find()
					->delete();
		}

		/**
		 * @return Database_Result
		 * Находит все задачи поставленные мною
		 */
		static function FindMyTasks($status = null)
		{
			if ($status) {
				if (is_array($status)) {
					return ORM::factory('Tasks')
							->where('boss_of_task', '=', WORKER_ID)
							->where('status', "in", $status)
							->find_all();
				}
				else {
					return ORM::factory('Tasks')
							->where('boss_of_task', '=', WORKER_ID)
							->where('status', '=', $status)
							->find_all();
				}


			}
			else {
				return ORM::factory('Tasks')
						->where('boss_of_task', '=', WORKER_ID)
						->find_all();

			}
		}


		/**
		 * @return Database_Result
		 * Все задачи поставленные мне
		 */
		static function FindTaskForMe()
		{
			return ORM::factory('Tasks')
					->join('task_workers')
					->on('tasks.id', '=', 'task_workers.tasks_id')
					->where('task_workers', '=', WORKER_ID)
					->group_by('tasks.id')
					->find_all();
		}
	}
 