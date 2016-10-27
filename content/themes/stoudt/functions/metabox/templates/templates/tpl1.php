<?php
	if (!isset($k))
		$k = "%s";

	$descr = "";
	$img_id = 0;
	$img = "";
	$above = false;

	if (isset($tpl)) {
		$descr = $tpl->descr;
		$img_id = $tpl->img;
		$img = wp_get_attachment_image_src( $img_id, 'full' )[0];
		$above = isset($tpl->above) ? true : false;
	}

	
?>


<div class="tpl tpl1" data-i="<?= $k; ?>" id="%id">
	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl1" />

	<header>
		<h1>Single image + text</h1>
		<button class="button button-primary tpl-delete">Eliminar template</button>
	</header>

	<div>
		<label>
			<input type="checkbox" value="1" name="tpl[<?= $k; ?>][above]" <?= $above ? "checked" : ""; ?> />
			Text above image
		</label>
	</div>


	<div>
		<textarea name="tpl[<?= $k; ?>][descr]" class="tpl-descr">
			<?= $descr; ?>
		</textarea>
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