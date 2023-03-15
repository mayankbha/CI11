<?php 
class Banner_model extends CI_Model
{
	protected $table = 'banners';
	
	function __construct()
    {
        parent::__construct();
    }
	
	function get_all ()
	{
		
		return $this->db->get($this->table)->result_array();
	}
	
	
}
?>