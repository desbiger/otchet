<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Settings extends Controller_Base
	{
		public function action_index()
		{
			$left_menu               = View::factory('menus/modules_left');
			$content                 = '';
			$imap                    = Settings::factory('imap')
					->GetSettings();
			$this->template->content = View::factory('blocks/content_2rows')
					->bind('row1', $left_menu)
					->bind('row2', $content);
		}

		public function action_module()
		{
			$current_module = $this->request->param('id');


			if ($_POST && $current_module && Arr::get($_POST, 'action') == 'SetSettings') {
				$settings = Settings::factory($current_module);
				foreach ($_POST as $key => $vol) {
					$settings->SetVar($key, $vol);
				}
				$this->redirect('/settings/module/' . $current_module);
			}
			elseif ($_POST && $current_module && Arr::get($_POST, 'action') == 'rule') {
				Settings::factory($current_module)
						->SetVar('rule', serialize(My::ClearEmpty($_POST['rule'])));
				$this->redirect($this->request->uri());
			}


			$left_menu = View::factory('menus/modules_left')
					->bind('current_id', $current_module);

			$module_settings = Settings::factory($current_module)
					->GetSettings();
			$content         = View::factory('modules/' . $current_module)
					->bind('settings', $module_settings);

			$this->template->content = View::factory('blocks/content_2rows')
					->bind('row1', $left_menu)
					->bind('row2', $content);
		}

	}