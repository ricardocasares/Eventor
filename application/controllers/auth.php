<?php

	class Auth extends Backend_Controller {

		protected $layout = "layouts/public";

		function __construct()
		{
			parent::__construct();
		}

		function login()
		{
			if($this->connected) {
				redirect('upcoming');
			}
		}

		function do_login()
		{
			$u = new User();
			$u->where('username',$this->input->post('username'))->or_where('email',$this->input->post('username'))->limit(1)->get();
			if($u->exists())
			{
				if(sha1($_POST['password']) == $u->password)
				{
					$this->session->set_userdata(array('id' => $u->id));
					redirect('upcoming');
				}
				else
				{
					$this->session->set_flashdata('msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a>Username or password incorrect.</div>');
					redirect('login');
				}
			}
			else
			{
				$this->session->set_flashdata('msg','<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a>Username or password incorrect.</div>');
				redirect('login');
			}
		}

		function logout()
		{
			$this->connected = FALSE;
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('admin');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('email');
			$this->session->unset_userdata('lang');
			$this->session->sess_destroy();
			redirect('');
		}

	}
