<?php

class Template_model extends CI_Model {

    var $template = "template";
    var $emails = "emails";
    protected $table = 'template';
    function __construct() {
        parent::__construct();
    }


    function get_template($fields = '', $order_type = 'asc') {
        if ($fields != '')
            $this->db->order_by($fields, $order_type);

        return $this->db->get($this->template)->result_array();
    }
    
   function get_template_by_id($id){
		if(is_numeric($id)){
			return $this->db->where('template_id',$id)->get($this->template)->row_array();
		}
	}
	
	
  function SaveTemplate($template_name, $user_name, $status,$template_content,$t_id)
	{
		$this->db->set('template_name',$template_name);
		$this->db->set('user_name',$user_name);
		$this->db->set('status',$status);
		$this->db->set('template_content',$template_content);
		$this->db->set('created_on',date('Y-m-d'));
	
		
		if ($t_id==0){
	  		$this->db->insert($this->template);
		} else {
	  		$this->db->where('template_id',$t_id);
			$this->db->update($this->template);
		}
		
		return TRUE;
	}	
   
    function del_user($id){
		if(is_numeric($id)){
			return $this->db->where('template_id',$id)->delete('template');
		}
	}
	
	function get_all_active ()
	{
		
		$this->db->where('status', '1');
		return $this->db->get($this->table)->result_array();
	}
	
   
}


 

?>