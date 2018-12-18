<?php
	class client_model extends CI_Model{

		public function client_insert($data)
		{
			$this->db->insert('users', $data);
		}

		public function login($email){
	// Validate
		$this->db->where('email', $email);
		$result = $this->db->get('users');

		if($result->num_rows() == 1){
			return $result->row(0)->role_id;
		} else {
			return false;
	}
}

}
?>
