<?php
	if (!isset($k))
		$k = "%s";

	$descr = "";
	$img_id = 0;
	$img = "";

	if (isset($tpl)) {
		$descr = $tpl->descr;
		$img_id = $tpl->img;
		$img = wp_get_attachment_image_src( $img_id, 'full' )[0];
	}
?>

<div class="tpl tpl4" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl4" />

	<header>
		<h1>Template 4</h1>
		<button class="tpl-delete">Eliminar template</button>
	</header>

	<div>
		<textarea name="tpl[<?= $k; ?>][descr]" class="tpl-descr"><?= $descr; ?></textarea>
	</div>

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