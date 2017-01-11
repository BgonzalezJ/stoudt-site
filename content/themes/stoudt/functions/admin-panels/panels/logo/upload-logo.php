<?php
	stoudt_save_data_upload_logo();
	$id = get_option("_stoudt_logo", 0);
	$hover_id = get_option("_stoudt_logo_hover", 0);
	$url = "";
	$url_hover = "";
	if ($id != 0) {
		$url = wp_get_attachment_url($id);
	}

	if ($hover_id != 0) {
		$url_hover = wp_get_attachment_url($hover_id);
	}



?>
<div>
<form action="admin.php?page=upload-logo" method="post" id="logo-form">
	<div style="width: 100%; overflow: hidden; clear: both;">
		<div class="upload-form">
			<h1>Upload logo</h1>
			<a href="#" class="upload-logo">Upload your logo</a>
			<input type="hidden"  value="<?= $id ?>" name="attachment_id" class="logo-attachment-id" />

			<div class="info-logo">
				<img src="<?= $url ?>" class="img_logo_stoudt" />
			</div>
		</div>

		<div class="upload-form">
			<h1>Upload hover logo</h1>
			<a href="#" class="upload-logo-hover">Upload your hover logo</a>
			<input type="hidden"  value="<?= $hover_id ?>" name="attachment_hover_id" class="logo-attachment-hover-id" />

			<div class="info-logo">
				<img src="<?= $url_hover ?>" class="img_logo_stoudt_hover" />
			</div>
		</div>
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
		float: left;
		width: 50%;
	}

	.upload-form img {
		max-width: 300px;
		margin-top: 20px;
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

	.delete-logo {
		cursor: pointer;
	}
</style>
