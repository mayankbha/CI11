<?php
class Contacts extends CI_Controller {
	function __construct()
    {
		parent::__construct();
		if ($this->session->userdata('admin_id') == FALSE)
			redirect('admin/login');
			
		$this->header_data = array('system_message' => $this->session->flashdata('message'));

		$this->load->model('contacts_model');

		$this->load->library('form_validation');

		$this->data = array();
		$this->data['sel']='contacts';
		$this->data['display_menu']='yes';
	}

	function index($fields='', $order_type='asc')
	{
		$this->data['contacts']=$this->contacts_model->getContactList($fields, $order_type);
		
		$this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';
		
		$this->data['message'] = $this->session->flashdata('message');
		
		$this->data['body']='admin/contacts/list';

		$this->load->view('admin/structure',$this->data);
	}

    function view($contact_id, $fields='', $order_type='asc')
	{
		$this->data['contact']=$this->contacts_model->getContactById($contact_id);
		if(empty($this->data['contact']))
			redirect('admin/contacts');
		if($this->data['contact']['reply']==0)
			$this->data['replys'] = $this->contacts_model->getContactusHistory($contact_id, $fields, $order_type);
		else
			$this->data['replys'] = $this->contacts_model->getContactusHistory($this->data['contact']['reply'], $fields, $order_type);
		$this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';		
		$this->data['contact_id'] = $contact_id;
		$this->data['message'] = $this->session->flashdata('message');
		$this->data['body']='admin/contacts/view_contact';
		$this->load->view('admin/structure',$this->data);
	}

	function reply($contact_id, $fields='', $order_type='asc')
    {
		$this->data['contact']=$this->contacts_model->getContactById($contact_id);
		if(empty($this->data['contact']))
			redirect('admin/contacts');
		if($this->data['contact']['reply']==0)
			$this->data['replys'] = $this->contacts_model->getContactusHistory($contact_id, $fields, $order_type);
		else
			$this->data['replys'] = $this->contacts_model->getContactusHistory($this->data['contact']['reply'], $fields, $order_type);
	
		$this->data['order_type'] = ($order_type=='asc') ? 'desc' : 'asc';	
		
		$this->data['contact_id'] = $contact_id;	

		$this->data['body']='admin/contacts/reply_contact';

		$this->load->view('admin/structure',$this->data);

    }

	function history($contact_id, $fields='')
	{
		if($fields!='')
		{
			if($this->session->userdata('sorttype')=='')
				$this->session->set_userdata(array('sorttype'=>'asc'));
			else { 

				if($this->session->userdata('sorttype')=='asc') {
					$this->session->unset_userdata(array('sorttype'=>''));

					$this->session->set_userdata(array('sorttype'=>'desc'));

				} else {

					$this->session->unset_userdata(array('sorttype'=>''));
					
					$this->session->set_userdata(array('sorttype'=>'asc'));
				}	
			}
		}

		$this->data['historys'] = $this->contacts_model->getContactusHistory($contact_id, $fields='');

		$this->data['contact_id'] = $contact_id;

		$this->data['message'] = $this->session->flashdata('message');

		$this->data['body']='admin/contacts/history_contact';

		$this->load->view('admin/structure',$this->data);

	}

	function delete_history($contact_id)
	{

		$contact=$this->contacts_model->getContactById($contact_id);

		$this->contacts_model->Delete_Contacts($contact_id);

		$this->session->set_flashdata('message', 'The contact has been deleted.');

		redirect('admin/contacts/view/'.$contact['reply']);
	}
	function send($contact_id)
	{
		if($this->contacts_model->reply($contact_id)){ 


			if(isset($_FILES['attachment']['name']))
			{
				if($_FILES['attachment']['error']==0)
				{
					$filename = $_FILES['attachment']['name'];

					$config['upload_path'] = FCPATH.'/data/contactus/';

					$config['allowed_types'] = '*';

					$this->load->library('upload', $config);

					$this->upload->do_upload('attachment');
				}
			}

			$this->data['contact']=$this->contacts_model->getContactById($contact_id);

            $this->load->library('email');

			$this->email->from($this->config->item('default_email'),'Skinected');

			$this->email->to($this->data['contact']['email']);

			$this->email->subject($this->input->post('subject'));

			if(isset($_FILES['attachment']['name']))

			{

				if($_FILES['attachment']['error']==0)

					$this->email->attach(FCPATH.'/data/contactus/'.$filename);

			}

			$this->email->message($this->input->post('message'));

			$this->email->send();

            $this->session->set_flashdata('message', 'Your reply was sent.');

            redirect('admin/contacts');

      	}

		else

			$this->reply($contact_id);
	}

    //deletes a contact
	function delete($contact_id)
	{

		$this->contacts_model->Delete_Contacts($contact_id);

		$this->session->set_flashdata('message', 'The contact has been deleted.');

		redirect('admin/contacts');

	}

	function delete_pp($contact_id) 	   
	{
		$this->data['contact_id'] = $contact_id;
		$this->load->view('admin/contacts/remove',$this->data);

	}

}

/* End of file home.php */

/* Location: ./system/application/controllers/admin/home.php */
