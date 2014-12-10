<?php defined('SYSPATH') or die('No direct script access.');

	class Controller_Clients extends Controller_Base
	{
		public function before()
		{
			parent::before();

		}

		public function action_index()
		{
			if ($_POST) {
				ORM::factory('Clients')->AddClient($_POST);
			}

			$this->template->title   = 'Список клиентов';
			$this->template->content = View::factory('tables/clients')
					->bind('name', $this->template->title);
		}

		public function action_client()
		{
			$id                      = $this->request->param('id');
			$id2                     = $this->request->param('id2');
			$this->template->content = View::factory('blocks/clients_menu')
					->bind('id', $id);
			$left_menu = View::factory('menus/projects_left')
								->bind('curent_id', $id2)
								->bind('client_id', $id);


			if($id2){
				$content = View::factory('tables/project')->bind('id',$id2);
			}else{
				$content = '';
			}
			$this->template->content .= View::factory('blocks/content_2rows')->bind('row1',$left_menu)->bind('row2',$content);

		}
	}