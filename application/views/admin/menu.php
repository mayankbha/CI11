<div class="navbar">
    <div class="navbar-inner">
      <div class="container">
        <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="dropdown <?PHP if(isset($sel) && ($sel=='content' || $sel=='email')) echo ' active';?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">CONTENT CONTROLS</a>
              <ul class="dropdown-menu">
               <li class="<?PHP if(isset($sel) && $sel=='content') echo ' active';?>"><a href="<?php  echo site_url('admin/content');?>">Page Content and META</a></li>
                <li class="<?PHP if(isset($sel) && $sel=='email') echo ' active';?>"><a href="<?php  echo site_url('admin/email');?>">Outbound Email</a></li>
              </ul>
            </li>
            <li class="dropdown <?PHP if(isset($sel) && ($sel=='users' || $sel=='contacts')) echo ' active';?>"><a href="#" class="dropdown-toggle" data-toggle="dropdown">USER ADMINISTRATION</a>
              <ul class="dropdown-menu">
               	<li class="<?PHP if(isset($sel) &&  $sel=='users') echo ' active';?>"><a href="<?php  echo site_url('admin/users'); ?>">Admin Users</a></li>
                <li class="<?PHP if(isset($sel) &&  $sel=='public_users') echo ' active';?>"><a href="<?php  echo site_url('admin/public_users'); ?>">Public Users</a></li>
                <li class="<?PHP if(isset($sel)  &&  $sel=='contacts') echo ' active';?>"><a href="<?php  echo site_url('admin/contacts'); ?>">Contacts</a></li>
              </ul>
            </li>
            <li class="<?PHP if(isset($sel)  &&  $sel=='template') echo ' active';?>"><a href="<?php  echo site_url('admin/template'); ?>" >TEMPLATE</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>