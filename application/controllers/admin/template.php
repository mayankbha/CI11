<?php
class Template extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		// Your own constructor code
		
		$this->data = array();  
		$this->load->model('template_model');
		$this->data['sel'] = 'template';
		$this->data['logedin'] = 'yes';
		$this->data['display_menu'] = 'yes';
	}

	function index($fields='', $order_type='asc')
	{
		$id=$this->session->userdata('public_id'); 
		
		$this->data['templates'] =  $this->template_model->get_template($fields, $order_type);
        $this->data['order_type'] = ($order_type == 'asc') ? 'desc' : 'asc';
		
		$this->data['body']='admin/template/home';
		
		$this->load->view('admin/structure',$this->data);
	}
	
	function edit($t_id=0)
	{	  	

		if ($t_id!=0){			
                   
			$this->data['template'] = $this->template_model->get_template_by_id($t_id);
			$this->data['edit']='edit';  
			$this->session->set_userdata('edit_template_id',$t_id);

		}else

	   $this->data['edit']='new';
	   $this->data['t_id']=$t_id;
	   $this->data['body']='admin/template/edit';
       $this->load->view('admin/structure',$this->data);	  

	}
	
	
	function save($t_id=0)
	{
		
		//Set Form validation rules

	  	    $this->form_validation->set_rules('template_name', 'Template Name', 'trim|xss_clean|required');

		    $this->form_validation->set_rules('user_name', 'User Name', 'trim|xss_clean|required|alpha');

           	$this->form_validation->set_error_delimiters('<div class="error" style="color:red;">', '</div>');

	  	    if ($this->form_validation->run() != FALSE)
		    {

				 $template_name=$this->input->post('template_name',true);
	
				 $user_name=$this->input->post('user_name',true);
	
			     $status=$this->input->post('status',true);
				 
				 $template_content=$this->input->post('template_content',true);
	
			     $this->template_model->SaveTemplate($template_name, $user_name, $status,$template_content,$t_id);		

				 $this->session->set_flashdata('message', 'Template updated successfully');

			    if ($t_id==0){			

				$this->data['edit']='new';

				$this->session->set_flashdata('message', 'Template added successfully');

			     redirect('admin/template');

	  		    }else 

				$this->session->set_flashdata('message', 'Template updated successfully');

			    redirect('admin/template');

				
			
			}else {

			$this->edit($t_id);

		}
	   
	}

	function delete($id=0)
	{
		if(is_numeric($id))
		{

			$this->template_model->del_user($id);

			$this->session->set_flashdata('message', 'Template has been deleted');
			redirect('admin/template');
		}
	} 
	
	function view($t_id=0)
	{	  	

		$this->data['template'] = $this->template_model->get_template_by_id($t_id);

	   	$this->data['user_id']=$t_id;

	   	$this->data['body']='admin/template/view';

	   	$this->load->view('admin/structure',$this->data);	  

	}
	
	
}

?>