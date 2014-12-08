<?php defined('SYSPATH') or die('No direct script access.');

    class Model_ProjectAccess extends ORM
    {
	    protected $_table_name = 'project_access';
	    protected $_belongs_to = array(
		    'worker' => array(
			    'model' => 'Workers'
		    )
	    );
    }