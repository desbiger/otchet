<?php defined('SYSPATH') or die('No direct script access.');
    class Controller_Email extends Controller_Base
    {
        public function action_index(){

	        $this->template->content = View::factory('forms/mail_list');
        }
    }