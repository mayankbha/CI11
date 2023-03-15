<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_email_template')){

	function get_email_template($name){

		$CI = &get_instance();

		return $CI->db->where('name',$name)->get('emails')->row_array();
	}
}

function get_tiny_url($url)  {  
	$ch = curl_init();  
	$timeout = 5;  
	curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url);  
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);  
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);  
	$data = curl_exec($ch);  
	curl_close($ch);  
	return $data;  
}

function thumb($string,$add='_thumb'){

	$ext=end(explode('.',$string));

	$file_name=substr(end(explode('/',$string)),0,-4);

	return $file_name.$add.'.'.$ext;
}

if ( ! function_exists('getMetaContent'))
{
	function getMetaContent($name,$type='')
	{

		$CI = &get_instance();

		$row = $CI->db->where('name', $name)->get('content')->row_array();

		if(empty($row))
		{
			$CI->db->set('name',$name);

			$CI->db->set('data',"<p>Content ::".$name.". Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent at erat et metus dapibus tincidunt at sit amet tortor. Donec hendrerit elit at arcu facilisis egestas. Maecenas tempus, libero eu interdum cursus, est turpis tristique sapien, ut porta mi magna vel velit. Duis in nulla at mauris sodales condimentum in id dui. Sed faucibus tellus id metus consequat tincidunt. Sed fringilla adipiscing nisi, ut scelerisque enim gravida eget. Curabitur quis ligula magna. Nunc risus lacus, fringilla eget dictum vitae, viverra in odio. Integer viverra lectus id odio malesuada porttitor. Praesent eu cursus lorem. Duis facilisis elit pellentesque erat ornare id rhoncus diam venenatis. Cras mattis augue ac dui sodales sodales.</p>");

			 $CI->db->set('title',"Skinected::".$name);

			  $CI->db->set('description',"Skinected:: Description :: ".$name);
		
			  $CI->db->set('keywords',"Skinected,keywords,".$name);

			if($type!=''){

				$CI->db->set('type',$type);

			}
			if($type=='meta')
				$CI->db->set('tiny_enabled',0);
			else
				$CI->db->set('tiny_enabled',1);	

			$CI->db->insert('content');

			$row = $CI->db->where('name', $name)->get('content')->row_array();
		}
		//$row['data'] = '<div class="tiny_mce_content_block">' . $row['data'] . '</div>';

        return $row;

	}

}

// end function getCommonRight

if ( ! function_exists('get_banners'))
{
	function get_banners($page_name, $banner_locations, $banner_id=0)
	{ 

		$CI = &get_instance();

		// $CI->output->enable_profiler(true);

		if (!is_array($banner_locations))
		{
			$banner_locations = array($banner_locations);
		}

		$banners = new stdClass();

		foreach ($banner_locations as $banner_location)
		{
			$banner = '';
			// if next
			// or try to get new

				$CI->db->where('location', $banner_location);

				$CI->db->where('name', $page_name);

				$CI->db->where('`clicks` <', '`max_clicks`', FALSE);
				
				$CI->db->where('`views` <', '`max_impressions`', FALSE);
				
				$CI->db->where('date_from <=', date('Y-m-d'));

				$CI->db->where('date_to >', date('Y-m-d'));

				$CI->db->where('is_active', TRUE);

			// we need to select the banner that wasn`t shown
				if($banner_id > 0)
					$CI->db->where('banner_id !=', $banner_id);	
			// we need to show the banners in the order found in the admin

			$query = $CI->db->order_by('banner_id')->limit(1)->get('banners');

			$banner_data=$query->row_array();

			if(sizeof($banner_data)==0){

				$CI->db->where('location', $banner_location);

				$CI->db->where('name', $page_name);

				$CI->db->where('`clicks` <', '`max_clicks`', FALSE);
				
				$CI->db->where('date_from <=', date('Y-m-d'));

				$CI->db->where('date_to >', date('Y-m-d'));

				$CI->db->where('is_active', TRUE);

				$query = $CI->db->order_by('banner_id')->limit(1)->get('banners');

				$banner_data=$query->row_array();

				
			}

			if ($query->num_rows() == 0)
			{

				// for dev mode
				if (TRUE)
				{
					$default_banners = array('footer_728x90');

					if (in_array($banner_location, $default_banners))
					{

						$CI->db->set('name', $page_name);

						$CI->db->set('location', $banner_location);

						$CI->db->set('image', 'footer_728x90.jpg');

						$CI->db->set('link', 'http://example.com');

						$CI->db->set('date_from', '2010-01-01');

						$CI->db->set('date_to', '2012-01-01');

						$CI->db->set('max_clicks', 1000000);

						$CI->db->set('max_impressions', 1000000);

						$CI->db->set('is_active', TRUE);

						$CI->db->insert('banners');

						$banner_id = $CI->db->insert_id();

						$banner = $CI->db->where('banner_id', $banner_id)->get('banners')->row();
					}
				}
			}else{
				$banner = $query->row();
			}

			if (empty($banner))
			{
				$banner_code = '';
			}else{
				// generate code
				if (empty($banner->code))
				{
					if($banner->location == "footer")
						$banner_code = '<a href="' . site_url('home/banner/'. $banner->banner_id) . '" target="_blank"><img src="' . base_url().'data/banners/' . $banner->image . '" alt="" border="0" /></a>';
					else
						$banner_code = '<a href="' . site_url('home/banner/'. $banner->banner_id) . '" target="_blank"><img src="' . base_url().'data/banners/' . $banner->image . '" alt="" border="0" width="245"  height="90"/></a>';	
				}else{
					$banner_code = $banner->code;
				}
				//$banner_code = '<div class="banner" id="banner_' . $banner->banner_id . '" >' . $banner_code . '</div>';
				// update views
				$CI->db->set('views', 'views + 1', FALSE)->where('banner_id', $banner->banner_id)->update('banners');
				//get next banners
				$next_bannera = get_next_banners($banner_location,$page_name,$banner->banner_id);

                if(!empty($next_bannera)):$next_banner = $next_bannera[0];
    				$next_banners = $CI->session->userdata('next_banners');

    				$next_banners[$page_name . '_' . $banner_location] = $next_banner->banner_id;

    				$CI->session->set_userdata('next_banners', $next_banners);
                endif;
			}
			$banners->$banner_location = $banner_code;
			if(isset($banner->banner_id))
				$banners->banner_id = $banner->banner_id;	
		}
		return $banners;
	}
}

function get_next_banners($banner_location,$page_name,$banner_id)
{
    $CI = &get_instance();

    if(!isset($_SESSION['visited_page']) || count($_SESSION['visited_page']) ==0):

        $_SESSION['visited_page'][] =array("banner_location"=>$banner_location,"page_name"=>$page_name,"banner_id"=>$banner_id);
		$query =  $CI->db->query("SELECT * FROM banners WHERE location='$banner_location' AND  name= '$page_name' AND clicks < max_clicks AND date_from <= '".date('Y-m-d')."' AND date_to > '".date('Y-m-d')."' AND is_active=1 AND banner_id <> $banner_id ORDER BY banner_id LIMIT 1");

        if ($query->num_rows() == 0):

			$query = $CI->db->query("SELECT * FROM banners WHERE location='$banner_location' AND name != '$page_name' AND clicks < max_clicks AND date_from <= '".date('Y-m-d')."' AND date_to > '".date('Y-m-d')."' AND is_active=1 ORDER BY banner_id LIMIT 1");

		endif;
    else:
    $not_in = '';
    $in = false;

        foreach($_SESSION['visited_page'] as $key=>$value):           

           $not_in .= $value['banner_id'].",";
        endforeach;

        if(substr($not_in, -1) == ","):

            $not_in = substr($not_in,0,(strlen($not_in)-1));

        endif;


       $query =  $CI->db->query("SELECT * FROM banners WHERE location='$banner_location' AND banner_id NOT IN ($not_in) AND  name= '$page_name' AND clicks < max_clicks AND date_from <= '".date('Y-m-d')."' AND date_to > '".date('Y-m-d')."' AND is_active=1 ORDER BY banner_id LIMIT 1");

       //echo "SELECT * FROM banners WHERE location='$banner_location' AND banner_id NOT IN ($not_in) AND  name= '$page_name' AND clicks < max_clicks AND date_from <= '".date('Y-m-d')."' AND date_to > '".date('Y-m-d')."' AND is_active=1 ORDER BY banner_id LIMIT 1";


        if ($query->num_rows() == 0):

        //echo "SELECT * FROM banners WHERE location='$banner_location' AND banner_id NOT IN ($not_in) AND clicks < max_clicks AND date_from <= '".date('Y-m-d')."' AND date_to > '".date('Y-m-d')."' AND is_active=1 ORDER BY banner_id LIMIT 1";

			$query = $CI->db->query("SELECT * FROM banners WHERE location='$banner_location' AND banner_id NOT IN ($not_in) AND clicks < max_clicks AND date_from <= '".date('Y-m-d')."' AND date_to > '".date('Y-m-d')."' AND is_active=1 ORDER BY banner_id LIMIT 1");

		endif;

        if ($query->num_rows() == 0):

            unset($_SESSION['visited_page']);

			$query = $CI->db->query("SELECT * FROM banners WHERE location='$banner_location' AND banner_id NOT IN ($not_in) AND clicks < max_clicks AND date_from <= '".date('Y-m-d')."' AND date_to > '".date('Y-m-d')."' AND is_active=1 ORDER BY banner_id LIMIT 1");

        endif;

         $x =  $query->result();

       if(isset($_SESSION['visited_page']) && count($_SESSION['visited_page']) > 0):

           foreach($_SESSION['visited_page'] as $key=>$value): 

               if($value['page_name'] == $x[0]->name && $value['banner_location'] == $x[0]->location && $value['banner_id'] == $x[0]->banner_id):

                $in = true;

               endif;        

            endforeach; 

            if(!$in): $_SESSION['visited_page'][] =array("banner_location"=>$x[0]->location,"page_name"=>$x[0]->name,"banner_id"=>$x[0]->banner_id);endif;

        endif; 
    endif;

    return $query->result();

}


if ( ! function_exists('date_diff'))
{
	function date_diff(DateTime $date1, DateTime $date2) {
        $diff = new DateInterval();

        if($date1 > $date2) {
		
            $tmp = $date1;

            $date1 = $date2;

            $date2 = $tmp;

            $diff->invert = true;
        }

        $diff->y = ((int) $date2->format('Y')) - ((int) $date1->format('Y'));

        $diff->m = ((int) $date2->format('n')) - ((int) $date1->format('n'));

        if($diff->m < 0) {
            $diff->y -= 1;

            $diff->m = $diff->m + 12;
        }

        $diff->d = ((int) $date2->format('j')) - ((int) $date1->format('j'));

        if($diff->d < 0) {
            $diff->m -= 1;

            $diff->d = $diff->d + ((int) $date1->format('t'));
        }

        $diff->h = ((int) $date2->format('G')) - ((int) $date1->format('G'));

        if($diff->h < 0) {
           $diff->d -= 1;

            $diff->h = $diff->h + 24;
        }

        $diff->i = ((int) $date2->format('i')) - ((int) $date1->format('i'));

        if($diff->i < 0) {

            $diff->h -= 1;

            $diff->i = $diff->i + 60;
        }
        $diff->s = ((int) $date2->format('s')) - ((int) $date1->format('s'));

        if($diff->s < 0) {
            $diff->i -= 1;

            $diff->s = $diff->s + 60;
        }
        return $diff;
    }
}

if ( ! function_exists('getDomain')){

	function getDomain()
	{
    	$CI =& get_instance();

    	return preg_replace("/^[\w]{2,6}:\/\/([\w\d\.\-]+).*$/","$1", $CI->config->slash_item('base_url'));	
	} 
}

if ( ! function_exists('getFaceBookFanCount')){

	function getFaceBookFanCount()
	{

		$facebook_page_id = '';

	    $url="https://graph.facebook.com/110009005739971";

    	$page = json_decode(file_get_contents($url));

		echo  file_get_contents($url);
	} 
}

if ( ! function_exists('getTwitterCount')){

	function getTwitterCount()
	{
    	$CI =& get_instance();

    	$CI->load->library('curl');  

		$res = getMetaContent('social_twitter_screen_name');

		$screen_name = $res['data'];

    	$curl_return = $CI->curl->simple_get('http://api.twitter.com/1/followers/ids.json?screen_name='.$screen_name);

    	$twitter_info = json_decode($curl_return);

    	$followers_count = count($twitter_info) ;

    	return $followers_count;
	} 
}

/* Sharing Button Section */
if ( ! function_exists('face_fanPage')){

	function face_fanPage()
	{
    	$res = getMetaContent('right_facebook');

		return $res['data'];
	} 
}

if ( ! function_exists('face_share')){

	function face_share($post_url)
	{
		$base_url= base_url();

$link = <<< link
    	<a style="float:right;padding-left:5px;" name="fb_share" type="box_count" share_url="{$base_url}post_detail/{$post_url}">Share</a>
link;
    	return $link;
	} 
}

if ( ! function_exists('twitter_share')){

	function twitter_share($post_url,$post_title)
	{
		$base_url= base_url();

$link = <<< link
 <a href="http://twitter.com/share" class="twitter-share-button"
			     data-url="{$base_url}post_detail/{$post_url}"
			     data-counturl="{$base_url}post_detail/{$post_url}"
                 data-via="me"
                 data-text="{$post_title}"
			     data-count="vertical">Tweet</a>

link;
    	return $link;

	} 
}

/**************************/
if ( ! function_exists('is_logged')){

	function is_logged()
	{
    	$CI =& get_instance();
		// we need to check the session
    	$member_id = $CI->session->userdata('member_id');

		if(is_numeric($member_id)){

			return true;
		}else{
			// we need to check for cookies

			$CI->load->helper('cookie');

			$cookie = get_cookie('member_id',true);

			if($cookie){

				$member_data = $CI->db->where('md5(member_id)',$cookie)->get('members')->row_array();

				$CI->session->set_userdata('member_id',$member_data['member_id']);

				$CI->session->set_userdata('first_name',$member_data['first_name']);

				$CI->session->set_userdata('last_name',$member_data['last_name']);

				return true;

			}
			return false;
		}
     	return false;

		} 
}

function isAjax() {
  return (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'));
}

function getAttribute($attrib, $tag){
  //get attribute from html tag
  $re = '/' . preg_quote($attrib) . '=([\'"])?((?(1).+?|[^\s>]+))(?(1)\1)/is';

  if (preg_match($re, $tag, $match)) {

	 return urldecode($match[2]);

  }
  return false;

}

function get_youtube_code($embed_code=''){

	if($embed_code!=''){

		$video_id = false;

		if ($embed_code!=''){
			$url = getAttribute('src',$embed_code);

			if($url){

				$video_id = end(explode('/',$url));

				}else{
					preg_match('#<object[^>]+>.+?http://www.youtube.com/v/([A-Za-z0-9\-_]+).+?</object>#s', $embed_code, $matches);

					if(isset($matches[1])){

					$video_id = $matches[1];
					}
				}
		}
	return $video_id;

	}
}