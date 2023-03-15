<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="ymp_inner">
            <div class="heading_cont clearfix">
              <h2><span>Edit My Account</span></h2>
            </div>
            <!-- end header cont -->
			<?PHP if(isset($content)) { ?>
             <!--confirmation area -->
            <div class="row-fluid">
              <div class="span7 margin-auto">
                <div class="confirmation-bar"> <a href="javascript:void(0);" class="popup-close"  onclick="$('.confirmation-bar').hide();" ><img src="<?=base_url();?>images/popup-close.png" alt=""></a> <span class="confirmation-check"><img src="<?=base_url();?>images/confirmation-check.png" alt=""></span>
                  <p class="text-center"><?=str_replace('<p>','',str_replace('</p>','',$content));?></p>
                </div>
              </div>
            </div>
            <!--/conformation area -->
			<?PHP } ?>
            <div class="inner_container">
              <div class="row-fluid edit-form">
                <form class="form-inline" action="<?php echo site_url('myaccount/edit/'.$users->user_id."/confirm"); ?>" method="post" onsubmit="return check();">
                  <div class="clearfix table"> 
                    <!--form left -->
                    <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="firstName">Firts Name:</label>
                        <div class="controls">
                          <input type="text" id="firstName" class="input-block-level" name="fname" value="<?php if($users) { echo $users->first_name; } ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="firstName">Last Name:</label>
                        <div class="controls">
                          <input type="text" id="lastName" class="input-block-level" name="lname" value="<?php if($users) { echo $users->last_name; } ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputEmail">Email:</label>
                        <div class="controls">
                          <input type="text" id="inputEmail" class="input-block-level" name="email" value="<?php if($users) { echo $users->email; } ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputPassword">Password:</label>
                        <div class="controls">
                          <input type="password" id="inputPassword" class="input-block-level" name="password" value="<?php if($users) { echo $users->password; } ?>">
                        </div>
                      </div>
                    </div>
                    <!--/form left --> 
                    
                    <!--form right -->
                    <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="inputPhone">Phone:</label>
                        <div class="controls">
                          <input type="text" id="inputPhone" class="input-block-level" name="phone" value="<?php if($users) { echo $users->phone; } ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputCity">City:</label>
                        <div class="controls">
                          <input type="text" id="inputCity" class="input-block-level" name="city" value="<?php if($users) { echo $users->city; } ?>">
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputState">State:</label>
                        <div class="controls">
                        	<input type="text" id="inputState" name="state" class="input-block-level" value="<?php if($users) { echo $users->state; } ?>">
                          	<!--<select id="inputState" class="input-block-level"  name="state"   >
                            	<option   value="IL">IL</option>
                          	</select>-->
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="inputZip">Zip:</label>
                        <div class="controls">
							<input type="text" id="inputZip" class="input-block-level" name="zip" value="<?php if($users) { echo $users->zip; } ?>">
                        </div>
                      </div>
                    </div>
                    <!--/form right --> 
                  </div>
                  <!--clearfix -->
                  
                  <div class="heading_cont clearfix">
                    <h2><span>Payment Details</span></h2>
                  </div>
                  <div class="row-fluid"> 
                    <!--form left -->
                    <div class="span6">
                      <div class="control-group">
                        <label class="control-label" for="inputCardNumber">Card Number:</label>
                        <div class="controls">
                          <input type="text" id="inputCardNumber" class="input-block-level"   name="card_no" value="<?php if($users) { echo $users->card_number; } ?>">
                        </div>
                      </div>
                    </div>
                    <!--/form left --> 
                    
                    <!--form right -->
                    <div class="span6">
                      <div class="row-fluid">
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="inputExpDate">Exp Date:</label>
                            <div class="controls">
                              <input type="text" id="inputExpDate" placeholder="09-09-2014" class="input-block-level"   name="exp_date"  value="<?php if($users) {  echo $users->exp_date; } ?>">
                            </div>
                          </div>
                        </div>
                        <!--/ -->
                        
                        <div class="span6">
                          <div class="control-group">
                            <label class="control-label" for="inputCVV">CVV:</label>
                            <div class="controls">
                              <input type="text" id="inputCVV" placeholder="456" class="input-block-level"  name="cvv"   value="<?php if($users) { echo $users->cvv; } ?>">
                            </div>
                          </div>
                        </div>
                        
                        <!--/ --> 
                        
                      </div>
                    </div>
                  </div>
                  <div class="control-group text-center">
                    <div class="controls">
                      <button type="submit" class="btn"  name="do_edit_user"  value="do_edit_user" >Save</button>
                      &nbsp;
                      <button type="reset" class="btn"  onclick="window.location='<?php  echo site_url('myaccount'); ?>'" >Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- end inner container --> 
            
          </div>
          <!--end ymp innder for left right padding--> 
          
        </div>
      </div>
    </div>
  </div>
  
  
 <script>
 
 function check(){ 
 
			 var err=true;
			 
			  $("input,select").each(function(){
				 if($(this).val()=='') {
					$(this).css('border','1px solid red');
					err = false;	
				 }else{
					$(this).css('border','1px solid green');
				 }
			});
			return err;
}
  
  </script>