<?php
/**
 * Template for displaying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();
$tpls = StoudtTemplates::get_templates(get_the_ID());
$image_cover = get_field("_img_on_the_cover");
$bg_color = get_field("_bg_color_cover");
?>

<style>
	.single .cover .bg-color {
		<?php if (get_post_thumbnail_id() == 0): ?>
			background: <?= $bg_color; ?>;
		<?php endif; ?>
	}

	<?php if (is_array($image_cover)): ?>
		.single .cover img.img-center-cover {
			max-width: <?= $image_cover["width"];?>px;
			max-height: <?= $image_cover["height"];?>px;
		}
	<?php endif; ?>
</style>

<header class="cover">
	<?php if (get_post_thumbnail_id() == 0): ?>
		<div class="bg-color"></div>
	<?php else: ?>
			<img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>" class="bg" />
	<?php endif; ?>
	<?php if (is_array($image_cover)): ?>
		 <img src="<?= $image_cover["url"]; ?>" data-width="<?= $image_cover["width"]; ?>" data-height="<?= $image_cover["height"]; ?>" class="img-center-cover" />
	<?php endif; ?>

	<div class="protector"></div>

</header>

<div class="template-project-container">
	<?php
		foreach ($tpls as $tpl): $tpl = (object) $tpl;
			switch ($tpl->tpl) {
				case 'tpl1': require 'project_templates/tpl1.php'; break;
				case 'tpl2': require 'project_templates/tpl2.php'; break;
				case 'tpl3': require 'project_templates/tpl3.php'; break;
				case 'tpl4': require 'project_templates/tpl4.php'; break;
				case 'tpl5': require 'project_templates/tpl5.php'; break;
				case 'tpl6': require 'project_templates/tpl6.php'; break;
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
							        'secondary-image',
							        get_the_ID(),
							        'post-thumbnail',
							        ["class" => "image"]
							    );

							    MultiPostThumbnails::the_post_thumbnail(
							        get_post_type(),
							        'secondary-image-hover',
							        get_the_ID(),
							        'post-thumbnail',
							        ["class" => "image-hover"]
							    );
							endif; ?>

							<div class="info">
								<p>
									<span class="title"><?= get_the_title(); ?></span>
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

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1629750073908784";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script src="<?= get_template_directory_uri() ?>/js/jquery.touchSwipe.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/projects.js"></script>


<?php get_footer(); ?> 
