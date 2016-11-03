<?php
	if (!isset($k))
		$k = "%s";

	$img_id = 0;
	$img = "";
	$margins = ["top" => 100, "bottom" => 100];

	if (isset($tpl)) {
		$img_id = $tpl->img;
		$img = wp_get_attachment_image_src( $img_id, 'full' )[0];
		$margins = isset($tpl->margin) ? $tpl->margin : ["top" => 100, "bottom" => 100];
	}
?>

<div class="tpl tpl3" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl3" />

	<header>
		<h1>Fullsize image</h1>

		<button class="show">
			<div class="indicator"></div>
		</button>
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

	<div>
		<a href="#" class="tpl-add-image">Añadir imagen</a>
		<input type="hidden" name="tpl[<?= $k; ?>][img]" value="<?= $img_id; ?>" class="attachment-id" />
		<div class="tpl-img-box">
			<img src="<?= $img; ?>" class="attachment-img" />
		</div>
	</div>

	<div class="delete-tpl-container">
		<button class="button button-danger tpl-delete">Eliminar template</button>
	</div>
</div>