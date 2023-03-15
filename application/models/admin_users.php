<?php 
class admin_users extends CI_Model
{

	function __construct()
    {
        parent::__construct();
    }
	
	function get_user_by_id($id){
		if(is_numeric($id)){
			return $this->db->where('user_id',$id)->get('admin_users')->row_array();
		}
	}
	
	function get_users($fields='', $order_type='asc'){
		if($fields!='')
			$this->db->order_by($fields,$order_type);
			
		return $this->db->get('admin_users')->result_array();
	}
	function del_user($id){
		if(is_numeric($id)){
			return $this->db->where('user_id',$id)->delete('admin_users');
		}
	}
	
	function CheckAdminAuthentication($email, $password)
	{
		return $this->db->where(array('email'=>$email,'password'=>md5($password),'active'=>1))->from('admin_users')->get()->row_array();
	}
	
	function CheckAdminUser($username, $user_id=0)
	{
		return $this->db->where(array('email'=>$username, 'user_id <>'=>$user_id))->from('admin_users')->get()->row_array();
	}
	
	function UpdateAdminPassword($email,$password)
	{
		$this->db->set('password',md5($password));
		$this->db->where('email',$email);
		$this->db->update('admin_users');
		return true;
	}
	
	function SaveAdminUser($first_name, $last_name, $email , $password, $user_id, $active)
	{
		$this->db->set('first_name',$first_name);
		$this->db->set('last_name',$last_name);
		$this->db->set('email',$email);
		if($password!='')
			$this->db->set('password',md5($password));
			
		$this->db->set('active',$active);
		
		if ($user_id==0){
	  		$this->db->insert('admin_users');
		} else {
	  		$this->db->where('user_id',$user_id);
			$this->db->update('admin_users');
		}
		
		return TRUE;
	}
}
?>