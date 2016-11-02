<?php
	if (!isset($k))
		$k = "%s";

	$video = "";
	$margins = ["top" => 100, "bottom" => 100];
	

	if (isset($tpl)) {
		$video = $tpl->video;
		$margins = isset($tpl->margin) ? $tpl->margin : ["top" => 100, "bottom" => 100];
	}
?>

<div class="tpl tpl5" data-i="<?= $k; ?>" id="%id">

	<input type="hidden" name="tpl[<?= $k; ?>][tpl]" class="tpl-type" value="tpl5" />

	<header>
		<h1>Video</h1>
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

	<div>
		<p>Inserta link de video (Facebook, Youtube, Vimeo)</p>
		<input type="text" name="tpl[<?= $k; ?>][video]" class="link-video" value="<?= $video; ?>" placeholder="Insertar link de video (Facebook, Youtube, Vimeo)" />
	</div>
</div>