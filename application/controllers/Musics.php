<?php
	class Musics extends CI_Controller
	{
		public function index()
		{
			$this->load->model('musicModel');
			$data['artist']= $this->musicModel->getData();


			$this->load->view('templates/header');
			$this->load->view('pages/music', $data);
			$this->load->view('templates/footer');
		}
	}
	