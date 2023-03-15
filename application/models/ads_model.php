<?php 
class Ads_model extends CI_Model
{
	protected $table = 'ads';
	
	function __construct()
    {
        parent::__construct();
    }
	
	
	
	function get_ads($fields='', $order_type='asc'){
		if($fields!='')
			$this->db->order_by($fields,$order_type);
			
		return $this->db->get($this->table)->result_array();
	}
	
	function remove ($id)
	{
		$this->db->where('ads_id',$id);
		$this->db->delete($this->table);
	}
	
	function get_ad_by_id ($id)
	{
		$this->db->where('ads_id',$id);
		$this->db->join('template', 'template.template_id = ads.template_id');
		return $this->db->get($this->table)->row_array();
	}
	
	function update_ad ($data)
	{
		$this->db->where('ads_id',$data['id']);
		$this->db->set('title',$data['title']);
		$this->db->set('url',$data['url']);
		$this->db->set('template_id',$data['template_id']);
		$this->db->set('ads_content',$data['template_content']);
		$this->db->set('banner_id',$data['banner_id']);
		$this->db->set('last_edit_date',date("y-m-d H:i:s"));
		$this->db->update($this->table);
	}
	
	function insert_ad ($data)
	{
		
		$this->db->set('title',$data['title']);
		$this->db->set('url',$data['url']);
		$this->db->set('template_id',$data['template_id']);
		$this->db->set('ads_content',$data['template_content']);
		$this->db->set('banner_id',$data['banner_id']);
		$this->db->set('user_id',$this->session->userdata('public_id'));
		$this->db->set('username',$this->session->userdata('user_name'));
		$this->db->set('created_date',date("y-m-d H:i:s"));
		$this->db->set('last_edit_date',date("y-m-d H:i:s"));
		$this->db->set('status', '1');
		$this->db->insert($this->table);
		return $this->db->insert_id();
	}
	
	function save_ad ($data)
	{
		$this->db->where('ads_id',$data['ads_id']);
		$this->db->set('ads_content',$data['htmlStr']);
		$this->db->set('last_edit_date',date("y-m-d H:i:s"));
		$this->db->update($this->table);
	}
}
?>