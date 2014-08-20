<?php defined('SYSPATH') or die('No direct script access.');
    class Controller_User extends Controller_Base
    {
        public function action_index(){
            $this->template->content = View::factory('blocks/user_profile');
        }

	    public function action_profile()
	    {
		    $user_id = $this->request->param('id');
		    $user = ORM::factory('Workers',$user_id);
		    $this->template->content = View::factory('blocks/user_profile')->bind('user',$user);
	    }
    }