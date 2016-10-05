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
		<ul>
			<li class="bullet">UI/UX DESIGN</li>
			<li class="bullet">WEBSITES</li>
			<li class="bullet">BRANDING</li>
			<li>ILLUSTRATION</li>
		</ul>
	</div>


	<div class="list-projects container">
		<?php 
			$projects = get_posts([
				'numberposts' => 20,
				'post_type' => 'post'
			]);
		?>
		<ul class="row">
			<?php $i = 0; while ($i < 10): $i++; ?>
			<?php foreach ($projects as $project): ?>
				<li class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
					<a href="<?= get_permalink($project->ID); ?>">
						<div class="cover-project">
							<img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id($project->ID), 'full' )[0] ?>" class="imagen">

							<div class="info">
								<p class="text-center">
									<span><?= $project->post_title ?></span>
								</p>
							</div>

						</div>
					</a>
				</li>
			<?php endforeach; ?>
			<?php endwhile; ?>
		</ul>
	</div>

</section>

<?php get_footer(); ?>