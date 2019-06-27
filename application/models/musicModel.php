<?php

	class musicModel extends CI_Model
	{
		public function getData()
		{
			$this->db->select('musician.Musician_Image_URL,perfomance.Description,perfomance.Month,musician.Name');
			$this->db->from('musician');
			$this->db->join('perfomance', 'musician.MusicianId = perfomance.MusicianId');
			$this->db->order_by('perfomance.Month');
			$query = $this->db->get();

			return $query->result();
			

		}
	}
?>