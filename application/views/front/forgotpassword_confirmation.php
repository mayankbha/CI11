<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="ymp_inner">
            <div class="heading_cont clearfix">
              <h2><span>Forgot Password</span></h2>
            </div>
            <!-- end header cont --> 
            
            <!--confirmation area -->
            <div class="row-fluid">
              <div class="span7 margin-auto">
                <div class="confirmation-bar"> <a href="#" class="popup-close"><img src="<?=base_url();?>images/popup-close.png" alt=""></a> <span class="confirmation-check" style="top:-11px;"><img src="<?=base_url();?>images/confirmation-check.png" alt=""></span>
                  <p class="text-center"><?=str_replace('<p>','',str_replace('</p>','',$confirmation));?></p>
                </div>
              </div>
            </div>
            <!--/conformation area -->
            
            <div class="inner_container forgot-password">
              <div class="login_box row-fluid">
                <form>
                  <p>
                    <input type="text" class="input-block-level" value="User Name">
                    <span><img alt=" " src="<?=base_url();?>images/profile_icon.png" style="margin-top:5px;"></span><img src="<?=base_url();?>images/input-checkMark.png" alt="" class="pull-right check-mark" style="top:-6px;"></p>
                  <p>
                    <input type="text" class="input-block-level" value="Password">
                    <span><img alt=" " src="<?=base_url();?>images/lock_icon.png" style="margin-top:5px;"></span><img src="<?=base_url();?>images/input-checkMark.png" alt="" class="pull-right check-mark" style="top:-2px;"></p>
                  <p class="text-center">
                    <button class="btn" type="submit">Submit</button>
                    &nbsp;
                    <button type="reset" class="btn">Cancel</button>
                  </p>
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