<?php
/**
 * Template for displaying single post (read full post page).
 * 
 * @package bootstrap-basic
 */

get_header();

$tpls = StoudtTemplates::get_templates(get_the_ID());

?> 

<header class="cover">
	<img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>" />
</header>

<?php foreach ($tpls as $tpl): $tpl = (object) $tpl; ?>

	<?php switch ($tpl->tpl) {
		case 'tpl1':
	?>
		<div class="container tpl tpl1">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-right img-content">
					<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" />	
				</div>

				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-left descr-content">
					<?= $tpl->descr; ?>
				</div>
			</div>
		</div>

	<?php
			break;

		case 'tpl2':
	?>
		<div class="container tpl tpl2">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center descr-content">
					<?= $tpl->descr; ?>
				</div>

				<?php foreach ($tpl->img as $k => $img): ?>
				<?php 
					$class = "col-md-6 col-sm-6 col-lg-6 col-xs-12 img-content";
					if (($k + 1) % 3 == 0)
						$class = "col-md-12 col-sm-12 col-lg-12 col-xs-12 img-content";
				?>
					<div class="<?= $class; ?>">
						<img src="<?= wp_get_attachment_image_src( $img, 'full' )[0]; ?>" />	
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	<?php
			break;

		case 'tpl3':
	?>
		<div class="tpl tpl3">
			<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" />
		</div>

	<?php
			break;

		case 'tpl4':
			break;

		case 'tpl5':
			break;
	} ?>

<?php endforeach; ?>

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
			<?php $i = 0; while ($i < 4): $i++; ?>
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
			<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>

<script src="<?= get_template_directory_uri() ?>/js/jquery.touchSwipe.min.js"></script>
<script src="<?= get_template_directory_uri() ?>/js/projects.js"></script>


<?php get_footer(); ?> 
