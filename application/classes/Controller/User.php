<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_User extends Controller_Base
	{
		public function action_index()
		{
			$this->template->content = View::factory('blocks/user_profile');
		}

		public function action_profile()
		{
			$user_id                 = $this->request->param('id');
			$user                    = ORM::factory('Workers', $user_id);
			$this->template->content = View::factory('blocks/user_profile')
					->bind('user', $user);
		}

		public function action_my_profile_edit()
		{
			if ($_POST) {
				if (Arr::get($_POST, 'change_pass') == 'Сменить пароль') {
					$validate = Validation::factory($_POST);
					//					$validate->rule('new_password', 'min_light', array('min' => 6));
					if ($datas['password'] = Arr::get($_POST, 'new_password') == Arr::get($_POST, 'new_password_confirm')) {
						$user = ORM::factory('User', Auth::instance()
								->get_user());


						$user->update_user($datas, array('password'));
						$this->redirect('/user/profile/' . WORKER_ID);
					}
				}
				elseif (Arr::get($_POST, 'update')) {
					$worker  = ORM::factory('Workers', WORKER_ID);
					$columns = $worker->table_columns();
					foreach ($columns as $key => $c) {
						if ($value = Arr::get($_POST, $key)) {
							$worker->set($key, $value);
						}
					}
					$worker->update();
					$this->redirect('/user/profile/' . WORKER_ID);
				}
			}


			$user                    = ORM::factory('Workers')
					->where('user_id', '=', Auth::instance()
							->get_user()->id)
					->find();
			$this->template->content = View::factory('/forms/user_profile_edit')
					->bind('user', $user);
		}
	}