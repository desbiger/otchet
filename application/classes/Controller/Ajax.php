<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Ajax extends Controller
	{
		public function before()
		{
			define('WORKER_ID', ORM::factory('Workers')
					->where('user_id', '=', Auth::instance()
							->get_user()->id)
					->find()->id);
		}

		public function action_index()
		{
			$this->response->body('Hallow');
		}

		public function action_shareProject()
		{
			$worker_id  = Arr::get($_GET, 'worker_id');
			$project_id = Arr::get($_GET, 'project_id');


			if ($worker_id && $project_id && WORKER_ID && Acl::factory()
							->GetProjectOwner($project_id) == WORKER_ID
			) {

				Acl::factory()
						->ShareProjectToUser($project_id, $this->request->query('worker_id'));
				$project_users = Acl::factory()
						->GetProjectUsers($project_id, false);
				$this->response->body(View::factory('Ajax/shareUsers')
						->bind('project_users', $project_users));
			}
			elseif (Acl::factory()
							->GetProjectOwner($project_id) != WORKER_ID
			) {
				$project_owner = Acl::factory()
											->GetProjectOwner($project_id);
				$owner = ORM::factory('Workers',$project_owner);
				$this->response->body('<h2>Вы не можете управлять доступом к проекту</h2>
				<p>обратитесь к администратору проекта - '.$owner->name.' '.$owner->firstname.' </p>');
			}
			elseif (!$worker_id || !$project_id) {
				$this->response->body('<h2>Не определен проект или пользователь</h2>');
			}
		}
		public function action_usersNoyInProject(){
			$project_id = Arr::get($_GET,'project_id');

		}
	}