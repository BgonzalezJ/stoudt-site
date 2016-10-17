<?php
	/*
		Template name: About
	*/
?>

<?php get_header(); ?>

	<div class="container" id="about">
		
		<div class="row">
			
			<div class="col-md-6 col-sm-6 col-lg-6 col-md-offset-6 col-sm-offset-6 col-lg-offset-6 col-xs-12 text-right text">
				<?= get_field("_right_side_text"); ?>
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-left text">
				<?= get_field("_left_side_text"); ?>
			</div>

		</div>

	</div>

<?php get_footer(); ?>