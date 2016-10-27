<?php
	if (!isset($k))
		$k = "%s";

	$video = "";

	if (isset($tpl)) {
		$video = $tpl->video;
	}
?>

<div class="tpl tpl5" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl5" />

	<header>
		<h1>Video</h1>
		<button class="button button-primary tpl-delete">Eliminar template</button>
	</header>

	<div>
		<p>Inserta link de video (Facebook, Youtube, Vimeo)</p>
		<input type="text" name="tpl[<?= $k; ?>][video]" class="link-video" value="<?= $video; ?>" placeholder="Insertar link de video (Facebook, Youtube, Vimeo)" />
	</div>
</div>