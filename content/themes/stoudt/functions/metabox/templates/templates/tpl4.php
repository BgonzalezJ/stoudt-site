<?php
	if (!isset($k))
		$k = "%s";

	$descr = "";
	$img_id = 0;
	$img = "";
	$color = "";
	$pattern_id = 0;
	$pattern = "";

	if (isset($tpl)) {
		$img_id = $tpl->img;
		$img = wp_get_attachment_image_src( $img_id, 'full' )[0];
		$color = $tpl->bgcolor;
		$pattern_id = $tpl->pattern;
		$pattern = wp_get_attachment_image_src( $pattern_id, 'full' )[0];
	}
?>

<div class="tpl tpl4" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl4" />

	<header>
		<h1>Image + BG color or pattern</h1>
		<button class="tpl-delete">Eliminar template</button>
	</header>

	<div>
		<input type="text" class="color-picker" value="<?= $color; ?>" name="tpl[<?= $k; ?>][bgcolor]" />

		<a href="#" class="tpl-pattern">Añadir patrón</a>
		<input type="hidden" name="tpl[<?= $k; ?>][pattern]" value="<?= $pattern_id; ?>" class="pattern-id" />
		<img src="<?= $pattern; ?>" class="pattern-img" />

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