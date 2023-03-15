<?php if($content['tiny_enabled']==1) { ?>
	<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/tiny_mce.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/tiny_mce_new/init_tiny.js"></script>
<?php } ?>
<div id="page-body">
    <div class="container">
      <div class="row">
        <div class="span10 margin-auto">
          <div class="heading_cont clearfix">
            <h2><span>Admin Edit Content and Meta</span></h2>
          </div>
          
          <!-- end header cont -->
          
          <div class="row-fluid">
            <div class="span7 margin-auto">
            <form class="form-inline" action="<?php echo site_url('admin/content/save/'.$content_id)?>" method="post">
                <?php if($content['type']!='data') { ?>
				<div class="control-group">
					<label class="control-label" for="inputSubject">Page Name:</label>
					<div class="controls">
						<input type="text" readonly=""  name="name" id="name" class="input-block-level" value="<?php echo $content['name'];?>">
					</div>
				</div>
				<?php if(form_error('data')) echo '<p>'.form_error('data').'</p>';?>
				<?php if($content['type']!='meta') { ?>
				<div class="control-group">	
                  <label class="control-label" for="inputSubject">Message:</label>
                  <div class="controls">
                    <textarea name="data" class="input-block-level" ><?php echo $content['data'];?></textarea>
                  </div>
                </div>
				<?php } ?>
				<?php if(form_error('title')) echo '<p>'.form_error('title').'</p>'?>
				<div class="control-group">
					<label class="control-label" for="inputSubject">Title:</label>
					<div class="controls">
						<input type="text" name="title" id="title" class="input-block-level" value="<?php echo $content['title'];?>">
					</div>
				</div>
				<?php if(form_error('description')) echo '<p>'.form_error('description').'</p>'?>
				<div class="control-group">
					<label class="control-label" for="inputSubject">Description:</label>
					<div class="controls">
						<input type="text" name="description" id="description" class="input-block-level" value="<?php echo $content['description'];?>">
					</div>
				</div>
				<?php if(form_error('keywords')) echo '<p>'.form_error('keywords').'</p>'?>
				<div class="control-group">
					<label class="control-label" for="inputSubject">Keywords:</label>
					<div class="controls">
						<input type="text" name="keywords" id="keywords" class="input-block-level" value="<?php echo $content['keywords'];?>">
					</div>
				</div>
				<?php  }else { ?>
				<div class="control-group">
					<label class="control-label" for="inputSubject">Content:</label>
					<div class="controls">
						<textarea name="data" class="input-block-level"><?php echo $content['data'];?></textarea>
					</div>
				</div>
					<input name="title"  value="0" type="hidden" class="ad_inpt" />
					<input name="description"  value="0" type="hidden" class="ad_inpt" />
					<input name="keywords"  value="0" type="hidden" class="ad_inpt" />
				<?php } ?> 
				
				<div class="control-group text-center">
                  <div class="controls">
                    <button type="submit" class="btn">Save</button>
                    <button type="button" class="btn" onclick="location.href='<?=site_url('admin/content');?>'">Cancel</button>
                  </div>
                </div>
            </form>
         </div>
          </div>
          
          <!-- end form container --> 
        </div>
      </div>
    </div>
  </div>