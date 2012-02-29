<?php

	class Language extends Public_Controller {

		function configure($lang)
		{
			$this->session->set_userdata('lang',$lang);
			redirect($this->agent->referrer());
		}

	}

