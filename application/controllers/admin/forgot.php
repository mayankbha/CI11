<?php
class Forgot extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// Your own constructor code

		$this->load->helper('string');

		$this->load->model('admin_users'); 				//Calling admin user model

		$this->load->model('outbound_email_model');		//Calling outbound user model	

		$this->data = array();
	}

	function index()
	{

	   $this->data['body']='admin/forgot';

	   $this->load->view('admin/structure',$this->data);	   	   

	}

	function send()
	{

		$this->load->library('form_validation');									//load form validation library

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_username_check');

		if ($this->form_validation->run() != FALSE)
		{

			$email_to=$this->input->post('email');

			$new_pass=random_string('alnum', 16);
			//Update Password into db
			$this->admin_users->UpdateAdminPassword($email_to,$new_pass);  				//Model Function calling for save updateed password of admin

			//sending email with the  password

			$this->load->library('email');												

			$result =$this->outbound_email_model->get('admin_forgot_password');			//Model Function calling for get email content

			$message= $result['content'];

			$message=str_replace('{PASSWORD}',$new_pass,$message);

			$this->email->from($result['from'], $result['from_name']);

			$this->email->to($email_to);

			$this->email->subject($result['subject']);

			$this->email->message($message);

			$this->email->send();

			$this->session->set_flashdata('message', 'New password has been sent to you');	

			redirect('admin/login');	

		} else {
                 
			$this->session->set_flashdata('message', validation_errors());
                      
		         redirect('admin/forgot');

		}		

	}

	function username_check($str)
	{
		$result =$this->admin_users->CheckAdminUser($str); // Model function for check admin user 
		if(count($result)==0){

			$this->form_validation->set_message('username_check', 'This email address does not exist in our database.');
			return FALSE;
		} else {
			return TRUE;
		}

	}
}

?>
