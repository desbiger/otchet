<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Settings extends Controller_Base
	{
		public function action_index()
		{
			$imap                    = Settings::factory('imap')
					->GetVar('pass');
			$this->template->content = $imap;
		}
	}