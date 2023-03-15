<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="ymp_inner">
            <div class="heading_cont clearfix">
              <h2><span>My Account</span></h2>
            </div>
            <!-- end header cont -->
            
            <div class="row-fluid text-right table">
              <button class="btn btn-large"  onclick="window.location='<?php  echo site_url('myaccount/edit/'.$users->user_id) ?>'" >Edit My Account</button>
              &nbsp;
              <button class="btn btn-large" onclick="window.location='<?php  echo site_url('manager') ?>'">Creative Manager</button>
            </div>
            <div class="inner_container view-data">
              <div class="row-fluid">
                <div class="span3"><!--<img src="<?=base_url();?>images/my-account-img.jpg" alt="">--></div>
                <div class="span5 border-right">
                  <dl class="dl-horizontal">
                    <dt>First Name:</dt>
                    <dd><?php if($users) { echo $users->first_name; } ?></dd>
                    <dt>Last Name:</dt>
                    <dd><?php if($users) { echo $users->last_name; } ?></dd>
                    <dt>Email:</dt>
                    <dd><?php if($users) { echo $users->email; } ?></dd>
                    <dt>Phone:</dt>
                    <dd><?php if($users) { echo $users->phone; } ?></dd>
                    <dt>State:</dt>
                    <dd><?php if($users) { echo $users->state; } ?></dd>
                    <dt>Zip:</dt>
                    <dd><?php if($users) { echo $users->zip; } ?></dd>
                    <dt>Country:</dt>
                    <dd><?php if($users) { echo $users->city; }  ?></dd>
                  </dl>
                </div>
                <div class="span4">
                  <dl class="dl-horizontal">
                    <dt>Payment Method:</dt>
                    <dd>Credit Card</dd>
                    <dt>Credit Card:</dt>
                    <dd><?php if($users) { echo  substr_replace($users->card_number, '*************',0,13); } ?></dd>
                    <dt>Exp. Date:</dt>
                    <dd><?php if($users) {  echo $users->exp_date; } ?></dd>
                  </dl>
                </div>
              </div>
            </div>
            <!-- end inner container --> 
            
          </div>
          <!--end ymp innder for left right padding--> 
          
        </div>
      </div>
    </div>
  </div>