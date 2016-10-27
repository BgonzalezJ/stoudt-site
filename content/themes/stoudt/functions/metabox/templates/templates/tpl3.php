<?php
	if (!isset($k))
		$k = "%s";

	$img_id = 0;
	$img = "";

	if (isset($tpl)) {
		$img_id = $tpl->img;
		$img = wp_get_attachment_image_src( $img_id, 'full' )[0];
	}
?>

<div class="tpl tpl3" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl3" />

	<header>
		<h1>Fullsize image</h1>
		<button class="button button-primary tpl-delete">Eliminar template</button>
	</header>

	<div>
		<a href="#" class="tpl-add-image">Añadir imagen</a>
		<input type="hidden" name="tpl[<?= $k; ?>][img]" value="<?= $img_id; ?>" class="attachment-id" />
		<div class="tpl-img-box">
			<img src="<?= $img; ?>" />
			<div class="remove-img">
				<a href="#">Eliminar imagen</a>
			</div>
		</div>
	</div>
</div>