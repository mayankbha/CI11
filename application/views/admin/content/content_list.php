<div id="page-body">

<div class="container">

<div class="row">

<div class="span12">

<div class="ymp_inner">

<div class="heading_cont clearfix">

<h2><span>Admin Content Controller</span></h2>

</div>	<!-- end header cont -->



<div class="tabular_cont">

<table>

  <tr>

    <th style=" min-width:145px; width:24%"><a href="<?=site_url('admin/content/index/name/'.$order_type);?>">Page Title</a></th>

    <th class="hidden-480" style="width:58%;"><a href="<?=site_url('admin/content/index/data/'.$order_type);?>">Content</a></th>

    <th class="text-center">Actions</th>

  </tr>
	<?php foreach ($contents as $content) : ?>
  <tr>

    <td><?php echo $content['name'];?></td>

    <td class="hidden-480"><?php if(trim(strip_tags($content['data']))!='') echo substr(strip_tags($content['data']),0, 60); else echo '&nbsp;';?></td>

    <td class="actions text-center"><a href="<?php echo site_url('admin/content/edit/'.$content['content_id'])?>"><img src="<?=base_url();?>images/admin/edit_icon.png" alt="Edit"></a></td>

  </tr>
 <?php endforeach; ?>
</table>

</div>	<!-- end tabular container -->

</div>
<!--end ymp innder for left right padding-->


</div>

</div>

</div>

</div>