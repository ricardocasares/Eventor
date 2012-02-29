<?php

	class Events extends Backend_Controller {

		function index($page = FALSE) {
			$e = new Event();
			$this->data['events'] = $e->get_paged_iterated($page,$this->per_page);
		}

		function upcoming($page = FALSE)
		{
			$e = new Event();
			$this->data['upcoming'] = $this->data['upcoming'] = $e->where('DATEDIFF(DATE(start),DATE(NOW())) <=',7)->get_paged_iterated($page,$this->per_page);
		}

		function calendar($y = FALSE , $m = FALSE)
		{
			if(!$this->connected) $this->layout = "layouts/public";
			$this->load->library('calendar');
			$e = new Event();

			$y = ($y) ? $y : date('Y');
			$m = ($m) ? $m : date('m');

			$events = $e->select('DAY(start) AS day,id,title,description,cost')->where('MONTH(start)',$m)->where('YEAR(start)',$y)->get_iterated();
			$this->load->helper('text');

			$ul = array();
			foreach($events as $e) {
				$ul[$e->day][] = '<span class="label" style="background:'.$e->category->color.';">'.anchor('events/show/'.$e->id,ellipsize($e->title, 14,1,'..'),'class="tip" data-toggle="modal" data-original-title="'.$e->title.'"').'</span>';
			}

			$data = array();
			foreach($ul as $day => $event) {
				$data[$day] = ul($event,array('class' => 'unstyled'));
			}

			$this->data['calendar'] = $this->calendar->generate($y,$m,$data);
			$c = new Category();
			$this->data['categories'] = $c->get_iterated();
		}

		function do_search($page = FALSE)
		{
			$this->view = FALSE;
			redirect('events/search/'.urlencode($this->input->post('query')));
		}

		function search($query = FALSE,$page = FALSE) {
			$query = urldecode($query);
			$e = new Event();

			if($query) {
				$this->data['events'] = $e->ilike('title',$query)->get_paged_iterated($page,$this->per_page);
			}
			else {
				$this->data['events'] = $e->get_paged_iterated($page,$this->per_page);
			}
			$this->data['query'] = $query;
		}

		function add()
		{
			if($this->input->post()) {
				$e = new Event();
				$p = $this->input->post();
				if($this->input->post('smonth') && $this->input->post('sday') && $this->input->post('sday'))
				{
					$p['start'] = $this->input->post('syear').'-'.$this->input->post('smonth').'-'.$this->input->post('sday');
				}
				if($this->input->post('emonth') && $this->input->post('eday') && $this->input->post('eyear'))
				{
					$p['end'] = $this->input->post('eyear').'-'.$this->input->post('emonth').'-'.$this->input->post('eday');
				}
				$e->from_array($p,array(
					'category_id',
					'title',
					'start',
					'end',
					'cost',
					'address',
					'coords',
					'description',
					'end',
				));
				if($e->save())
				{
					$this->session->set_flashdata('msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a>The event was save succesfully.</div>');
					if ($this->input->post('continue'))
					{
						redirect('events/add');
					}
					else {
						redirect('events/index');
					}
				}
				else {
					$this->data['errors'] = $e->error->all;
				}
			}

			$categories = new Category();
			$categories->get_iterated();
			$this->data['categories'][''] = "Choose a category";
			foreach($categories as $c) {
				$this->data['categories'][$c->id] = $c->name;
			}
		}

		function show($id = FALSE)
		{
			$this->layout = "layouts/ajax";
			$this->load->helper('text');
			$e = new Event($id);
			$this->data['event'] = $e->get_iterated();
		}

		function edit($id = FALSE)
		{
			if($this->input->post()) {
				$e = new Event($id);
				$p = $this->input->post();
				if($this->input->post('smonth') && $this->input->post('sday') && $this->input->post('sday'))
				{
					$p['start'] = $this->input->post('syear').'-'.$this->input->post('smonth').'-'.$this->input->post('sday');
				}
				if($this->input->post('emonth') && $this->input->post('eday') && $this->input->post('eyear'))
				{
					$p['end'] = $this->input->post('eyear').'-'.$this->input->post('emonth').'-'.$this->input->post('eday');
				}
				$e->from_array($p,array(
					'category_id',
					'title',
					'start',
					'end',
					'cost',
					'address',
					'coords',
					'description',
					'end',
				));
				if($e->save()) {
					$this->session->set_flashdata('msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a> The event was succesfully edited.</div>');
					redirect('events/index');
				}
				else {
					$this->data['errors'] = $e->error->all;
				}
			}

			$e = new Event($id);
			list($syear,$smonth,$sday) = explode('-',$e->start);
			$this->data['sday'] = $sday;
			$this->data['smonth'] = $smonth;
			$this->data['syear'] = $syear;
			list($eyear,$emonth,$eday) = explode('-',$e->end);
			$this->data['eday'] = $eday;
			$this->data['emonth'] = $emonth;
			$this->data['eyear'] = $eyear;
			$this->data['e'] = $e;
			$c = new Category();
			$c->get_iterated();
			$this->data['categories'][''] = "Choose a category";
			foreach($c as $category) {
				$this->data['categories'][$category->id] = $category->name;
			}
		}

		function delete($id = FALSE) {
			$p = new Product($id);
			$m = new Movement();
			$m->where('product_id',$p->id)->get()->delete_all();
			$p->delete();
			$this->session->set_flashdata('msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a>El producto fué eliminado correctamente.</div>');
			redirect($this->agent->referrer());
		}

		function print_thresholds() {
			$p = new Product();
			$this->data['products'] = $p->where('existence <= threshold')->get_iterated();
			$this->layout = "layouts/print";
		}

	}

