<?php

	class jobs extends CI_Controller{

		public function index()
		{

			$this->load->view('templates/header');
			$this->load->view('pages/job');
			$this->load->view('templates/footer');

		}

		public function form_validation()
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules("name","First name","required|alpha");
			$this->form_validation->set_rules("email","Email","required|valid_email");
			$this->form_validation->set_rules("experience","Experience","required");

			if($this->form_validation->run())
			{
				//true

			$this->load->model("jobModel");
			$data=array(
				'name'  =>$this->input->post('name'),
				'email'  =>$this->input->post('email'),
				'experience'  =>$this->input->post('experience')
				);

			$this->jobModel->saveData($data);
			redirect(base_url() . "jobs/inserted");
			}
			else
			{
				
				$this->index();
			}
		}

		public function inserted()
		{
			$this->index();
		}
}



?>