<?php
	class contact_model extends CI_Model{
		public function contact_insert($data)
		{
			$this->db->insert('contact_details', $data);
		}
}
?>
