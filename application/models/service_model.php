<?php
	class service_model extends CI_Model{
		public function service_insert($data)
		{
			$this->db->insert('pet_manager', $data);
		}
}
?>
