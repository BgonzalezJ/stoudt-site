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

					<ul class="skills">
						<li class="bullet">UI/UX DESIGN</li>
						<li class="bullet">WEBSITES</li>
						<li class="bullet">BRANDING</li>
						<li>ILLUSTRATION</li>
					</ul>

					<div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">

						<?php wp_nav_menu(array('theme_location' => 'rrss', 'container' => false, 'menu_class' => 'rrss', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?>

						<p class="text-center download-portfolio">
							<a href="<?= wp_get_attachment_url(get_option("_portfolio_uploaded", 0)); ?>" target="_blank">Download my portfolio</a>
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
	</body>
</html>