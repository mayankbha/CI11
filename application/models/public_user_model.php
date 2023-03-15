<?php

class Public_User_Model extends CI_Model {

    var $public_users = "public_users";
    var $emails = "emails";

    function __construct() {
        parent::__construct();
    }


   function check_email($email){
	 
	 $this->db->where('email',$email);
	 $res=$this->db->get($this->public_users);
	 if($res->num_rows()>0){
	  return 0;
	 }else{
	  return 1;
	 }
	
	}

    function update($db, $id) {

        $this->db->where('user_id', $id);
        $this->db->update($this->public_users, $db);
    }

    function get_user_info($id = 0) {

        $this->db->where('user_id', $id);
        $result = $this->db->get($this->public_users);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    function get_email_info($id = 1) {

        $this->db->where('email_id', $id);
        $result = $this->db->get($this->emails);
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }

    public function update_user_pass($email, $db) {

        $this->db->where('email', $email);
        $this->db->update($this->public_users, $db);
        return $email;
    }

    function random_chars($l = 8, $s = 1, $a = 1, $n = 1) {
        $string = '';
        $chars = array();
        if ($s)
            $chars = array_merge($chars, array(
                33, 35, 36, 37, 38, 40, 41, 42, 43, 44, 45,
                46, 47, 58, 59, 60, 61, 62, 63, 64, 91, 93,
                94, 95, 123, 124, 125, 126
            ));
        if ($a)
            $chars = array_merge($chars, array(
                65, 66, 67, 68, 69, 70, 71, 72, 73, 74,
                75, 76, 77, 78, 79, 80, 81, 82, 83, 84,
                85, 86, 87, 88, 89, 90,
                97, 98, 99, 100, 101, 102, 103, 104, 105, 106,
                107, 108, 109, 110, 111, 112, 113, 114, 115, 116,
                117, 118, 119, 120, 121, 122
            ));
        if ($n)
            $chars = array_merge($chars, array(
                48, 49, 50, 51, 52, 53, 54, 55, 56, 57
            ));
        for ($i = 0; $i < $l; $i++) {
            shuffle($chars);
            $string.=chr(reset($chars));
        }
        return $string;
    }
    


   function del_user($id){
		if(is_numeric($id)){
			return $this->db->where('user_id',$id)->delete('public_users');
		}
	}

    function get_users($fields = '', $order_type = 'asc') {
        if ($fields != '')
            $this->db->order_by($fields, $order_type);

        return $this->db->get($this->public_users)->result_array();
    }
    
    public function export_user($fields = '', $order_type = 'asc') {
        if ($fields != '')
            $this->db->order_by($fields, $order_type);
        $this->db->select('first_name, last_name, company_name, business_type, phone, email, city, state, zip');
        $query = $this->db->get($this->public_users);
        
        $this->load->dbutil();
        return $this->dbutil->csv_from_result($query); 
    }
	

	function get_user_by_id($id){
		if(is_numeric($id)){
			return $this->db->where('user_id',$id)->get('public_users')->row_array();
		}
	}
	
	function SaveAdminUser($first_name, $last_name, $email , $password, $user_id,$company_name,$business_type,$phone_number)
	{
		$this->db->set('first_name',$first_name);
		$this->db->set('last_name',$last_name);
		$this->db->set('email',$email);
		$this->db->set('company_name',$company_name);
		$this->db->set('business_type',$business_type);
		$this->db->set('phone',$phone_number);
		if($password!='')
			$this->db->set('password',md5($password));
			
		
		if ($user_id==0){
	  		$this->db->insert('public_users');
		} else {
	  		$this->db->where('user_id',$user_id);
			$this->db->update('public_users');
		}
		
		return TRUE;
	}
	
	function CheckAdminUser($username, $user_id=0)
	{
		return $this->db->where(array('email'=>$username, 'user_id <>'=>$user_id))->from('public_users')->get()->row_array();
	}
	

	function CheckPublicAuthentication($email, $password)
	{
		return $this->db->where(array('email'=>$email,'password'=>md5($password),'active'=>0))->from('public_users')->get()->row_array();
	}

}

?>