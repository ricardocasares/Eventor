<?php

	class Events extends Backend_Controller {

		function index($page = 0) {
			$e = new Event();
			$this->data['events'] = $e->include_related('category',array('name','color'))->get_paged_iterated($page,$this->settings->per_page);
		}

		function upcoming($page = 0)
		{
			$e = new Event();
			$this->data['upcoming'] = $this->data['upcoming'] = $e->include_related('category',array('name','color'))->where('DATEDIFF(DATE(start),DATE(NOW())) <=',7)->get_paged_iterated($page,$this->settings->per_page);
		}

		function drag()
		{
			$this->layout = FALSE;
			$this->view = FALSE;
			if($this->input->post('id') && $this->input->post('day'))
			{
				$e = new Event($this->input->post('id'));
				list($year,$month,$day) = explode('-',$e->start);
				$e->start = $year.'-'.$month.'-'.$this->input->post('day');
				if($e->save())
				{
					$this->load->helper('text');
					echo ellipsize($e->title, 20,1,'..');
				}
				else echo "Error: Try again";
			}
		}

		function calendar($y = FALSE , $m = FALSE)
		{
			if(!$this->connected) $this->layout = "layouts/public";
			$this->load->library('calendar');
			$e = new Event();

			$y = ($y) ? $y : date('Y');
			$m = ($m) ? $m : date('m');

			$events = $e->select('DAY(start) AS day,events.id,title,description,cost')->where('MONTH(start)',$m)->where('YEAR(start)',$y)->include_related('category',array('color'))->get_iterated();
			$this->load->helper('text');

			$ul = array();
			foreach($events as $e) {
				$ul[$e->day][] = '<span class="label" style="background:'.$e->category_color.';">'.anchor('events/show/'.$e->id,ellipsize($e->title, 20,1,'..'),'id="'.$e->id.'" class="tip" data-toggle="modal" data-original-title="'.$e->title.'"').'</span>';
			}

			$data = array();
			foreach($ul as $day => $event) {
				$data[$day] = ul($event,array('class' => 'unstyled sortable'));
			}

			$this->data['calendar'] = $this->calendar->generate($y,$m,$data);
			$c = new Category();
			$this->data['categories'] = $c->get_iterated();
		}

		function do_search()
		{
			$this->view = FALSE;
			redirect('events/search/'.urlencode($this->input->post('query')));
		}

		function search($query = FALSE,$page = 0) {
			$query = urldecode($query);
			$e = new Event();

			if($query) {
				$this->data['events'] = $e->include_related('category',array('name','color'))->ilike('title',$query)->get_paged_iterated($page,$this->settings->per_page);
			}
			else {
				$this->data['events'] = $e->include_related('category',array('name','color'))->get_paged_iterated($page,$this->settings->per_page);
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
			$e = new Event();
			$this->data['event'] = $e->include_related('category',array('name','color'))->get_by_id($id);
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
			$e = new Event($id);
			$e->delete();
			$this->session->set_flashdata('msg','<div class="alert alert-success"><a class="close" data-dismiss="alert">×</a>THe event was succesfully deleted.</div>');
			redirect($this->agent->referrer());
		}

	}
