<?php defined('SYSPATH') or die('No direct script access.');

    class Model_NewComment extends ORM
    {
	    protected $_table_name = 'new_comments';
	    protected $_belongs_to = array(
		    'task' => array(
			    'model' => 'Tasks'
		    ),
		    'worker' => array(
			    'model' => 'Workers',
			    'forign_key' => 'worker_id'
		    )

	    );
    }