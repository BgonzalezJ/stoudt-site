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
						<ul class="rrss">
							<li>
								<a href="#" target="_blank">
									<i class="fa fa-dribbble"></i>
								</a>
							</li>

							<li>
								<a href="http://chrisstoudt.tumblr.com/" target="_blank">
									<i class="fa fa-tumblr"></i>
								</a>
							</li>

							<li>
								<a href="https://www.linkedin.com/in/christian-stoudt-14591b33" target="_blank">
									<i class="fa fa-linkedin"></i>
								</a>
							</li>

							<li>
								<a href="https://www.instagram.com/chrisstoudt_sketchbook/" target="_blank">
									<i class="fa fa-instagram"></i>
								</a>
							</li>
						</ul>

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