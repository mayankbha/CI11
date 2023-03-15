<?php 
class contacts_model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	function getContactList($field='', $order_type)
	{	
		if($field!='')	
			$this->db->order_by($field, $order_type);

		return $this->db->where('reply',0)->from('contacts')->get()->result_array();
	}

	function getContactById($contact_id)
	{
		return $this->db->where('contact_id', $contact_id)->get('contacts')->row_array();
	}

	function getContactusHistory($contact_id, $field='', $order_type)
	{
		if($field!='')	
			$this->db->order_by($field, $order_type);
		else
			$this->db->order_by('date','desc');
		return $this->db->where('reply',$contact_id)->get('contacts')->result_array();	
	}

	function delete($contact_id)
	{
		if(!empty($contact_id))
		{
			$this->db->where('contact_id', $contact_id);

			$this->db->delete('contacts');

			$this->session->set_flashdata('message', 'Contact has been deleted.');

			return true;
		} else {

			$this->session->set_flashdata('message', 'Contact does not deleted. Try again!');

			return false;	

		}	

	}

	function reply($contact_id)
	{
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');

		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if($this->form_validation->run() == FALSE)
		{	
			$this->session->set_flashdata('message', validation_errors());

			return false;
		} else {		
			$contacts = $this->getContactById($contact_id);

			$this->db->set('first_name',$contacts['first_name']);

			$this->db->set('last_name',$contacts['last_name']);

			$this->db->set('email',$contacts['email']);

			$this->db->set('date',date('Y-m-d H:i:s'));

			$this->db->set('subject',$this->input->post('subject'));

			$this->db->set('message',$this->input->post('message'));
			if($contacts['reply']==0)
				$this->db->set('reply',$contact_id);
			else	
				$this->db->set('reply',$contacts['reply']);
			$this->db->insert('contacts');

            return true;

       }

	}

	function Delete_Contacts($contact_id)
	{

		$this->db->where('contact_id', $contact_id)->delete('contacts');

		return true;

	}

	function getContectByEmail($email)
	{
		return $this->db->where(array('email'=>$email,'reply'=>0))->get('contacts')->row_array();
	}


	function Save()
	{	

		$contact = $this->getContectByEmail($this->input->post('email'));

		$this->db->set('first_name',$this->input->post('first_name'), TRUE);

		$this->db->set('last_name',$this->input->post('last_name'), TRUE);

		$this->db->set('email',$this->input->post('email'), TRUE);

		$this->db->set('subject',$this->input->post('subject'), TRUE);

		$this->db->set('message',$this->input->post('message'), TRUE);
		if($this->input->post('pin')!='')
			$this->db->set('pin',$this->input->post('pin'), TRUE);

		$this->db->set('date',date('Y-m-d H:i:s'));

		if(count($contact) > 0)
			$this->db->set('reply',$contact['contact_id']);

		$this->db->insert('contacts');

		return TRUE;

	}
}
?>
