<?php
class Users extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('admin_id')=='')
			redirect('admin/login');

		$this->load->model('admin_users');													//load admin user model

		$this->data = array();

		$this->data['sel']='users';

		$this->data['display_menu']='yes';
	}

	function index($fields='', $order_type='asc')
	{
		$this->data['users'] =  $this->admin_users->get_users($fields, $order_type);
		
		$this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';
	
		$this->data['body']='admin/users/home';
                    
		$this->load->view('admin/structure',$this->data);
		
	}

	function delete_pp($user_id) 	   
	{
		$this->data['user_id'] = $user_id;

		$this->load->view('admin/users/remove',$this->data);
	}

	function delete($id)
	{
		if(is_numeric($id))
		{

			$this->admin_users->del_user($id);

			$this->session->set_flashdata('message', 'Admin user has been deleted');
			redirect('admin/users');
		}
	} 

	function edit($user_id)
	{	  	

		if ($user_id!=0){			
                   
			$this->data['user'] = $this->admin_users->get_user_by_id($user_id);

			$this->data['edit']='edit';  

			$this->session->set_userdata('edit_user_id',$user_id);

		}	else

			$this->data['edit']='new';
              
	   $this->data['user_id']=$user_id;

	   $this->data['body']='admin/users/edit';
        
  $this->load->view('admin/structure',$this->data);	  

	}

	function view($user_id)
	{	  	

		$this->data['user'] = $this->admin_users->get_user_by_id($user_id);

	   	$this->data['user_id']=$user_id;

	   	$this->data['body']='admin/users/view';

	   	$this->load->view('admin/structure',$this->data);	  

	}

	function save($user_id)
	{
		//Set Form validation rules

	  	$this->form_validation->set_rules('first_name', 'First Name', 'trim|xss_clean|required|alpha|callback_name_check');

		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|xss_clean|required|alpha|callback_name_check');

	  	$this->form_validation->set_rules('email', 'Email Address', 'trim|xss_clean|required|valid_email|callback_username_check');

		if($user_id==0)
		{
			$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');
			$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
		} else {

			if($this->input->post('password',TRUE) != '' || $this->input->post('confirm',TRUE)!='') 
			{	
				$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');

				$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
			}
		}	

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

	  	if ($this->form_validation->run() != FALSE)
		{

	  		$first_name=$this->input->post('first_name',true);

			$last_name=$this->input->post('last_name',true);

			$email=$this->input->post('email',true);

			$password=$this->input->post('password',true);

	  		$active = $this->input->post('active',true); 
                       
			$this->admin_users->SaveAdminUser($first_name, $last_name, $email, $password, $user_id, $active);		//Calling model function for save admin user details

			if ($user_id==0){			

				$this->data['edit']='new';

				$this->session->set_flashdata('message', 'User added successfully');

			redirect('admin/users');

	  		}else 

				$this->session->set_flashdata('message', 'User updated successfully');

			redirect('admin/users');
	  	} else {

			$this->edit($user_id);

		}
	}

	function same($confirm)
	{
		$pass=$this->input->post('password');

		if ($confirm!=$pass)
		{

			$this->form_validation->set_message('same', "The two passwords do not match");

			return FALSE;
		} else {

			return TRUE;

		}
	}

	function name_check($name)
	{
		if ($name=='First Name' || $name=='Last Name')
		{
			$this->form_validation->set_message('name_check', "The ".$name." is required");
			return FALSE;
		} else {

			return TRUE;
		}
	}

	function username_check($email) 
	{ 

		$result=$this->admin_users->CheckAdminUser($email, $this->session->userdata('edit_user_id'));

		if(count($result)>0){

			$this->form_validation->set_message('username_check', 'This email address already exist in our database.');

			return FALSE;
		} else {

			return TRUE;

		}
	}
}
?>
