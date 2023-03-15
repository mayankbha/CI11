<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="ymp_inner">
            <div class="heading_cont clearfix">
              <h2><span>Forgot Password</span></h2>
            </div>
            <!-- end header cont -->
			
            <div class="inner_container forgot-password">
           
              <?php echo  $content;?>
               </div>
                <div id="show_error" style="color:red"></div>
                <div id="errormsg" style="color:red"></div>
              <div class="span4 margin-auto">
                <form class="form-inline"   action="<?php echo site_url('home/forgotpassword_confirmation');  ?>"   method="post"  onsubmit="return validateEmail();" >
                  <div class="control-group">
                    <label class="control-label" for="inputEmail">Email Address:</label>
                    <div class="controls">
                      <input type="text" id="inputEmail" placeholder="" class="input-block-level"  name="email_id"  onblur="check_email();" >
                    </div>
                  </div>
                  <div class="control-group text-center">
                    <div class="controls">
                      <button type="submit" class="btn"  name="do_forgot_password"   value="do_forgot_password" >Submit</button>
                      <button type="reset" class="btn"   onclick="window.location='<?php  echo site_url('home'); ?>'">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
           
            <!-- end inner container --> 
            
          </div>
          <!--end ymp innder for left right padding--> 
          
        </div>
      </div>
    </div>
  </div>
  
<script>

function validateEmail() {
var err=true
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  if( !emailReg.test( $('#inputEmail').val() ) ||  $('#inputEmail').val()=="") {
    $('#show_error').html("Error:Please enter valid address");
	err=false;
  }else{
     $('#show_error').html(""); 
  } 
  return err;
}

function check_email(){

$.post('<?php  echo site_url('home/check_email/'); ?>',{'email':$('#inputEmail').val()},function(data){
 if(data!=''){
   document.getElementById('errormsg').innerHTML=data;
  }else{
   document.getElementById('errormsg').innerHTML="";
  }
  
});  
}
</script>