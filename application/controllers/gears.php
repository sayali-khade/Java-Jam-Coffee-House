<?php
	class gears extends CI_Controller
	{
		public function index()
		{
			

			$this->load->model('gearModel');
			$data['products']= $this->gearModel->getData();
			

			$this->load->view('templates/header');
			$this->load->view('pages/gear', $data);
			$this->load->view('templates/footer');
			$this->load->library('session');
		}

		public function addToCart() {
			$this->load->view('templates/header'); 
			$this->load->view('pages/cart'); 
			$this->load->view('templates/footer'); 
		}

		//loads order page
      public function placeyourorder(){

        	
			$this->load->model('orderModel'); 
        	$this->load->view('templates/header'); 
			$this->load->view('pages/order'); 
			$this->load->view('templates/footer'); 
      }

      //function checks for validation for the placeyourorder page
      public function checkValidationErrors(){

         $this->load->library('form_validation');
         
         //Validation rule for name
         $this->form_validation->set_rules('myName', 'Name',  'required|min_length[3]|max_length[100]');
         //Validation rule for email
         $this->form_validation->set_rules('myEmail', 'Email',  'required|valid_email');
         //Validation rule for Address
         $this->form_validation->set_rules('myAddress', 'Address',  'required|min_length[5]|max_length[150]'); 
         //Validation rule for city
         $this->form_validation->set_rules('myCity', 'City',  'required|min_length[3]|max_length[50]');
         //Validation rule for State
         $this->form_validation->set_rules('myState', 'State',  'required|min_length[5]|max_length[15]');
         //Validation rule for Zip
         $this->form_validation->set_rules('myZip', 'Zip', 'required|numeric|exact_length[5]');
         //Validation rule for Credit Card
         $this->form_validation->set_rules('myCredit', 'Credit Card Number',  'required|numeric|min_length[16]|max_length[16]');
         //Validation rule for Month
         $this->form_validation->set_rules('myMonth', 'Month', 'required|numeric|min_length[1]|max_length[2]');
         //Validation rule for Year
         $this->form_validation->set_rules('myYear', 'Year', 'required|numeric|exact_length[4]');

         if ($this->form_validation->run() == FALSE){
            $this->placeyourorder();
         }else{
               $this->load->model('orderModel');
               $this->orderModel->insertToDbOrder();
               // remove all session variables
               session_unset(); 
               // destroy the session 
               session_destroy();
               $this->placeyourorder();
         }

      }

	}
	?>
	