<?php
	class contacts extends CI_Controller{
		// Register user
		public function contact_us(){
			$data['title'] = 'Contact Us';
			$this->form_validation->set_rules('fname', 'First Name', 'required');
      $this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('comments', 'Comments', 'required');
			if($this->form_validation->run() === FALSE)
      {
				$this->load->view('templates/header');
				$this->load->view('pages/contact', $data);
				$this->load->view('templates/footer');
			}
      else
       {
         $data = array(
          'fname' => $this->input->post('fname'),
          'lname' => $this->input->post('lname'),
          'email' => $this->input->post('email'),
          'phone' => $this->input->post('phone'),
          'comments' => $this->input->post('comments')
         );
         $this->contact_model->contact_insert($data);
         // set flash data
         $this->session->set_flashdata('message', 'Thank you for contacting us!');
         redirect('contacts/contact_us');
			}

		}
}
?>
