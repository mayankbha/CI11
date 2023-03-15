<?php
class Myaccount extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		// Your own constructor code
		
		$this->data = array();  
		$this->load->model('public_user_model');
		$this->data['sel'] = 'myaccount';
		$this->data['logedin'] = 'yes';
		if ($this->session->userdata('public_id')==FALSE)
			redirect('home');
	}

	function index()
	{
		$id=$this->session->userdata('public_id'); 
		
		$this->data['meta']  = getMetaContent('myaccount','meta');
		
		$this->data['body']='front/account/home';
		
		$this->data['users'] =$this->public_user_model->get_user_info($id);
		
		$this->load->view('front/structure',$this->data);
	}
	
	function edit($id=1,$confirm='')
	{ 
		$this->data['meta']  = getMetaContent('myaccount_edit','meta');
		
		if($this->session->userdata('user_id')){ $id= $this->session->userdata('user_id');}
		
		if($confirm!='') {
		
			$confirmation = getMetaContent('myaccount_edit_confirmation','data');
		
			$this->data['content'] = $confirmation['data'];
		}	
		
		  if ($this->input->post('do_edit_user')) {
		
		        $this->session->set_flashdata('message-title', 'Edit Lesson');
                $db = array();
				
				//insert user  data
				
                $db['first_name'] = $this->input->post('fname');
                $db['last_name'] = $this->input->post('lname');
                $db['email'] = $this->input->post('email');
                $db['password'] = $this->input->post('password');
                $db['phone'] = $this->input->post('phone');
			    $db['city'] = $this->input->post('city');
                $db['state'] = $this->input->post('state');
                $db['zip'] = $this->input->post('zip');
                $db['card_number'] = $this->input->post('card_no');
				$db['exp_date'] = $this->input->post('exp_date');
				$db['cvv'] = $this->input->post('cvv');
				$this->public_user_model->update($db,$id);
                redirect(site_url('myaccount/edit/'.$id."/confirm"));
			}
		
		$this->data['users'] =$this->public_user_model->get_user_info($id);
		$this->data['body']='front/account/edit';
		
		$this->load->view('front/structure',$this->data);
	}	
}

?>