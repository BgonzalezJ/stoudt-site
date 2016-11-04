<?php
	if (!isset($k)) {
		$k = "%s";
		$id = "%id";
	} else {
		$id = "tpl-" . $k;
	}

	$descr = "";
	$img_ids = [];
	$list_images = 1;
	$wpadding = false;
	$margins = ["top" => 100, "bottom" => 100];
	$fullsize = false;
	$custom_list = 3;

	if (isset($tpl)) {
		$descr = $tpl->descr;
		$img_ids = $tpl->img;
		$list_images = $tpl->list;
		$wpadding = isset($tpl->wpadding) ? true : false;
		$fullsize = isset($tpl->fullsize) ? true : false;
		$custom_list = isset($tpl->custom_list) ? $tpl->custom_list : 3;
		$margins = isset($tpl->margin) ? $tpl->margin : ["top" => 100, "bottom" => 100];
	}
?>

<div class="tpl tpl2 closed" data-i="<?= $k; ?>" id="<?= $id; ?>">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl2" />

	<header>
		<h1>Multiple images</h1>

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

	<div class="radio-container">

		<p>How to show it</p>

		<label>
			<input type="radio" value="1" name="tpl[<?= $k; ?>][list]" <?= $list_images == 1 ? "checked" : ""; ?> class="tplcheck" />
			2 small 1 large
		</label>

		<label>
			<input type="radio" value="2" name="tpl[<?= $k; ?>][list]" <?= $list_images == 2 ? "checked" : ""; ?> class="tplcheck" />
			List
		</label>

		<label>
			<input type="radio" value="3" name="tpl[<?= $k; ?>][list]" <?= $list_images == 3 ? "checked" : ""; ?> class="tplcheck" />
			3 per row
		</label>

		<label>
			<input type="radio" value="4" name="tpl[<?= $k; ?>][list]" <?= $list_images == 4 ? "checked" : ""; ?> class="tplcheck" />
			<input type="number" min="1" max="12" value="<?= $custom_list; ?>" name="tpl[<?= $k; ?>][custom_list]" /> per row
		</label>
	</div>

	<div class="checkbox-container">
		<label>
			<input type="checkbox" value="1" name="tpl[<?= $k; ?>][wpadding]" <?= $wpadding ? "checked" : ""; ?> class="w-padding" />
			Without padding
		</label>
	</div>

	<div class="checkbox-container">
		<label>
			<input type="checkbox" value="1" name="tpl[<?= $k; ?>][fullsize]" <?= $fullsize ? "checked" : ""; ?> class="fullsizes" />
			Fullsize
		</label>
	</div>

	<div>
		<textarea name="tpl[<?= $k; ?>][descr]" class="tpl-descr"><?= $descr; ?></textarea>
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