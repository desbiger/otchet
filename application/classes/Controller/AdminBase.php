<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_AdminBase extends Controller_Template
	{
		public function before()
		{
			if (Auth::instance()
					->logged_in('Admin')
			) {
				define('WORKER_ID', ORM::factory('Workers')
						->where('user_id', '=', Auth::instance()
								->get_user()->id)
						->find()->id);
				define('DATE',My::convertDate(date('Y-m-d')));

				$this->template             = View::factory('base/base_template');
				$this->template->content    = '';
				$this->template->title      = 'Отчеты';
				$this->template->user_block = View::factory('blocks/user_block');
				$this->template->top_menu   = View::factory('menus/top_menu');
			}
			else {
				$this->redirect('/');
			}
		}

	}