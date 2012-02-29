<?php

	class User extends DataMapper {

		var $validation = array(
			'username' => array(
				'label' => 'lang:global_username',
				'rules' => array('required','trim','unique')
			),
			'email' => array(
				'label' => 'lang:global_email',
				'rules' => array('required','valid_email','unique')
			),
			'password' => array(
				'label' => 'lang:global_password',
				'rules' => array('required','min_length' => 6,'encrypt')
			),
			'password_confirm' => array(
				'label' => 'lang:global_password_confirm',
				'rules' => array('encrypt','matches' => 'password')
			)
		);

		function _encrypt($field)
		{
			if (!empty($this->{$field}))
			{
				$this->{$field} = sha1($this->{$field});
			}
		}
	}

