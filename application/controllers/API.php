<?php
class API extends CI_Controller{
public function testAPI()

{
  $query=$this->db->query('select * from contact_details');
  echo json_encode($query->result());
}
}
