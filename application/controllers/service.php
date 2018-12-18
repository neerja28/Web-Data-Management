<?php
	class service extends CI_Controller{
		// Register user
		public function service_register(){
			$data['title'] = 'Business Service';
			$this->form_validation->set_rules('fname', 'First Name', 'required');
      $this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('business', 'business', 'required');
			if($this->form_validation->run() === FALSE)
      {
				$this->load->view('templates/header');
				$this->load->view('pages/service', $data);
				$this->load->view('templates/footer');
			}
      else
       {
         $data = array(
          'm_fname' => $this->input->post('fname'),
          'm_lname' => $this->input->post('lname'),
          'm_email' => $this->input->post('email'),
          'm_phone' => $this->input->post('phone'),
          'business' => $this->input->post('business')
         );
         $this->service_model->service_insert($data);

         //SMTP & mail configuration
         $config = array(
           'protocol'  => 'smtp',
           'smtp_host' => 'ssl://smtp.googlemail.com',
           'smtp_port' => 465,
           'smtp_user' => 'n.neerja28work@gmail.com',
           'smtp_pass' => 'be superpositive',
           'mailtype'  => 'html',
           'charset'   => 'utf-8'
         );

         $to_email = $this->input->post('email');

         $this->email->initialize($config);
         $this->email->set_mailtype("html");
         $this->email->set_newline("\r\n");

         //Email content
         $htmlContent = '<h1>Board the furry journey anytime!</h1>';
         $htmlContent .= '<p><h2>Your password is: "123456789"</h2></p>';

         $this->email->to($to_email);
         $this->email->from('n.neerja28work@gmail.com','Neerja');
         $this->email->subject('Pet Store: Thanks for registering with us!');
         $this->email->message($htmlContent);

         //Send email
         $this->email->send();


         // set flash data
         $this->session->set_flashdata('message', 'Thank you, for registering with us. Please check your mail for password.');
         redirect('service/service_register');
			}

		}
}
?>
