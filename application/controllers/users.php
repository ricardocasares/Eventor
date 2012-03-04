<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
	
	class Users extends Backend_Controller {

		function index($page = 0) {
			$u = new User();
			$this->data['users'] = $u->get_paged_iterated($page,$this->settings->per_page);
		}
		
		function account()
		{
			$this->data['u'] = $u = new User($this->user->id);
			
			if($this->input->post()) {
				$u->from_array($this->input->post(),array(
					'username',
					'email'
				));
				if($u->save()) {
					$this->session->set_flashdata('msg','<div class="alert alert-success">Account settings edited succesfully.</div>');
					redirect('events');
				}
				else {
					$this->data['errors'] = $u->error->all;
				}
			}
		}
		
		function password()
		{
			$this->data['u'] = $u = new User($this->user->id);
			
			if($this->input->post()) {
				$u->from_array($this->input->post(),array(
					'password',
					'password_confirm'
				));
				if($u->save()) {
					$this->session->set_flashdata('msg','<div class="alert alert-success">Account settings edited succesfully.</div>');
					redirect('events');
				}
				else {
					$this->data['errors'] = $u->error->all;
				}
			}
		}

		function add()
		{
			if($_POST) {
				$u = new User();
				$u->from_array($this->input->post(),array(
					'username',
					'password',
					'password_confirm',
					'email',
					'admin'
				));
				if($u->save()) {
					$this->session->set_flashdata('msg','<div class="alert alert-success">User was added succesfully.</div>');
					if(isset($_POST['continue'])) {
						redirect('users/add');
					}
					else {
						redirect('users/index');
					}
				}
				else {
					$this->data['errors'] = $u->error->all;
				}
			}
		}

		function edit($id = FALSE)
		{
			$this->data['u'] = $u = new User($id);
			if($_POST) {
				$u->from_array($this->input->post(),array(
					'username',
					'email',
					'admin'
				));
				if($u->save()) {
					$this->session->set_flashdata('msg','<div class="alert alert-success">User was edited succesfully</div>');
					redirect('users/index');
				}
				else {
					$this->data['errors'] = $u->error->all;
				}
			}
		}

		function delete($id = FALSE) {
			$u = new User($id);
			$u->delete();
			$this->session->set_flashdata('msg','<div class="alert alert-success">User was succesfully deleted.</div>');
			redirect($this->agent->referrer());
		}
		
	}
