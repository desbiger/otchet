<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Index extends Controller_Base
	{
		public function action_index()
		{

			$this->template->content .= View::factory('blocks/user_tasks');

			
			if (Auth::instance()
					->logged_in('Admin')
			) {
				$this->template->content .= View::factory('Admin/tasks_in_work');
			}


		}

		public function action_otchet()
		{
			$this->template->content = $this->request->param('id');
		}

		public function action_newtask()
		{
			$errors     = array();
			$project_id = $this->request->param('id');
			if ($_POST) {

				$val = Validation::factory($_POST);

				$val->label('name', 'Задача');
				$val->rule('name', 'not_empty');

				$val->label('project_id', 'Проект');
				$val->rule('project_id', 'not_empty');

				$val->label('boss_of_task', 'Поставил задачу');
				$val->rule('boss_of_task', 'not_empty');


				if (!$val->check()) {
					$errors = $val->errors('validation');
				}
				else {
					$task = ORM::factory('Tasks');
					$col  = $task->list_columns();
					foreach ($_POST as $key => $vol) {
						if (key_exists($key, $col)) {
							if ($key == 'name') {
								$task->set($key, preg_replace("|<p>(.*)</p>|isU", "$1", Arr::get($_POST, $key)));
							}
							else {
								$task->set($key, Arr::get($_POST, $key));
							}
						}
						$task->set('date_begin', date('Y-m-d H:i'));
					}
					if ($task_id = $task->save()) {

						//                        прикрепление файла к задаче
						if (Arr::get($_FILES, 'file_file')) {
							My::UploadFile($_FILES['file_file'], $task_id, Arr::get($_POST, 'file_title'), Arr::get($_POST, 'file_text'));
						}
						//                        прикрепление файла к задаче


						if ($taskWorkers = Arr::get($_POST, 'taskworker')) {
							foreach ($taskWorkers as $workes) {
								ORM::factory('TaskWorkers')
										->set('tasks_id', $task)
										->set('worker_id', $workes)
										->save();
							}
						}
						$this->redirect('/projects/project/' . $_POST['project_id']);
					};
				}
			}
			$this->template->content = View::factory('forms/new_task')
					->bind('project_id', $project_id)
					->bind('errors', $errors);
		}

	}