<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Users extends Controller_Base
	{
		public function action_index()
		{
			$errors = '';
			if ($_POST) {
				$valid = Validation::factory($_POST);

				$valid->label('name', 'Имя пользователя');
				$valid->rule('name', 'not_empty');

				$valid->label('email', 'Email');
				$valid->rule('email', 'not_empty');
				$valid->rule('email', 'email');

				$valid->label('password', 'Пароль');
				$valid->rule('password', 'not_empty');

				if (!$valid->check()) {
					$errors = $valid->errors('Validation');
				}
				else {
					$user    = ORM::factory('User');
					$user_id = $user->values(array(
							'username' => My::RuToLatin(Arr::get($_REQUEST, 'name')),
							'email' => Arr::get($_REQUEST, 'email'),
							'password' => Arr::get($_REQUEST, 'password'),
							'password_confirm' => Arr::get($_REQUEST, 'password'),
					));
					$user->save();
					$user->add('roles', '3');


					$workers = ORM::factory('Workers');
					$workers->set('name', Arr::get($_POST, 'name'));
					$workers->set('firstname', Arr::get($_POST, 'firstname'));
					$workers->set('secondename', Arr::get($_POST, 'secondename'));
					$workers->set('whois', Arr::get($_POST, 'status'));
					$workers->set('user_id', $user_id);
					$workers->save();
					$this->redirect('/users/');
				}
			}
			$this->template->content = View::factory('tables/users') . View::factory('forms/new_user')
							->bind('errors', $errors);
		}
	}