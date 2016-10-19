<?php
	stoudt_save_data_upload_portfolio();
	$id = get_option("_portfolio_uploaded", 0);
	$url = "#";
	$name = "";
	if ($id != 0) {
		$url = wp_get_attachment_url($id);
		$name = basename(get_attached_file($id));
	}

?>
<div>
<form action="admin.php?page=upload-portfolio" method="post" id="portfolio-form">
	
	<div class="upload-form">
		<h1>Upload Portfolio</h1>
		<a href="#" class="upload-portfolio">Upload your portfolio</a>
		<input type="hidden" name="attachment_id" class="portfolio-attachment-id" />
	</div>

	<div class="info-portfolio">
		<div>
			<label>Filename</label>
			<span class="name"><?= $name; ?></span>
		</div>
		<div>
			<label>Link</label>
			<a href="<?= $url; ?>" class="link" target="_blank">See portfolio</a>
		</div>
	</div>

	<?php submit_button(); ?>

	<div class="delete-box">
		<button class="delete-portfolio">Delete Portfolio</button>
	</div>

</form>
</div>

<style>
	.upload-form {
		margin-bottom: 50px;
	}

	.info-portfolio > div {
		margin-bottom: 10px;
	}

	.info-portfolio > div label {
		font-weight: bold;
	}

	.delete-box {
		margin-top: 40px;
	}
</style>
