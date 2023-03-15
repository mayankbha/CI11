<div id="page_body">
<div class="heading_cont">

<h1 class="left">View User Details</h1>

<div class="clear"></div>

</div>

<div class="site_contents">

<table width="632" border="0" cellspacing="0" cellpadding="0" class="add_cont">
  <tr>

   <td width="160" class="strong">First Name:</td>

    <td><?php echo isset($user['first_name'])? $user['first_name'] : '';?></td>

  </tr>

  <tr>

    <td class="strong">Last Name:</td>

    <td><?php echo isset($user['last_name']) ? $user['last_name'] : '';?></td>

  </tr>

  <tr>

    <td class="strong">Email Address:</td>

    <td class="strong"><?php echo isset($user['email'])? $user['email'] : '';?></td>

  </tr>

  <tr>

    <td class="strong">Password:</td>

    <td>********</td>

  </tr>

 

  <tr>

    <td></td>
    
 <td  class="clear">
    <a href="<?=site_url('admin/users/edit/'.$user_id);?>" class="btn_link right">Edit</a><a href="<?=site_url('admin/users');?>" class="btn_link right" style="margin-right:5px;">Cancel</a>
</td>

  </tr>

</table>


</div>	<!-- end tabular container here -->
