<?php
	/*
		Template name: About
	*/

	$email = get_option("_contact_email", "christian.stoudt@gmail.com");
	$color = get_field("_bg_color_cover");
	$pattern = get_field("_bg_pattern");
	$txtColor = get_field("_text_color");

	$background = "transparent";
	if (is_array($pattern))
		$background = "url(" . $pattern["url"] . ")";
	else {
		if ($color != "")
			$background = $color;
	}

	if ($txtColor == "")
		$txtColor = "#fff";

?>

<?php get_header(); ?>

	<style>
		#about .text * {
			color: <?= $txtColor; ?>!important;
		}

		#about .text .btn.contact-email {
			border-color: <?= $txtColor; ?>!important;
		}
	</style>

	<script>
		jQuery(function($) {
	 		$("#about").find("img.img-side").load(function (){
	 			console.log('hola');
	 			var b = function () {
	 				var height = $("#about").find("img.img-side").height();
	 				$("#about").find(".text").height(height);
	 			}
	 			if ($(window).width() > 767)
	 				b();

	 			$(window).resize(function () {
	 				if ($(window).width() > 767)
	 					b();
	 				else
	 					$("#about").find(".text").removeAttr("style");
	 			});
	 		}).each(function(){
	 			if (this.complete) $(this).load();
	 		});
		});
	</script>



	
	<?php while (have_posts()): the_post(); ?>
		<div style="overflow: hidden; background: <?= $background ?>;">
			<div class="container" id="about">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text pull-right">
						<div>
							<h2><?= get_the_subtitle(get_the_ID()); ?></h2>
							<?php the_content(); ?>

							<p>Get in touch:</p>

							<a href="mailto:<?= $email ?>" class="btn contact-email"><?= $email ?></a>
						</div>

					</div>

					<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 img text-center pull-left">
						<img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>" class="img-side" style="max-width: <?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[1] ?>px; " />
					</div>

				</div>

			</div>
		</div>
	<?php endwhile; ?>

<?php get_footer(); ?>