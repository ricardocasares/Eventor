<?php
	class Categories extends Backend_Controller {

		function index($page = 0) {
			$c = new Category();
			$this->data['categories'] = $c->include_related_count('events')->get_paged_iterated($page,$this->settings->per_page);
		}

		function add()
		{
			if($_POST) {
				$c = new Category();
				$c->from_array($this->input->post(),array('name','color'));
				if($c->save()) {
					$this->session->set_flashdata('msg','<div class="alert alert-success">Category was added succesfully.</div>');
					if(isset($_POST['continue'])) {
						redirect('categories/add');
					}
					else {
						redirect('categories/index');
					}
				}
				else {
					$this->data['errors'] = $c->error->all;
				}
			}
		}

		function edit($id = FALSE)
		{
			if($_POST) {
				$c = new Category($id);
				$c->from_array($this->input->post(),array('name','color'));
				if($c->save()) {
					$this->session->set_flashdata('msg','<div class="alert alert-success">Category was edited succesfully</div>');
					redirect('categories/index');
				}
				else {
					$this->data['errors'] = $c->error->all;
				}
			}
			$this->data['c'] = new Category($id);
		}

		function delete($id = FALSE) {
			$c = new Category($id);
			$c->delete();
			$this->session->set_flashdata('msg','<div class="alert alert-success">Category was succesfully deleted.</div>');
			redirect($this->agent->referrer());
		}

	}
