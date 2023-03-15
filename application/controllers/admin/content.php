<?php

class Content extends CI_Controller {

	function __construct()
	{
		 parent::__construct();

		if ($this->session->userdata('admin_id') == FALSE)
			redirect('admin/login');

		$this->header_data = array('system_message' => $this->session->flashdata('message'));

		$this->load->model('content_model');

		$this->data = array();

		$this->data['sel'] = 'content';

		$this->data['display_menu']='yes';
	}

	function index($fields='', $order_type='asc')
	{
		$this->data['contents'] = $this->content_model->getContentList($fields, $order_type);
		
		$this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';

		$this->data['body']='admin/content/content_list';

		$this->load->view('admin/structure',$this->data);
	}

	function edit()
	{

		$content_id = $this->uri->segment(4, 0);

		$this->data['content'] = $this->content_model->getContentById($content_id);

		$this->data['content_id'] = $content_id;

		$this->data['body']='admin/content/content_edit';

		$this->data['message'] = $this->session->flashdata('message');

	    $this->load->view('admin/structure',$this->data);
	}

	function save()
	{

		$content_id = $this->uri->segment(4, 0);

		$this->form_validation->set_rules('title', 'Title', 'trim|xss_clean');

		$this->form_validation->set_rules('description', 'Description', 'trim|xss_clean');

		$this->form_validation->set_rules('keywords', 'Keywords', 'trim|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$this->edit();
		}else{
			if($this->content_model->Save($content_id))
			{
				$this->session->set_flashdata('message', 'Content saved.');
				redirect('admin/content');
			}
			else
				$this->edit();
		}		
	}

	function view()
	{
		$content_id = $this->uri->segment(4, 0);

		$this->data['content'] = $this->content_model->getContentById($content_id);

		$this->data['message'] = $this->session->flashdata('message');

		$this->data['body']='admin/content/content_view';

	    $this->load->view('admin/structure',$this->data);
	}

	function delete($id)
	{
		if(is_numeric($id))
		{
			$this->content_model->del_content($id);

			$this->session->set_flashdata('message', 'Content has been deleted');

			redirect('admin/content');
		}
	} 
}
/* End of file home.php */
/* Location: ./system/application/controllers/admin/home.php */