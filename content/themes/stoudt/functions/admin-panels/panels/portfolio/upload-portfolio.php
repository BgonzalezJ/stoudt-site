<?php
	stoudt_save_data_upload_portfolio();
	$id = get_option("_portfolio_uploaded", 0);

?>
<div>
<form action="admin.php?page=upload-portfolio" method="post">
	<h1>Upload Portfolio</h1>


	<a href="#" class="upload-portfolio">Upload your portfolio</a>
	<input type="hidden" name="attachment_id" class="portfolio-attachment-id" />

	<div class="info">
		<div>
			<label>Filename</label>
			<span class="name"></span>
		</div>
		<div>
			<label>Filesize</label>
			<span class="size"></span>
		</div>
		<div>
			<label>Uploaded date</label>
			<span class="date"></span>
		</div>
	</div>

	<?php submit_button(); ?>
</form>
</div>
