<?php
	$background = "transparent";
	if ($tpl->pattern > 0)
		$background = "url(" . wp_get_attachment_image_src( $tpl->pattern, 'full' )[0] . ")";
	else {
		if ($tpl->bgcolor != "")
			$background = $tpl->bgcolor;
	}
	$margins = $tpl->margin;
?>

<div class="tpl tpl4" style="background: <?= $background; ?>; margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px;">
	<div class="container text-center">
		<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" style="max-width: <?= wp_get_attachment_image_src( $tpl->img, 'full' )[1]; ?>px;" />
	</div>
</div>