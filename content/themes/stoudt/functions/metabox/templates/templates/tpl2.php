<?php
	if (!isset($k))
		$k = "%s";

	$descr = "";
	$img_ids = [];
	$list_images = 1;
	$wpadding = false;

	if (isset($tpl)) {
		$descr = $tpl->descr;
		$img_ids = $tpl->img;
		$list_images = $tpl->list;
		$wpadding = isset($tpl->wpadding) ? true : false;
	}
?>

<div class="tpl tpl2" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl2" />

	<header>
		<h1>Multiple images</h1>
		<button class="button button-primary tpl-delete">Eliminar template</button>
	</header>

	<div>
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
	</div>

	<div>
		<label>
			<input type="checkbox" value="1" name="tpl[<?= $k; ?>][wpadding]" <?= $wpadding ? "checked" : ""; ?> class="w-padding" />
			Without padding
		</label>
	</div>

	<div>
		<textarea name="tpl[<?= $k; ?>][descr]" class="tpl-descr"><?= $descr; ?></textarea>
	</div>

	<div class="images">
		<a href="#" class="tpl-add-image">Añadir imagen</a>

		<?php foreach ($img_ids as $img_id): ?>

			<?php if ($img_id != 0 ): ?>

			<input type="hidden" name="tpl[<?= $k; ?>][img][]" value="<?= $img_id; ?>" class="attachment-id" />
			<div class="tpl-img-box">
				<img src="<?= wp_get_attachment_image_src( $img_id, 'full' )[0];  ?>" />
				<div class="remove-img">
					<a href="#">Eliminar imagen</a>
				</div>
			</div>
			<?php endif; ?>
		<?php endforeach; ?>


		<input type="hidden" name="tpl[<?= $k; ?>][img][]" value="0" class="attachment-id" />
		<div class="tpl-img-box">
			<img src="" />
			<div class="remove-img">
				<a href="#">Eliminar imagen</a>
			</div>
		</div>
	</div>
</div>