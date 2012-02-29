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
					$data = array(
						'id' => $u->id,
						'admin' => $u->admin,
						'username' => $u->username,
						'email' => $u->email,
						'lang' => $u->language
					);
					$this->session->set_userdata($data);
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
			$this->session->sess_destroy();
			redirect('');
		}

	}

