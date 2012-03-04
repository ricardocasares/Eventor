<?php

	class Event extends DataMapper {

		var $has_one = array('category');

		var $default_order_by = array('created' => 'asc');

		var $validation = array(
			'title' => array(
				'label' => 'lang:event_title',
				'rules' => array('required','trim')
			),
			'category_id' => array(
				'label' => 'lang:event_category',
				'rules' => array('required','trim')
			),
			'description' => array(
				'label' => 'lang:event_description',
				'rules' => array('required','trim')
			),
			'cost' => array(
				'label' => 'lang:event_cost',
				'rules' => array('trim')
			),
			'address' => array(
				'label' => 'lang:event_address',
				'rules' => array('trim')
			),
			'coords' => array(
				'label' => 'lang:event_coords',
				'rules' => array('trim')
			),
			'start' => array(
				'label' => 'lang:event_start',
				'rules' => array('required','trim','valid_date')
			),
			'end' => array(
				'label' => 'lang:event_end',
				'rules' => array('trim','valid_date')
			)
		);
	}
