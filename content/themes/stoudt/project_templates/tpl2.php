<?php
	$list = $tpl->list;
	$wpadding = isset($tpl->wpadding) ? true : false;
	$fullsize = isset($tpl->fullsize) ? true : false;
	$margins = $tpl->margin;
?>

<div class="<?= !$fullsize ? "container" : "fullsize"; ?> tpl tpl2" style="margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px;" >
	<div class="row">
		<?php if (!empty($tpl->descr)): ?>
			<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 text-center descr-content">
				<?= $tpl->descr; ?>
			</div>
		<?php endif; ?>

		<?php switch ($list) {
		 	case 1: ?>
			<?php foreach ($tpl->img as $k => $img): ?>
			<?php
				if ($img != 0):
				$class = "col-md-6 col-sm-6 col-lg-6 col-xs-12 img-content";
				if (($k + 1) % 3 == 0)
					$class = "col-md-12 col-sm-12 col-lg-12 col-xs-12 img-content";

				if ($wpadding)
					$class .= " without-padding";
			?>
				<div class="<?= $class; ?>">
					<img src="<?= wp_get_attachment_image_src( $img, 'full' )[0]; ?>" />	
				</div>
			<?php endif; ?>
			<?php endforeach; break;?>
		<?php case 2: ?>
			<?php foreach ($tpl->img as $k => $img): ?>
				<?php if ($img != 0): ?>
				<div class="col-md-12 col-sm-12 col-lg-12 col-xs-12 img-content <?= $wpadding ? "without-padding" : ""; ?>">
					<img src="<?= wp_get_attachment_image_src( $img, 'full' )[0]; ?>" />	
				</div>
				<?php endif; ?>
			<?php endforeach; break; ?>

		<?php case 3: ?>
			<?php foreach ($tpl->img as $k => $img): ?>
				<?php if ($img != 0): ?>
				<div class="col-md-4 col-sm-4 col-lg-4 col-xs-12 img-content <?= $wpadding ? "without-padding" : ""; ?>">
					<img src="<?= wp_get_attachment_image_src( $img, 'full' )[0]; ?>" />	
				</div>
				<?php endif; ?>
			<?php endforeach; break; ?>
		<?php case 4: ?>
			<?php 
				if ($tpl->custom_list >= 1 && $tpl->custom_list <= 12)
					$column = 12 / $tpl->custom_list;
				else
					$column = 12 / 3;
			?>
			<?php foreach ($tpl->img as $k => $img): ?>
				<?php if ($img != 0): ?>
				<div class="col-md-<?= $column; ?> col-sm-<?= $column; ?> col-lg-<?= $column; ?> col-xs-12 img-content <?= $wpadding ? "without-padding" : ""; ?>">
					<img src="<?= wp_get_attachment_image_src( $img, 'full' )[0]; ?>" />	
				</div>
				<?php endif; ?>
			<?php endforeach; break; ?>
		<?php } ?>
	</div>
</div>