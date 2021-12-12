<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8">
		<title>COMPANY PROFILE</title>
		<script type="text/javascript">
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function (e) {
					$('#blah').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		</script>
		<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
	</head>
<body>
	<div class="container">
			<form class="form-horizontal" action="<?php if($company_profile_branch_id==0){ echo site_url(' company_profile/save'); } else { echo site_url('company_profile/update'); } ?>" method="post" enctype="multipart/form-data">
				<div class="panel panel-default">
					<div class="panel-heading"><?php echo $lbl_com_title; ?></div>
					<div class="panel-body">
						<div class="col-md-8">
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $lbl_com_name; ?>:<span class="star"> *</span></label>
									<input class="form-control form-custom text_input" type="text" name="txt_company_name" id="txt_company_name" value="<?php echo $company_profile_name ?>" required>
									<div class="border"></div>
									<input type="hidden" name="txt_company_branch_id" id="txt_company_branch_id" required value="<?php echo $company_profile_branch_id ?>">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $lbl_com_phone; ?>:</label>
									<input class="form-control form-custom text_input" type="text" name="txt_phone" id="txt_phone" value="<?php echo $company_profile_phone ?>" required>
									<div class="border"></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $lbl_com_email; ?>:</label>
									<input class="form-control form-custom" type="text" name="txt_email" id="txt_email"  value="<?php echo $company_profile_email ?>">
									<div class="border"></div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label><?php echo $lbl_com_address; ?>:</label>
									<input class="form-control form-custom" type="text"  name="txt_address" id="txt_address" value="<?php echo $company_profile_address?>">
									<div class="border"></div>
								</div>
							</div>
							<div class="col-sm-6 hidden">
								<div class="form-group">
									<label><?php echo $lbl_wifi; ?>:</label>
									<input class="form-control form-custom" type="text"  name="txt_wifi" id="txt_wifi" value="<?php echo $company_profile_wifi?>">
									<div class="border"></div>
								</div>
							</div>
							<div class="col-sm-6">
								
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-4">
							<input type="file" name="userfile" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" accept="image/*" onchange="readURL(this)"/>
							<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a photo&hellip;</span></label>
							<input type="hidden" id="txt_getfile" name="txt_getfile" value="<?php echo $company_profile_image ?>"/>
							<input type="hidden" id="txt_id" name="txt_id" value="<?php echo $company_profile_id ?>"/>
							<?php
							if($company_profile_image!=""){
							?>
							<img id="blah" src="<?php echo base_url('img/company/'.$company_profile_image) ?>" alt="your image" style="height: 155px;width: 100%;object-fit: contain;"/>
							<?php
							}else{
							?>
							<img id="blah" src="<?php echo base_url('img/no_image.jpg') ?>" alt="your image"  style="height: 155px;width: 100%;object-fit: contain;"/>
							<?php
							}
							?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-footer">
						<button type="submit" class="btn btn-sad pull-right"><?php if($company_profile_branch_id==0){ echo $btn_save; } else { echo $btn_update; } ?></button>
						<div class="clearfix"></div>
					</div>
					<!---------frm branch------->
		<!------->
       
		<!------->
		</div>
	    </form>
	</div>
</body>
</html>