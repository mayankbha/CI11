<?php
class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if ($this->session->userdata('admin_id')==TRUE)
			redirect('admin/users');

		$this->data = array();
		$this->load->model('admin_users'); 
	} 

	function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|xss_clean|valid_email|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required|callback_User_Authentication');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

		if ($this->form_validation->run() != FALSE)
			redirect('admin/users');

	   $this->data['body']='admin/login';

	   $this->load->view('admin/structure',$this->data);
	}

	function User_Authentication($password) //function for from validation and admin authentication
	{

		$username=$this->input->post('username',true);

		$result = $this->admin_users->CheckAdminAuthentication($username,$password); // model function for admin user authentication

		if (count($result)==0)
		{

			$this->form_validation->set_message('User_Authentication', "This account doesn't exist in our database.");
			return FALSE;
		} else {

			$this->session->set_userdata('admin_id',$result['user_id']);
			return TRUE;
		}

	}
}
?>
