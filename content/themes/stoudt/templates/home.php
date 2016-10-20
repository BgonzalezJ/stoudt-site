<?php
	/*
		Template name: Home
	*/
?>

<?php get_header(); ?>


<div class="home-cover cover">
	<div class="cover"></div>
	<div class="wave"></div>
</div>

<section class="projects">
	<div class="intro text-center">
		<ul class="skills">
			<li class="bullet">UI/UX DESIGN</li>
			<li class="bullet">WEBSITES</li>
			<li class="bullet">BRANDING</li>
			<li>ILLUSTRATION</li>
		</ul>
	</div>


	<div class="list-projects container">
		<?php 
			$args = [
				"post_type" => "post",
				"posts_per_page" => -1,
				"post_status" => "publish",
				"orderby" => "menu_order",
				"order" => "asc"
			];

			$projects = new WP_Query($args);
		?>
		<ul class="row">
			<?php if ($projects->have_posts()): ?>
			<?php while ($projects->have_posts()): $projects->the_post(); ?>
				<li class="col-md-3 col-sm-3 col-xs-6 col-lg-3">
					<a href="<?= get_permalink(); ?>">
						<div class="cover-project">
							<?php if (class_exists('MultiPostThumbnails')):
							    MultiPostThumbnails::the_post_thumbnail(
							        get_post_type(),
							        'secondary-image'
							    );
							endif; ?>

							<div class="info">
								<p>
									<span class="title"><?= get_the_title(); ?></span>
									<span class="subtitle"><?= get_the_subtitle(get_the_ID()); ?></span>
								</p>
							</div>

						</div>
					</a>
				</li>
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>

</section>

<?php get_footer(); ?>