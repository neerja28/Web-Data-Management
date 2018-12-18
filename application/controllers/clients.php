<?php
	class clients extends CI_Controller{
		// Register user
		public function client_register(){
			$data['title'] = 'Client Service';
			$this->form_validation->set_rules('fname', 'First Name', 'required');
      $this->form_validation->set_rules('lname', 'Last Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone');
			$this->form_validation->set_rules('address', 'Address', 'required');
			if($this->form_validation->run() === FALSE)
      {
				$this->load->view('templates/header');
				$this->load->view('pages/client', $data);
				$this->load->view('templates/footer');
			}
      else
       {
				$fname = $this->input->post('fname');
				$lname = $this->input->post('lname');
				$email = $this->input->post('email');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');

         $data = array(
          'fname' => $fname,
          'lname' => $lname,
          'email' => $email,
          'phone' => $phone,
          'address' => $address,
					'role_id' => 100,
					'password' => 123456789
         );
         $this->client_model->client_insert($data);

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
         redirect('clients/client_register');
			}

		}
}
?>
