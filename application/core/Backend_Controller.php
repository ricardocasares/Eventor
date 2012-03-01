<?php

	class Backend_Controller extends MY_Controller {

		protected $allow = array();
		protected $connected;

		public function __construct()
		{
			parent::__construct();
			$this->_is_connected();
			$this->_init_acl();
			$this->_authorize();
		}

		private function _is_connected()
		{
			if($this->session->userdata('id'))
			{
				$this->connected = TRUE;
			}
			else
			{
				$this->connected = FALSE;
			}
		}

		private function _init_acl()
		{
			if($this->connected && $this->session->userdata('admin'))
			{
				$this->allow = array(
					'auth' => array('login','do_login','logout'),
					'events' => array('upcoming','drag','calendar','index','show','add','edit','delete','search','do_search'),
					'categories' => array('index','add','edit','delete')
				);
			}
			elseif($this->connected && !$this->session->userdata('admin'))
			{
				$this->allow = array(
					'auth' => array('login','do_login','logout'),
					'events' => array('upcoming','drag','calendar','index','show','add','edit','search','do_search'),
					'categories' => array('index','add','edit')
				);
			}
			else
			{
				$this->allow = array(
					'auth' => array('login','do_login','logout'),
					'events' => array('calendar','show')
				);
			}
		}

		private function _authorize()
		{
			if(!array_key_exists($this->router->class,$this->allow))
			{
				if($this->connected)
				{
					$this->session->set_flashdata('msg','<div class="alert alert-error">You do not have enough privileges for that.</div>');
					$redirect = $this->agent->referrer();
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-error">You must login first.</div>');
					$redirect = "login";
				}

				redirect($redirect);
			}
			elseif(!in_array($this->router->method,$this->allow[$this->router->class]))
			{
				if($this->connected)
				{
					$this->session->set_flashdata('msg','<div class="alert alert-error">You do not have enough privileges for that.</div>');
					$redirect = $this->agent->referrer();
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-error">You must login first.</div>');
					$redirect = "login";
				}

				redirect($redirect);
			}
		}
	}

