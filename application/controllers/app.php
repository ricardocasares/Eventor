<?php

	class App extends Backend_Controller {
		
		function help()
		{
			
		}
		
		function config()
		{
			$this->data['user'] = new User($this->session->userdata('id'));
			$p = new Plan();
			$this->data['plans'] = $p->get_iterated();
		}
	}
