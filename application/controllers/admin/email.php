<?php
class email extends CI_Controller {

	 function __construct()
     {
        parent::__construct();
		if ($this->session->userdata('admin_id') == FALSE)
			redirect('admin/login');
		$this->header_data = array('system_message' => $this->session->flashdata('message'));

		$this->load->model('outbound_email_model');
		
		$this->data = array();
		
		$this->data['sel']='email';
		$this->data['display_menu']='yes';
		
		$this->load->library('email');		
			
	}
	
	function index($fields='' , $order_type='asc')
	{
		$this->data['emails'] = $this->outbound_email_model->getEmailList($fields, $order_type);
		
		$this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';
		
		$this->data['body']='admin/email/list';
		
		$this->data['message']=$this->session->flashdata('message');
		
		$this->load->view('admin/structure',$this->data);		
	}

	function view()
	{
		$email_id = $this->uri->segment(4, 0);
		
		$this->data['email'] = $this->outbound_email_model->getEmailById($email_id);
		
		$this->data['body']='admin/email/view';
		
		$this->data['message']=$this->session->flashdata('message');
		
		$this->load->view('admin/structure',$this->data);
	}

	function edit($email_id)
	{		
		$this->data['email'] = $this->outbound_email_model->getEmailById($email_id);
		
		$this->data['email_id'] = $email_id;

		$this->data['body']='admin/email/edit';

		$this->data['message']=$this->session->flashdata('message');
		
		$this->load->view('admin/structure',$this->data);
	}
	
	function save($email_id)
	{
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Message', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');
		if($this->form_validation->run() == FALSE)
		{
			$this->edit($email_id);
		}
		else
		{
			if($this->outbound_email_model->save_email($email_id))
			{
				$this->session->set_flashdata('message', 'Email saved.');
				redirect('admin/email');
			}
			else
				redirect('admin/email/edit/'.$email_id);
		}		
	}
   
   function send()
   {
   		
   		$this->data['body']='admin/email/send';	
		$this->load->view('admin/structure',$this->data);	
   }
   
	function SendMail()
	{
		$this->form_validation->set_rules('from', 'From', 'trim|xss_clean|required|valid_email');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
		$this->form_validation->set_rules('content', 'Message', 'trim|required|xss_clean');
		if($this->form_validation->run() == FALSE)
		{
			$this->email->set_mailtype('html');	
			
			if($this->input->post('to_email')==1 )
			{			
				
				$members = $this->members_model->GetAllMembers();
		
				$this->data['emails'] = array();
				$email = '';;
				foreach ($members as $row)
					$email .= $row['email'].",";
	
				$this->email->from($this->input->post('from'));
				
				$this->email->to(trim($email,","));
					
				$this->email->subject($this->input->post('subject'));
				
				$this->email->message($this->input->post('content'));
			
				$this->email->send();
				redirect('admin/email');
				
			}
			else {			
				
				$this->email->from($this->input->post('from'));
				
				$this->email->to($this->input->post('emailId'));
				
				$this->email->subject($this->input->post('subject'));
				
				$this->email->message($this->input->post('content'));
		
				$this->email->send();
				redirect('admin/email');
			}
		}
		else
			$this->send();
		
	}
	
}
?>
