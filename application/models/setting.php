<?php

	class Setting extends DataMapper {

		var $validation = array(
			'appname' => array(
				'label' => 'lang:global_username',
				'rules' => array('required','trim')
			),
			'language' => array(
				'label' => 'lang:global_email',
				'rules' => array('required')
			),
			'per_page' => array(
				'label' => 'lang:global_password',
				'rules' => array('numeric','required')
			),
			'mail_protocol' => array(
				'label' => 'lang:global_password_confirm',
				'rules' => array('required')
			),
			'mailpath' => array(
				'label' => 'Sendmail path',
				'rules' => array('trim')
			),
			'smtp_host' => array(
				'label' => 'SMTP Host',
				'rules' => array('trim')
			),
			'smtp_user' => array(
				'label' => 'SMTP username',
				'rules' => array('valid_email')
			)
		);

	}
