<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Otchet extends Controller_AdminBase
	{
		public function action_index()
		{
			$this->template->content = View::factory("Admin/index");
		}

		public function action_project()
		{
			$project_id              = $this->request->param('id');
			$this->template->content = View::factory('Admin/Project')
					->bind('id', $project_id);
		}
	}