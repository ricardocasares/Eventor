<?php

class Category extends DataMapper {

	var $has_many = array('event');

	var $validation = array(
		'name' => array(
			'rules' => array('required','unique')
		),
		'color' => array(
			'rules' => array('required','unique')
		)
	);

	var $default_order_by = array('name' => 'asc');

    function __construct($id = NULL)
	{
		parent::__construct($id);
    }
}

/* End of file category.php */
/* Location: ./application/models/category.php */

