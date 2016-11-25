<?php
	$above = isset($tpl->above) ? true : false;
	$margins = $tpl->margin;
?>

<div class="container tpl tpl1 <?= !$above ? "side" : ""; ?>" style="margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px;" >
	<div class="row">

		<?php if (!$above): ?>
			<?php if (!empty($tpl->descr)): ?>
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-left descr-content pull-right">
					<?= $tpl->descr; ?>
				</div>
			<?php endif; ?>
			<?php if ($tpl->img != 0): ?>
				<div class="col-md-6 col-sm-6 col-lg-6 col-xs-12 text-right img-content pull-left">
					<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" style="max-width: <?= wp_get_attachment_image_src( $tpl->img, 'full' )[1]; ?>px;" />	
				</div>
			<?php endif; ?>
		<?php else: ?>
			<?php if (!empty($tpl->descr)): ?>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center descr-content">
					<?= $tpl->descr; ?>
				</div>
			<?php endif; ?>
			<?php if ($tpl->img != 0): ?>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center img-content">
					<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" style="max-width: <?= wp_get_attachment_image_src( $tpl->img, 'full' )[1]; ?>px;" />	
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>