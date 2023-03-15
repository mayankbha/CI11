<?php

class Public_users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('admin_id') == FALSE) {
            redirect('admin/login');
        }
        $this->load->model('public_user_model');

     
        $this->data = array();
        $this->data['sel'] = 'email';
        $this->data['display_menu'] = 'yes';
    }

 

    public function index($fields='', $order_type='asc') {
        
        $this->data['users'] =  $this->public_user_model->get_users($fields, $order_type);
        $this->data['order_type'] = ($order_type == 'asc') ? 'desc' : 'asc';

        $this->data['body'] = 'admin/public_user/home';

        $this->load->view('admin/structure', $this->data);
    }
    
    public function export($fields='', $order_type='asc') {
        $this->data['file_name'] = 'admin_public_users_' . date('m-d-y') . '.csv';
        $this->data['users'] =  $this->public_user_model->export_user($fields, $order_type);
        $this->load->view('admin/public_user/export', $this->data);
    }
	
	function view($user_id=0)
	{	  	

		$this->data['user'] = $this->public_user_model->get_user_by_id($user_id);

	   	$this->data['user_id']=$user_id;

	   	$this->data['body']='admin/public_user/view';

	   	$this->load->view('admin/structure',$this->data);	  

	}
	
	function edit($user_id)
	{	  	

		if ($user_id!=0){			
                   
			$this->data['user'] = $this->public_user_model->get_user_by_id($user_id);
			$this->data['edit']='edit';  
			$this->session->set_userdata('edit_user_id',$user_id);

		}else

	   $this->data['edit']='new';
	   $this->data['user_id']=$user_id;
	   $this->data['body']='admin/public_user/edit';
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
			//$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
		} else {

			if($this->input->post('password',TRUE) != '' || $this->input->post('confirm',TRUE)!='') 
			{	
				$this->form_validation->set_rules('password', 'Password', 'trim|xss_clean|required');

				//$this->form_validation->set_rules('confirm', 'Confirm Password', 'trim|xss_clean|required|callback_same');
			}
		}	

		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

	  	if ($this->form_validation->run() != FALSE)
		{

	  		$first_name=$this->input->post('first_name',true);

			$last_name=$this->input->post('last_name',true);

			$email=$this->input->post('email',true);

			$password=$this->input->post('password');

			$company_name = $this->input->post('company_name',true); 
			
			$business_type = $this->input->post('business_type',true); 
			
		    $phone_number = $this->input->post('phone_number',true); 
                       
			$this->public_user_model->SaveAdminUser($first_name, $last_name, $email, $password, $user_id,$company_name,$business_type,$phone_number);		//Calling model function for save admin user details

			if ($user_id==0){			

				$this->data['edit']='new';

				$this->session->set_flashdata('message', 'User added successfully');

			    redirect('admin/public_users');

	  		}else 

				$this->session->set_flashdata('message', 'User updated successfully');

			    redirect('admin/public_users');
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

		$result=$this->public_user_model->CheckAdminUser($email, $this->session->userdata('edit_user_id'));

		if(count($result)>0){

			$this->form_validation->set_message('username_check', 'This email address already exist in our database.');

			return FALSE;
		} else {

			return TRUE;

		}
	}
	
	function delete($id=0)
	{
		if(is_numeric($id))
		{

			$this->public_user_model->del_user($id);

			$this->session->set_flashdata('message', 'Public user has been deleted');
			redirect('admin/public_users');
		}
	} 
	
}
