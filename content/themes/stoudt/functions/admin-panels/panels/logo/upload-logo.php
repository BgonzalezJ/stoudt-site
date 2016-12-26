<?php
	stoudt_save_data_upload_logo();
	$id = get_option("_stoudt_logo", 0);
	$url = "";
	if ($id != 0) {
		$url = wp_get_attachment_url($id);
	}

?>
<div>
<form action="admin.php?page=upload-logo" method="post" id="logo-form">
	
	<div class="upload-form">
		<h1>Upload logo</h1>
		<a href="#" class="upload-logo">Upload your logo</a>
		<input type="hidden" name="attachment_id" class="logo-attachment-id" />
	</div>

	<div class="info-logo">
		<img src="<?= $url ?>" class="img_logo_stoudt" />
	</div>

	<?php submit_button(); ?>

	<div class="delete-box">
		<button class="delete-logo">Delete logo</button>
	</div>

</form>
</div>

<style>
	.upload-form {
		margin-bottom: 50px;
	}

	.info-logo > div {
		margin-bottom: 10px;
	}

	.info-logo > div label {
		font-weight: bold;
	}

	.delete-box {
		margin-top: 40px;
	}
</style>
