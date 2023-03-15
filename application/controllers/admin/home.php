<?php
class Home extends CI_Controller {

   function __construct()
   {
		parent::__construct();
		// Your own constructor code
		if ($this->session->userdata('admin_id')==FALSE)
			redirect('admin/login');

		$this->data = array();

		$this->data['sel']='';
		$this->data['display_menu']='yes';
   }
	   
	   
	   
   function index()
   {
	   $this->data['body']='admin/home';
	   $this->load->view('admin/structure',$this->data);
   }
}
?>
