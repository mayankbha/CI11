<?php
class Ads extends CI_Controller 
{
	 public $view_data = array();
    private $upload_config;
	
	function __construct()
	{
		parent::__construct();
		
		// Your own constructor code
		
		$this->data = array();  
		
		$this->data['sel'] = 'Ads';
		$this->load->model(array('ads_model','template_model','banner_model'));
		$this->load->helper(array('form', 'url'));
		if ($this->session->userdata('public_id')==FALSE)
			redirect('home');
			
	}

	function index($id='')
	{
		$this->data['id']=$id;
		
		$val = $this->form_validation;
		
		//rules
		$val->set_rules('title', 'User name', 'trim|xss_clean|required');
		$val->set_rules('url', 'Password', 'trim|xss_clean|required');
		
		if ($val->run())
		
		{
			$this->data['template'] = $this->template_model->get_template_by_id($_POST['template_id']);
				
			$_POST['template_content']=$this->data['template']['template_content'];
				
			//save info & redirect
			if ((isset($_POST['id']))&&(!empty($_POST['id'])))
			{
				
				
			//	$this->ads_model->update_ad($_POST);
				
				redirect('ads/configured/'.$_POST['id']);
				
			}
			else
			{
				$new_id=$this->ads_model->insert_ad($_POST);
				
				redirect('ads/configured/'.$new_id);
			}
			
			
			
			
		}
		else
		{
			$this->data['meta']  = getMetaContent('ads','meta');
		
			
			if (isset($id)&&(!empty($id)))
			{
				$this->data['ad'] =  $this->ads_model->get_ad_by_id($id);
			}
			
			$this->data['templates'] =  $this->template_model->get_all_active();
			
			$this->data['banners'] =  $this->banner_model->get_all();
			
			$this->data['body']='front/ads/home';
			
			$this->load->view('front/structure',$this->data);
		}
		
		 
		
	}
	
	function configured($id)
	{
			
				
		$this->data['ad'] =  $this->ads_model->get_ad_by_id($id);
		
		$this->data['banners'] =  $this->banner_model->get_all();
		
		$this->data['edit']='edit';
		 
		$this->data['meta']  = getMetaContent('configured_template','meta');
		
		$this->data['body']='front/ads/configured_template';
		
		$this->load->view('front/structure',$this->data);
	}
	
	function preview($id='')
	{
		if (isset($id)&&(!empty($id)))
			{
				$this->data['ad'] =  $this->ads_model->get_ad_by_id($id);
				$this->data['banners'] =  $this->banner_model->get_all();
			}
		else
			{
				$id=$_POST['ads_id'];
			} 
		$this->data['meta']  = getMetaContent('ads_preview','meta');
		
		$this->data['body']='front/ads/preview';
		
		$this->load->view('front/structure',$this->data);
	}
	
	function output($id='')
	{ 
		$this->data['meta']  = getMetaContent('ads_output','meta');
		
		$this->data['ad'] =  $this->ads_model->get_ad_by_id($id);
		
		$this->data['banners'] =  $this->banner_model->get_all();
		
		$this->data['body']='front/ads/output';
		
		$this->load->view('front/structure',$this->data);
	}
	
	function confirmation()
	{ 
		$this->data['meta']  = getMetaContent('ads_confirmation');
		
		$this->data['content'] = $this->data['meta']['data'];
		
		$this->data['logedin'] = 'yes';
		
		$this->data['body']='front/ads/confirmation';
		
		$this->load->view('front/structure',$this->data);
	}
	
	function title_validate ()
	{
		
		$username = $this->input->post('title');
		$this->form_validation->set_rules('title', 'Creative Title', 'trim|xss_clean|required');
		
		if ($this->form_validation->run() != FALSE)
		{
			$returnText = '';	
		}
		else{
			$returnText = 'Please, write Creative Title.';
		}
		print_r($returnText);
	}
	
	function url_validate ()
	{
		
		$username = $this->input->post('url');
		$this->form_validation->set_rules('url', 'Default Click URL', 'trim|xss_clean|required');
		
		if ($this->form_validation->run() != FALSE)
		{
			$returnText = '';	
		}
		else{
			$returnText = 'Please, write Default Click URL.';
		}
		print_r($returnText);
	}
	
	function submit ()
	{
		//save ad data
		
		//redirect to configure
		redirect('ads/configured');
		
	}
	function img_upload ()
	{
		
		
	//	$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
		
		$config['upload_path'] = './js/tiny_mce_new/plugins/ajaxfilemanager/upload/';
		$config['allowed_types'] = 'gif|jpg|png|zip|avi';
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload())
		{
			print_r($this->upload->display_errors('<p>', '</p>'));die;
			redirect('ads/configured/'.$_POST ['ads_id']);
		}
		else
		{
			$this->ads_model->save_ad($_POST);
		 	redirect('ads/configured/'.$_POST ['ads_id']);
		}	
	
	}
	
	 public function do_upload()
    {
        $this->load->library('upload');

        $image_upload_folder = FCPATH . '/uploads';

        if (!file_exists($image_upload_folder)) {
            mkdir($image_upload_folder, DIR_WRITE_MODE, true);
        }

        $this->upload_config = array(
            'upload_path'   => $image_upload_folder,
            'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
            'max_size'      => 2048,
            'remove_space'  => TRUE,
            'encrypt_name'  => TRUE,
        );

        $this->upload->initialize($this->upload_config);

        if (!$this->upload->do_upload()) {
            $upload_error = $this->upload->display_errors();
            echo json_encode($upload_error);
        } else {
            $file_info = $this->upload->data();
            echo json_encode($file_info);
        }

    }
	
	
	function save ()
	{
		//print_r($_POST);die;
		
		
		$this->ads_model->save_ad($_POST);
		
		$returnText = 'Done.';
		print_r($returnText);
		
	}
}

?>