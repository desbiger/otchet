<?php defined('SYSPATH') or die('No direct script access.');

    class Model_TaskComments extends ORM
    {
	    protected $_table_name = 'task_comments';
	    protected $_belongs_to = array(
		    'worker' => array(
			    'model' => 'Workers',
			    'foreign_key' => 'ovner'
		    )
	    );
	    protected $_has_many = array(
		    'new' => array(
			    'model' => 'NewComment',
			    'foreign_key' => 'comment_id'
		    )
	    );
    }