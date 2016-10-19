<?php
	$list = isset($tpl->list) ? true : false;
?>

<div class="container tpl tpl2">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center descr-content">
			<?= $tpl->descr; ?>
		</div>

		<?php if (!$list): ?>
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
		<?php else: ?>
			<?php foreach ($tpl->img as $k => $img): ?>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 img-content">
					<img src="<?= wp_get_attachment_image_src( $img, 'full' )[0]; ?>" />	
				</div>
			<?php endforeach; ?>

		<?php endif; ?>
	</div>
</div>