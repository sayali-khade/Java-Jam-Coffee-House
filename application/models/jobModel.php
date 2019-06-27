<?php

	class jobModel extends CI_Model
	{
			public function saveData($data)
			{
			
				$this->db->insert('jobs', $data);
		
			}
	}
?>