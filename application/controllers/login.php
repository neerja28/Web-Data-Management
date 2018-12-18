<?php
	class login extends CI_Controller{
// Log in user
    public function login_user(){
      $data['title'] = 'Sign In';
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      if($this->form_validation->run() === FALSE)
			{
          $this->load->view('templates/header');
          $this->load->view('pages/login', $data);
          $this->load->view('templates/footer');
  		}

			else {
      $email = $this->input->post('email');
      $result = $this->client_model->login($email);

      if($result){
      	$user_data = array(
        	'email' => $email,
        	'logged_in' => true
      	);
      	$this->session->set_userdata($user_data);
      	$this->session->set_flashdata('user_loggedin', 'You are now logged in');

				$this->load->view('templates/header1');
				$this->load->view('pages/login_client', $data);
				$this->load->view('templates/footer');
    	}
			else {
			$this->load->view('templates/header1');
			$this->load->view('pages/login_service', $data);
			$this->load->view('templates/footer');
    }

  }
}

public function logout(){
			// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('role_id');
			$this->session->unset_userdata('email');
			// Set message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');
			redirect('pages/login');
		}

}
