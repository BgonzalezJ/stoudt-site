<?php
	if (!isset($k))
		$k = "%s";

	$descr = "";
	$img_id = 0;
	$img = "";
	$above = false;
	$margins = ["top" => 100, "bottom" => 100];

	if (isset($tpl)) {
		$descr = $tpl->descr;
		$img_id = $tpl->img;
		$img = wp_get_attachment_image_src( $img_id, 'full' )[0];
		$above = isset($tpl->above) ? true : false;
		$margins = isset($tpl->margin) ? $tpl->margin : ["top" => 100, "bottom" => 100];
	}

	
?>


<div class="tpl tpl1" data-i="<?= $k; ?>" id="%id">
	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl1" />
	
	<header>
		<h1>Single image + text</h1>
		<button class="button button-primary tpl-delete">Eliminar template</button>
	</header>

	<div class="margenes">
		<div>
			<label>
				<span>Margin Top:</span>
				<input type="number" value="<?= $margins["top"]; ?>" name="tpl[<?= $k; ?>][margin][top]" class="tpl-margin-top" /> px
			</label>
		</div>
		<div>
			<label>
				<span>Margin Bottom:</span>
				<input type="number" value="<?= $margins["bottom"]; ?>" name="tpl[<?= $k; ?>][margin][bottom]" class="tpl-margin-bottom" /> px
			</label>
		</div>	
	</div>

	<div class="checkbox-container">
		<label>
			<input type="checkbox" value="1" name="tpl[<?= $k; ?>][above]" <?= $above ? "checked" : ""; ?> class="tplabove" />
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
			<img src="<?= $img; ?>" class="attachment-img" />
		</div>
	</div>
</div>