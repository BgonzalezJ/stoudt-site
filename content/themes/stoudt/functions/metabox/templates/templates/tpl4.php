<?php
	if (!isset($k))
		$k = "%s";

	$descr = "";
	$img_id = 0;
	$img = "";
	$color = "";
	$pattern_id = 0;
	$pattern = $img_example;
	$margins = ["top" => 100, "bottom" => 100];

	if (isset($tpl)) {
		$img_id = $tpl->img;
		$img = wp_get_attachment_image_src( $img_id, 'full' )[0];
		$color = $tpl->bgcolor;
		$pattern_id = $tpl->pattern;
		$pattern = wp_get_attachment_image_src( $pattern_id, 'full' )[0];
		if (empty($pattern))
			$pattern = $img_example;
		$margins = isset($tpl->margin) ? $tpl->margin : ["top" => 100, "bottom" => 100];
	}
?>

<div class="tpl tpl4" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl4" />

	<header>
		<h1>Image + BG color or pattern</h1>
		<button class="button button-primary tpl-delete">Eliminar template</button>
	</header>

	<div class="margenes">
		<div>
			<label>
				<span>Margin Top:</span>
				<input type="number" value="<?= $margins["top"]; ?>" name="tpl[<?= $k; ?>][margin][top]" /> px
			</label>
		</div>
		<div>
			<label>
				<span>Margin Bottom:</span>
				<input type="number" value="<?= $margins["bottom"]; ?>" name="tpl[<?= $k; ?>][margin][bottom]" /> px
			</label>
		</div>	
	</div>

	<div class="color-container">
		
		<input type="text" class="color-picker" value="<?= $color; ?>" name="tpl[<?= $k; ?>][bgcolor]" />
		
		<div class="pattern-container">
			<a href="#" class="tpl-pattern">Añadir patrón</a>
			<div class="tpl-pattern-box <?= $pattern_id == 0 ? "new" : ""; ?>">
				<input type="hidden" name="tpl[<?= $k; ?>][pattern]" value="<?= $pattern_id; ?>" class="pattern-id" />
				<img src="<?= $pattern; ?>" class="pattern-img" />
				<div class="remove-img">
					<a href="#"><img src="<?= $remove_img; ?>" /></a>
				</div>
			</div>
		</div>
	</div>

	<div>
		<a href="#" class="tpl-add-image">Añadir imagen</a>
		<input type="hidden" name="tpl[<?= $k; ?>][img]" value="<?= $img_id; ?>" class="attachment-id" />
		<div class="tpl-img-box">
			<img src="<?= $img; ?>" class="attachment-img" />
		</div>
	</div>
</div>