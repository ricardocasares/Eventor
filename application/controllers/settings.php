<?php

	class Settings extends Backend_Controller {
		
		function config()
		{
			if($this->input->post())
			{
				$s = new Setting(1);
				$s->from_array($this->input->post(),array(
					'appname',
					'language',
					'per_page',
					'mail_protocol',
					'mailpath',
					'smtp_host',
					'smtp_user',
					'smtp_pass',
					'port',
				));
				if($s->save())
				{
					$this->session->set_flashdata('msg','<div class="alert alert-success">Settings applied succesfully.</div>');
					redirect('settings');
				}
				else
				{
					$this->data['errors'] = $s->error->all;
				}
			}
			
			$this->data['s'] = new Setting(1);
		}
	}
