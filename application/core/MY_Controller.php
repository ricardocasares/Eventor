<?php

	class MY_Controller extends CI_Controller
	{
		protected $data;
		protected $view;
		protected $layout;
		protected $settings;
		
		public function __construct()
		{
			parent::__construct();
			$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
			$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
			$this->output->set_header("Pragma: no-cache");
			$this->output->enable_profiler(TRUE);
			$this->data['settings'] = $this->settings = new Setting(1);
			$this->_language();
		}

		/**
		 * Remap the CI request, running the method
		 * and loading the view
		 */
		public function _remap($method, $arguments) {
			if (method_exists($this, $method)) {
				call_user_func_array(array($this, $method), array_slice($this->uri->rsegments, 2));
			} else {
				show_404(strtolower(get_class($this)).'/'.$method);
			}
			$this->_load_view();
		}

		/**
		 * Load a view into a layout based on
		 * controller and method name
		 */
		private function _load_view() {
			// Back out if we've explicitly set the view to FALSE
			if ($this->view === FALSE) { return; }

			// Get or automatically set the view and layout name
			$view = ($this->view !== null) ? $this->view . '.php' : $this->router->directory . $this->router->class . '/' . $this->router->method . '.php';
			$layout = ($this->layout !== null) ? $this->layout . '.php' : 'layouts/application.php';

			// Load the view into the data
			$this->data['yield'] = $this->load->view($view, $this->data, TRUE);

			// Display the layout with the view
			$this->load->view($layout, $this->data);
		}

		private function _language()
		{
			$this->lang->load('application',$this->settings->language);
			$this->lang->load('form_validation',$this->settings->language);
		}
	}
