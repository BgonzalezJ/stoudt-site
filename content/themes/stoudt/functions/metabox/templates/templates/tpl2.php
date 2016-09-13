<?php
	if (!isset($k))
		$k = "%s";

	$descr = "";
	$img_ids = [];

	if (isset($tpl)) {
		$descr = $tpl->descr;
		$img_ids = $tpl->img;
	}
?>

<div class="tpl tpl2" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl2" />

	<header>
		<h1>Template 2</h1>
		<button class="tpl-delete">Eliminar template</button>
	</header>

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