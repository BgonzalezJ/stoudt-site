<?php
/**
 * Template for displaying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();
$tpls = StoudtTemplates::get_templates(get_the_ID());
$image_cover = get_field("_img_on_the_cover");
?>

<style>
	.single .cover .bg {
		background: url(<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>);
		background-attachment: fixed;
    	background-position: center 70px;
    	background-repeat: no-repeat;
    	background-size: 100%;
    	margin: auto;
	}

	<?php if (is_array($image_cover)): ?>
		.single .cover img {
			max-width: <?= $image_cover["width"];?>px;
		}
	<?php endif; ?>

	@media (max-width: 767px) {
		.single .cover .bg {
			background-position: center 50px;
		}
	}
</style>

<header class="cover">
	<div class="bg"></div>
	<?php if (is_array($image_cover)): ?>
		 <img src="<?= $image_cover["url"]; ?>" />
	<?php endif; ?>

</header>

<div class="template-project-container">
	<?php
		foreach ($tpls as $tpl): $tpl = (object) $tpl;
			switch ($tpl->tpl) {
				case 'tpl1': require 'project_templates/tpl1.php'; break;
				case 'tpl2': require 'project_templates/tpl2.php'; break;
				case 'tpl3': require 'project_templates/tpl3.php'; break;
				case 'tpl4': break;
				case 'tpl5': break;
			}
		endforeach;
	?>

	<?php if (!empty(get_field("_link_to_another_site"))): ?>
		<div class="text-center">
			<a href="<?= get_field("_link_to_another_site") ?>" class="link-to-another-site" target="_blank">
				<?= get_field("_text_button"); ?>
			</a>
		</div>
	<?php endif; ?>


	<?php 
		$args = [
			"post_type" => "post",
			"posts_per_page" => 4,
			"post_status" => "publish",
			"orderby" => "rand",
			"post__not_in" => [get_the_ID()]
		];

		$projects = new WP_Query($args);
	?>

	<div id="more-projects">
		<header>
			<h2 class="text-center">More Projects</h2>
		</header>

		<div class="wrapper">
			<ul class="row">
				<?php if ($projects->have_posts()): ?>
				<?php while ($projects->have_posts()): $projects->the_post(); ?>
				<li class="col-md-3 col-sm-3 col-xs-12 col-lg-3">
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
	</div>
</div>

<script src="<?= get_template_directory_uri() ?>/js/jquery.touchSwipe.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/projects.js"></script>


<?php get_footer(); ?> 
