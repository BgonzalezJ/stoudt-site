<?php
	if (!isset($k)) {
		$k = "%s";
		$id = "%id";
	} else {
		$id = "tpl-" . $k;
	}

	$img_ids = [];
	$margins = ["top" => 100, "bottom" => 100];
	$color = "";

	$pattern_id = 0;
	if (isset($img_example))
		$pattern = $img_example;
	$device = "macbook";

	if (isset($tpl)) {
		$img_ids = $tpl->img;
		$margins = isset($tpl->margin) ? $tpl->margin : ["top" => 100, "bottom" => 100];
		$color = $tpl->bgcolor;
		$pattern_id = isset($tpl->pattern) ? $tpl->pattern : 0;
		$pattern = wp_get_attachment_image_src( $pattern_id, 'full' )[0];
		if (empty($pattern))
			$pattern = $img_example;
	}
?>

<div class="tpl tpl6 multiple" data-i="<?= $k; ?>" id="<?= $id; ?>">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl6" />

	<header>
		<h1>Slider</h1>

		<button class="show">
			<div class="indicator"></div>
		</button>
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

	<div class="radio-container">

		<p>Device</p>

		<label>
			<input type="radio" value="macbook" name="tpl[<?= $k; ?>][device]" <?= $device == "macbook" ? "checked" : ""; ?> class="device" />
			Macbook
		</label>

		<label>
			<input type="radio" value="imac" name="tpl[<?= $k; ?>][device]" <?= $device == "imac" ? "checked" : ""; ?> class="device" />
			iMac
		</label>
	</div>

	<div class="images">
		<a href="#" class="tpl-add-image">Añadir imagen</a>

		<?php foreach ($img_ids as $img_id): ?>
			<?php if ($img_id != 0 ): ?>
			<div class="tpl-img-box">
				<input type="hidden" name="tpl[<?= $k; ?>][img][]" value="<?= $img_id; ?>" class="attachment-id" />
				<img src="<?= wp_get_attachment_image_src( $img_id, 'full' )[0];  ?>" class="attachment-img" />
				<div class="remove-img">
					<a href="#"><img src="<?= $remove_img; ?>" /></a>
				</div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="tpl-img-box new">
			<input type="hidden" name="tpl[<?= $k; ?>][img][]" value="0" class="attachment-id" />
			<img src="<?= $img_example; ?>" class="attachment-img" />
			<div class="remove-img">
				<a href="#"><img src="<?= $remove_img; ?>" /></a>
			</div>
		</div>
	</div>

	<div class="delete-tpl-container">
		<button class="button button-danger tpl-delete">Eliminar template</button>
	</div>
</div>