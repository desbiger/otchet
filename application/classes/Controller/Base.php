<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Base extends Controller_Template
	{
		public function before()
		{
			if (Auth::instance()
					->logged_in()
			) {
				include_once(DOCROOT . "/include/ganty/gantti.php");
				define('WORKER_ID', ORM::factory('Workers')
						->where('user_id', '=', Auth::instance()
								->get_user()->id)
						->find()->id);

				$this->template             = View::factory('base/base_template');
				$this->template->content    = '';
				$this->template->title      = 'Отчеты';
				$this->template->user_block = View::factory('blocks/user_block');
				$this->template->top_menu   = View::factory('menus/top_menu');
			}
			else {
				$this->redirect('/login');
			}
		}

	}