<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Projects extends Controller_Base
	{
		public function action_index()
		{
			$errors = array();
			if ($_POST) {
				$valid = Validation::factory($_POST);
				$valid->label('name', 'Название проекта');
				$valid->rule('name', 'not_empty');
				$valid->label('description', 'Описание проекта');
				$valid->rule('description', 'not_empty');


				if ($valid->check()) {
					$project = ORM::factory('Objects');
					$project->set('name', Arr::get($_POST, 'name'));
					$project->set('description', Arr::get($_POST, 'description'));
					$project->set('status', Arr::get($_POST, 'status'));
					$project->save();
					$this->redirect('/projects');
				}
				else {
					$errors = $valid->errors('validation');
				}

			}
			$this->template->content = View::factory('tables/objects') . $this->template->content = View::factory('forms/new_project')
							->bind('errors', $errors);
		}

		public function action_project()
		{
			$action = $this->request->param('id2');
			if (preg_match("|del_task_([0-9]+)|", $action, $matches)) {
				$task_id = $matches[1];
				foreach (ORM::factory('WorkTimes')
						         ->where('task_id', '=', $task_id)
						         ->find_all() as $record) {
					ORM::factory('WorkTimes', $record->id)
							->delete();
				}
				ORM::factory('Tasks', $task_id)
						->delete();
				$this->redirect('/projects/project/' . $this->request->param('id'));
			}
			if ($id = $this->request->param('id')) {
				$cur_project             = View::factory('tables/project')
						->bind('id', $id);
				$this->template->content = $cur_project;
			}
		}

		public function action_taskdetail()
		{

			$task_id    = $this->request->param('id2');
			$project_id = $this->request->param('id');
			$date       = date('Y-m-d');
			$time       = date('H:i');
			$task       = ORM::factory('Tasks', $task_id);

			Comments::Factory($task_id)
					->CommentRead();

			if ($_POST) {


				if (Arr::get($_POST, 'subtasks_edit')) { //если сабмит подзадач
					if ($new_tasks = Arr::get($_POST, 'subtask_name')) {
						foreach ($new_tasks as $key => $newtask) {
							Task::AddSubTask($task_id, $newtask, 1);
						}
					}
					$subtasks = $task->small_task->find_all();
					$log      = '';
					$checks   = Arr::get($_POST, 'check_subtask');
					foreach ($subtasks as $subtask) {
						$status = Arr::get($checks, $subtask->id)? 1:0;
						Task::UpdateSubtaskStatus($subtask->id, $status);
					}
				}


				if (Arr::get($_POST, 'comment') == 'Добавить') {
					$text = Arr::get($_POST, 'text');
					if (strlen($text)) {
						Comments::Factory($task_id)
								->add($text);
						$this->redirect($this->request->uri());
					}
				}


				if (Arr::get($_POST, 'do') == "В работу") {
					ORM::factory('Tasks', $task_id)
							->set('begin_work', $date)
							->set('status', 2)
							->save();
				}
				elseif (Arr::get($_POST, 'do') == "Завершить задачу") {

					$task_begin_work = preg_replace("|(.*) (.*)|isU", "$1", $task->begin_work);

					Task::SetReady($task_id, $task->boss_of_task);

					if ($task_begin_work == $date) {
						$begin_time = preg_replace("|(.*) (.*)|isU", "$2", $task->begin_work) . ":00";
						$now        = date("H:i:s");
						ORM::factory('WorkTimes')
								->set('time_begin', $begin_time)
								->set('time_end', $now)
								->set('date', $date)
								->set('project_id', $project_id)
								->set('task_id', $task_id)
								->set('worker_id', WORKER_ID)
								->save();
					}

					$task->set('status', 1)
							->set('finish', 100)
							->save();
				}
				elseif (Arr::get($_POST, 'dob') == 'Добавить') {
					$time_diff = My::TimeBetwin(Arr::get($_POST, 'time_begin') . ":00", Arr::get($_POST, 'time_end') . ":00");
					ORM::factory('WorkTimes')
							->set('time_begin', Arr::get($_POST, 'time_begin'))
							->set('time_end', Arr::get($_POST, 'time_end'))
							->set('date', Arr::get($_POST, 'date'))
							->set('text', Arr::get($_POST, 'text'))
							->set('worker_id', WORKER_ID)
							->set('task_id', $task_id)
							->set('timediff', $time_diff[0] . ":" . $time_diff[1])
							->set('project_id', $project_id)
							->save();
				}
				elseif (Arr::get($_POST, 'do') == 'Обновить') {
					ORM::factory('Tasks', $task_id)
							->set('finish', Arr::get($_POST, 'finish'))
							->save();
				}
				elseif (Arr::get($_POST, 'do') == 'Принять') {
					Task::SetSeen($task_id);
				}
				$this->redirect('/projects/taskdetail/' . $project_id . "/" . $task_id);
			}

			$this->template->title   = 'Задача - ' . $task->name;
			$this->template->content = View::factory('blocks/task_detail')
					->bind('project_id', $project_id)
					->bind('task_id', $task_id);
		}


		public function action_taskedit()
		{


			if ($id = $this->request->param('id')) {

				$project_id = $this->request->param('id');
				$task_id    = $this->request->param('id2');
				$action     = $this->request->param('variable');
				$filedel    = Arr::get($_REQUEST, 'file_del');
				if ($filedel) {
					$file = ORM::factory('File', $filedel);
					unlink(DOCROOT . "upload/" . $file->filename);
					$file->delete();
					$this->redirect("/projects/taskedit/{$project_id}/{$task_id}");
				}

				if (preg_match("/del_interval_([0-9]+)/", $action, $match)) {
					$interval_id = $match[1];
					$model       = ORM::factory('WorkTimes', $interval_id);
					if ($model->loaded()) {
						$model->delete();
					}

					$this->redirect("/projects/taskedit/{$project_id}/{$task_id}");
				}
				if (Arr::get($_POST, 'dob') == 'Загрузить') {
					//						прикрепление файла к задаче
					if (Arr::get($_FILES, 'file_file')) {
						My::UploadFile($_FILES['file_file'], $task_id, Arr::get($_POST, 'file_title'), Arr::get($_POST, 'file_text'));
					}
					//						прикрепление файла к задаче
				}
				if (Arr::get($_POST, 'dob') == 'Добавить') {
					$time_diff = My::TimeBetwin(Arr::get($_POST, 'time_begin') . ":00", Arr::get($_POST, 'time_end') . ":00");
					ORM::factory('WorkTimes')
							->set('time_begin', Arr::get($_POST, 'time_begin'))
							->set('time_end', Arr::get($_POST, 'time_end'))
							->set('date', Arr::get($_POST, 'date'))
							->set('text', Arr::get($_POST, 'text'))
							->set('worker_id', WORKER_ID)
							->set('task_id', $task_id)
							->set('timediff', $time_diff[0] . ":" . $time_diff[1])
							->set('project_id', $project_id)
							->save();
				}

				if (Arr::get($_POST, 'sub')) {

					$task = ORM::factory('Tasks', $task_id);


					if ($taskWorkers = Arr::get($_POST, 'taskworker')) {
						$cur_tasks = ORM::factory('TaskWorkers')
								->where('tasks_id', '=', $task_id)
								->find_all();
						foreach ($cur_tasks as $c_k) {
							$c_k->delete();
						}
						foreach ($taskWorkers as $workes) {
							ORM::factory('TaskWorkers')
									->set('tasks_id', $task_id)
									->set('worker_id', $workes)
									->save();
						}
					}
					elseif (!isset($_POST['taskworker'])) {
						$cur_tasks = ORM::factory('TaskWorkers')
								->where('tasks_id', '=', $task_id)
								->find_all();
						foreach ($cur_tasks as $c_k) {
							$c_k->delete();
						}
					}

					$columns = $task->list_columns();
					foreach ($_POST as $key => $val) {
						if (key_exists($key, $columns)) {
							if ($key == 'name') {
								$task->set($key, preg_replace("|<p>(.*)</p>|isU", "$1", Arr::get($_POST, $key)));
							}
							else {
								$task->set($key, Arr::get($_POST, $key));
							}
						}
					}
					$task->set('project_id', $project_id);
					$task_update_result = $task->update();

					if (Arr::get($_POST, 'date') && Arr::get($_POST, 'time_begin') && Arr::get($_POST, 'time_end')) {

						$time_diff = My::TimeBetwin($_POST['time_begin'] . ":00", $_POST['time_end'] . ":00");

						$time = ORM::factory('WorkTimes');
						$time->set('time_begin', Arr::get($_POST, 'time_begin'));
						$time->set('time_end', Arr::get($_POST, 'time_end'));
						$time->set('date', Arr::get($_POST, 'date'));
						$time->set('timediff', $time_diff[0] . ":" . $time_diff[1]);
						$time->set('project_id', $project_id);
						$time->set('worker_id', WORKER_ID);
						$time->set('task_id', $task_id);
						$time->set('text', Arr::get($_POST, 'text'));
						if ($time->save()) {
							$this->redirect('/projects/taskdetail/' . $project_id . "/" . $task_id);
						}
					}
					if ($task_update_result) {
						$this->redirect('/projects/taskdetail/' . $project_id . "/" . $task_id);
					}
				}
			}

			$this->template->content = View::factory('tables/task')
					->bind('project_id', $project_id)
					->bind('task_id', $task_id);
		}

	}