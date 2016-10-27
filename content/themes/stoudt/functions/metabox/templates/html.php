<?php
	wp_nonce_field( 'tpls', 'tpls_nonce' );
	$tpls = StoudtTemplates::get_templates(get_the_ID());
?>

<div>
	<select id="select-tpl">
		<option selected disabled>Selecciona template</option>
		<option value="tpl1.php">Single image + text</option>
		<option value="tpl2.php">Multiple images</option>
		<option value="tpl3.php">Fullsize image</option>
		<option value="tpl4.php">Image + BG color or pattern</option>
		<option value="tpl5.php">Video</option>
	</select>
	<button id="add-tpl" class="button button-primary">Añadir</button>
</div>

<div id="views-tpls">
	
	<?php foreach ($tpls as $k => $tpl): $tpl = (object) $tpl; ?>
		<?php
			if (isset($tpl->tpl))
				require get_template_directory() . '/functions/metabox/templates/templates/' . $tpl->tpl . '.php';
		?>
	<?php endforeach; ?>
</div>