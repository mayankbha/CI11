<?php 

class Content_Model extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }

	function getContentList($field='', $order_type)
	{

		if($field!='')
			$this->db->order_by($field,$order_type);	
		else
			$this->db->order_by('name','asc');		
		return $this->db->from('content')->get()->result_array(); 
	}

	function getContentById($content_id)
	{
		if($content_id==0) 
			$content = array_fill_keys($this->db->list_fields('content'), '');	
		else	
			$content = $this->db->where('content_id', $content_id)->get('content')->row_array();
		return $content;
	}

	function Save($content_id)
	{
		if ($content_id == 0)
		{
			$this->db->set('content_id', '');
			$this->db->insert('content');
			$content_id = $this->db->insert_id();
		}
		//$this->db->set('name', $this->input->post('name'));
		$this->db->set('title', $this->input->post('title'),true);
		$this->db->set('description', $this->input->post('description'),true);
		$this->db->set('keywords', $this->input->post('keywords'),true);
		$this->db->set('data', $this->input->post('data',true));
		if($this->input->post('video',true)!='')
			$this->db->set('video', $this->input->post('video',true));

		$this->db->where('content_id', $content_id);
		$this->db->update('content');

		$this->session->set_flashdata('message', 'Content saved.');

		return true;
	}

	function del_content($id){

		if(is_numeric($id)){
			return $this->db->where('content_id',$id)->delete('content');
		}
	}
}
?>
