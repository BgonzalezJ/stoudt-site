<?php
	$above = isset($tpl->above) ? true : false;
?>

<div class="container tpl tpl1">
	<div class="row">

		<?php if (!$above): ?>
			<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-right img-content">
				<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" />	
			</div>

			<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-left descr-content">
				<?= $tpl->descr; ?>
			</div>
		<?php else: ?>
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center">
				<?= $tpl->descr; ?>
			</div>
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center">
				<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" />	
			</div>
		<?php endif; ?>
	</div>
</div>