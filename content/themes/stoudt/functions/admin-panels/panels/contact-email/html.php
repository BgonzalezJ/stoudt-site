<?php
	stoudt_save_data_contact_email();
	$email = get_option("_contact_email", "christian.stoudt@gmail.com");

?>
<div>
	<form action="admin.php?page=contact-email" method="post" id="portfolio-form">
		
		<div class="upload-form" style="max-width: 300px;">
			<h1>Contact Email</h1>
			<input type="text" value="<?= $email ?>" name="contact_email" style="width: 100%; padding: 5px 10px; border-radius: 5px;" />
		</div>


		<?php submit_button(); ?>

	</form>
</div>
