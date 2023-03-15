<div id="wrap">
	<div id="main" class="container clear-top">
		<div id="wrapper">
			<div id="page-body" class="clearfix">
				<div class="container">
					<div class="row head_conrent">
						<h1 class="span12"><strong>Admin</strong> View Content and Meta Controller	</h1>
					</div>
					<div class="ymp_content form_div form-outbound">
						<form class="form-horizontal">
							<div class="control-group">
								<label class="control-label">Page Name:</label>
								<div class="controls view-text"><?php echo $content['name'];?></div>
							</div>
							<?php if($content['type']!='meta') { ?>
							<div class="control-group">
								<label class="control-label">Content:</label>
								<div class="controls view-text"><?php echo $content['data'];?></div>
							</div>
							<?php } ?>
							<?php if($content['type']!='data') { ?>	
							<div class="control-group">
								<label class="control-label">Title:</label>
								<div class="controls view-text"><?php echo $content['title'];?></div>
							</div>
							<div class="control-group">
								<label class="control-label">Description:</label>
								<div class="controls view-text"><?php echo $content['description'];?></div>
							</div>
							<div class="control-group">
								<label class="control-label">Keywords:</label>
								<div class="controls view-text"><?php echo $content['keywords'];?></div>
							</div>
							<?php } ?>
							<div class="sbmt_dv" style="margin-top: 30px;">
								<button type="button" class="btn btn-primary btn-large" onclick="location.href='<?=site_url('admin/content');?>';">Back</button>
								<button type="button" class="btn btn-primary btn-large" onclick="location.href='<?=site_url('admin/content/edit/'.$content['content_id']);?>'">Edit</button>
							</div>
						</form>
					</div>
				</div>
			</div>	<!-- end page body -->
		</div>	
	</div>
</div>