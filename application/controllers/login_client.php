

<?php
	class login_client extends CI_Controller{
// Log in user
    public function login_c(){
      $data['title'] = 'Sign In';
      $this->form_validation->set_rules('pname', 'Pets Name', 'required');
      $this->form_validation->set_rules('dob', 'DOB', 'required');
      $this->form_validation->set_rules('inum', 'inum', 'required');
      $this->form_validation->set_rules('color', 'color');
      $this->form_validation->set_rules('food', 'food');

      if($this->form_validation->run() === FALSE){
          $this->load->view('templates/header');
          $this->load->view('pages/login_client', $data);
          $this->load->view('templates/footer');
      } else {

				$this->load->view('templates/header');
				$this->load->view('pages/login_client', $data);
				$this->load->view('templates/footer');

      $this->session->set_flashdata('message', 'Thank you for registering your pet'!);
    }
  }
}
