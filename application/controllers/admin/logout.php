<?php
class Logout extends CI_Controller {

   function __construct()
   {
		parent::__construct();

		$this->data = array();
   }

   function index(){

		$this->session->unset_userdata(array('admin_id'=>''));

		$this->session->sess_destroy();

		$this->data['body']='admin/logout';

		$this->load->view('admin/structure',$this->data);
   }

   function log_out(){

		$this->session->unset_userdata(array('admin_id'=>''));

		$this->session->sess_destroy();

		$this->session->set_flashdata('message', 'You have been logged out.');

		redirect('admin/logout');

   }

}
?>
