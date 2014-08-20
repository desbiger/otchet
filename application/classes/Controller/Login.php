<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Login extends Controller_Template
	{
		public function before()
		{
			$this->template          = View::factory('clear');
			$this->template->content = '';
			$this->template->title   = 'Вход';
		}

		public function action_index()
		{
						if (Auth::instance()
								->logged_in()
						) {
							$this->redirect('/');
						}
						else {
							$this->template->content = View::factory('forms/login');
						}
//			$model = ORM::factory('User');
//			$model->values(array(
//					'username' => 'Genya',
//					'email' => 'shelgen@hit-media',
//					'password' => '123qwe',
//					'password_confirm' => '123qwe',
//			));
//			$model->save();
//			$model->add('roles', 1);
		}

		public function action_login()
		{
			if ($_REQUEST) {
				$login = Arr::get($_REQUEST, 'login');
				$pass  = Arr::get($_REQUEST, 'pass');
				if (Auth::instance()
						->login($login, $pass)
				) {
					$this->redirect('/');
				}
				else {
					$this->redirect("/");
				}
			}
		}

		public function action_logout()
		{
			Auth::instance()
					->logout(true);
			$this->redirect('/');
		}
	}