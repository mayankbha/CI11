<?php
class Home extends CI_Controller 
{
	function __construct()
	{
		parent::__construct();
		
		// Your own constructor code
		
		$this->data = array();  
		$this->load->model('public_user_model');
		$this->data['sel'] = 'home';
	    $this->load->helper('email');
		$this->load->library('encrypt');	
		$config['protocol'] = 'sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['mailtype'] = 'text/html';
		$config['wordwrap'] = TRUE;
	    $this->email->initialize($config);
		
		if ($this->session->userdata('public_id')==TRUE) redirect('myaccount');
	}

	function index()
	{
		
		$val = $this->form_validation;
		
		//rules
		$val->set_rules('username', 'User name', 'trim|xss_clean|valid_email|required');
		$val->set_rules('password', 'Password', 'trim|xss_clean|required|callback_User_Authentication');
		
		if ($val->run())
		
		{
			
			//check user info
			
			redirect('myaccount');
			
		}
		else
		{
			$this->data['meta']  = getMetaContent('home');
		
			$this->data['content'] = $this->data['meta']['data'];
			
			$this->data['body']='front/home';
			
			$this->load->view('front/structure',$this->data);
		}
		
	}
	function User_Authentication($password) //function for from validation and admin authentication
	{

		$username=$this->input->post('username',true);

		$result = $this->public_user_model->CheckPublicAuthentication($username,$password); // model function for public user authentication

		if (count($result)==0)
		{

			$this->form_validation->set_message('User_Authentication', "This account doesn't exist in our database.");
			return FALSE;
		} else {
			$user_info=$this->public_user_model->get_user_by_id($result['user_id']);
			$this->session->set_userdata('public_id',$result['user_id']);
			$this->session->set_userdata('user_name',$username);
			$this->session->set_userdata('first_name',$user_info['first_name']);
			return TRUE;
		}

	}
	
	function forgotpassword()
	{ 
		$this->data['meta']  = getMetaContent('forgotpassword');
		
		$this->data['content'] = $this->data['meta']['data'];
		
		$this->data['body']='front/forgotpassword';
		
		$this->load->view('front/structure',$this->data);
	}
	
	function forgotpassword_confirmation()
	{ 
	    
		$emailinfo=$this->public_user_model->get_email_info();
		
		$headers = "MIME-Version: 1.0" . "\r\n";
	    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	    $headers .= 'From:'.$emailinfo->from. "\r\n";
		
		
		$this->data['meta']  = getMetaContent('forgotpassword');
		$confirmation = getMetaContent('forgotpassword_confirmation','data');
		$this->data['confirmation'] = $confirmation['data'];
		
		
		if($this->input->post('do_forgot_password')){
		
	        $to =$this->input->post('email_id');
	    
	       if(valid_email($to)){
					 
					            $password=$this->public_user_model->random_chars();
			                      
					           	$db['password']     =   md5($password);
					           	                        $this->public_user_model->update_user_pass($to,$db); 
								
								$content = str_replace('{PASSWORD}', $password, $emailinfo->content);
											
								$sub    =   $emailinfo->subject;
								$body="<html>
										<div style=background-color:#ffffff;margin-left:10px;width:400px;height:200px;padding:10px 0 0 20px;>
										<h4>".$content."</h4>
										<span>".base_url()."index.php</span>
										</div>
										</html>";
					
							   mail($to,$sub,$body,$headers);
							 
			                 }
	    }
		
		
		
		$this->data['body']='front/forgotpassword_confirmation';
		$this->load->view('front/structure',$this->data);
	}
	
	function username_validate ()
	{
		
		$username = $this->input->post('username');
		$this->form_validation->set_rules('username', 'User name', 'trim|xss_clean|valid_email|required');
		
		if ($this->form_validation->run() != FALSE)
		{
			$returnText = '';	
		}
		else{
			$returnText = 'The User name field must contain a valid email address.';
		}
		print_r($returnText);
	}
	function password_validate ()
	{
		
		$password = $this->input->post('password');
		$this->form_validation->set_rules('password', 'password', 'trim|xss_clean|required');
		
		if ($this->form_validation->run() != FALSE)
		{
			$returnText = '';	
		}
		else{
			$returnText = 'Please, write password';
		}
		print_r($returnText);
	}
	
	 function check_email(){
	
	 $email=$this->input->post('email');
	 
	 $rs=$this->public_user_model->check_email($email);
	 
	 if($rs!=0){
	   echo "email is not associated with user account";
	 }
	 
	 function logout ()
	 {
	 	$this->session->unset_userdata(array('public_id'=>''));

		$this->session->sess_destroy();

		redirect('index');
		
	 }
	
	}
	
	
}

?>