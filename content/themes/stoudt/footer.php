<?php $categories = get_categories(); ?>
<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>

			</div><!--.site-content-->
			
			
			<footer id="site-footer" role="contentinfo">
				<div id="footer-row" class="row site-footer">

					<!-- <ul class="skills">
						<li class="bullet all-projects">
							<a href="#" data-category="all-projects">All</a>
						</li>
						<?php foreach ($categories as $category): ?>
							<?php if ($category->slug != "uncategorized" && $category->slug != "sin-categoria"): ?>
								<li class="bullet <?= $category->slug ?>">
									<a href="#" data-category="<?= $category->slug ?>"><?= $category->name ?></a>
								</li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul> -->

					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">

						<?php wp_nav_menu(array('theme_location' => 'rrss', 'container' => false, 'menu_class' => 'rrss', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?>


						<?php if (get_option("_portfolio_uploaded", 0) != 0): ?>
							<p class="text-center download-portfolio">
								<a href="<?= wp_get_attachment_url(get_option("_portfolio_uploaded", 0)); ?>" target="_blank">Download my portfolio</a>
							</p>
						<?php endif; ?>

						<?php $email = get_option("_contact_email", "christian.stoudt@gmail.com"); ?>

						<p class="text-center contact-email-container">
							<a href="mailto:<?= $email ?>" class="contact-email"><?= $email ?></a>
						</p>


						<p class="text-center developed-by">
							<span>Developed by Bastián González</span>
						</p>

					</div>
				</div>
			</footer>
		<!-- </div>.container page-container -->
		
		
		<!--wordpress footer-->
		<?php wp_footer(); ?> 

		<div class="collapse stoudt-navbar visible-xs">
			<a href="#" class="visible-xs close-stoudt-navbar">
				<img src="<?= get_template_directory_uri() ?>/img/x.png" />
			</a>

			<div class="pull-right menu">
				<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?> 

				<?php wp_nav_menu(array('theme_location' => 'rrss', 'container' => false, 'menu_class' => 'rrss', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?>
			</div>
		</div>
	</body>
</html>