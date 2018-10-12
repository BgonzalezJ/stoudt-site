<?php
	/*
		Template name: Home
	*/
?>

<?php get_header(); ?>
<?php $categories = get_categories(); ?>

<script>window.home = true</script>

<style>
	.home-cover .img-center {
		max-width: <?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[1]; ?>px;
	}
</style>

<div class="home-cover cover">
	<img src="<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' )[0]; ?>" class="img-center" />
	<div class="wave"></div>
	<div class="protector"></div>
</div>

<section class="projects">
	<div class="intro text-center">
		<ul class="skills">
			<li class="bullet all-projects active">
				<a href="#" data-category="all-projects">All</a>
			</li>
			<?php foreach ($categories as $category): ?>
				<?php if ($category->slug != "uncategorized" && $category->slug != "sin-categoria"): ?>
					<li class="bullet <?= $category->slug ?>">
						<a href="#" data-category="<?= $category->slug ?>"><?= $category->name ?></a>
					</li>
				<?php endif; ?>
			<?php endforeach; ?>
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
				<?php
					$categories = get_the_category();
					$categories = array_map(function ($elem) {
						return $elem->slug;
					}, $categories);
				?>
				<li class="col-md-3 col-sm-3 col-lg-3 col-xs-12 project <?= implode(" ", $categories); ?> ">
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

</section>

<?php get_footer(); ?>