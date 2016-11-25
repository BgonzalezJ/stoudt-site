<?php
	$margins = $tpl->margin;
	$background = "transparent";
	if ($tpl->pattern > 0)
		$background = "url(" . wp_get_attachment_image_src( $tpl->pattern, 'full' )[0] . ")";
	else {
		if ($tpl->bgcolor != "")
			$background = $tpl->bgcolor;
	}

	$device = $tpl->device;
?>

<div class="tpl tpl6 tpl-bg-padding" style="margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px; background: <?= $background; ?>" >

	<div class="container">
		<div class="container-device">
			<div class="container-images">
				<ul class="images-list">
				<?php foreach ($tpl->img as $img_id): if ($img_id != 0): ?>
					<li class="image"><img src="<?= wp_get_attachment_image_src( $img_id, 'full' )[0]; ?>" /></li>
				<?php endif; endforeach; ?>
				</ul>
			</div>
			<img src="<?= get_template_directory_uri() ?>/img/devices/<?= $device ?>.png" class="device <?= $device ?>" />
		</div>

	</div>
</div>