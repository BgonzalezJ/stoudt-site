<?php $margins = $tpl->margin; ?>
<div class="tpl tpl3" style="margin-top: <?= $margins["top"]; ?>px; margin-bottom: <?= $margins["bottom"]; ?>px;" >
	<img src="<?= wp_get_attachment_image_src( $tpl->img, 'full' )[0]; ?>" />
</div>