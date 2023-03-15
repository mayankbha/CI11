<?php
class Manager extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		// Your own constructor code
		
		$this->data = array();  
		
		$this->load->model(array('ads_model','template_model','banner_model'));	
		
		$this->data['sel'] = 'manager';
		
		$this->data['logedin'] = 'yes';
		
		if ($this->session->userdata('public_id')==FALSE)
			redirect('home');
	} 

	function index($fields='', $order_type='asc')
	{
		$user_id=$this->session->userdata('public_id'); 	
			
		$this->data['items'] =  $this->ads_model->get_ads($fields, $order_type);
		
		$this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';
		 
		$this->data['meta']  = getMetaContent('creative_manager','meta');
		
		$confirmaton  = getMetaContent('creative_manager_remove_confirmation','data');
		
		$this->data['content']  = $confirmaton['data'];
		
		$this->data['body']='front/manager/home';
		
		$this->load->view('front/structure',$this->data);
	}
	
	function view($id)
	{
		
		 
		$this->data['meta']  = getMetaContent('creative_manager_detail','meta');
		
		
	
		if (isset($id)&&(!empty($id)))
			{
				$this->data['ad'] =  $this->ads_model->get_ad_by_id($id);
				$this->data['banners'] =  $this->banner_model->get_all();
			}
		else
			{
				$id=$_POST['ads_id'];
			} 
		$this->data['meta']  = getMetaContent('ads_preview','meta');
		
		$this->data['body']='front/manager/preview';
		
		$this->load->view('front/structure',$this->data);
	
	}
	
	function remove($id)
	{
		
		$this->ads_model->remove($id);
		
		redirect('manager/index');
	}

	 function logout ()
	 {
	 	$this->session->unset_userdata(array('public_id'=>''));

		$this->session->sess_destroy();

		redirect('home');
		
	 }
	
}

?>