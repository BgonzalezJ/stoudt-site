<?php
	wp_nonce_field( 'tpls', 'tpls_nonce' );
	$tpls = StoudtTemplates::get_templates(get_the_ID());
	$remove_img = get_template_directory_uri() . "/functions/metabox/templates/img/remove.png";
	$img_example = get_template_directory_uri() . "/img/img-example.png";

?>

<div id="select-tpl-container">
	<select id="select-tpl">
		<option selected disabled>Selecciona template</option>
		<option value="tpl1">Single image + text</option>
		<option value="tpl2">Multiple images</option>
		<option value="tpl3">Fullsize image</option>
		<option value="tpl4">Image + BG color or pattern</option>
		<option value="tpl5">Video</option>
		<!-- <option value="tpl6.php">Slider</option> -->
	</select>
	<button id="add-tpl" class="button button-primary">Añadir</button>
</div>

<div class="btn-close-tpls">
	<button id="close-tpls" class="button button-primary opened">Cerrar todo</button>
</div>

<div id="views-tpls">	
	<?php foreach ($tpls as $k => $tpl): $tpl = (object) $tpl; ?>
		<?php
			if (isset($tpl->tpl))
				require get_template_directory() . '/functions/metabox/templates/templates/' . $tpl->tpl . '.php';
		?>
	<?php endforeach; ?>
</div>

<?php 
	unset($k); // LIMPIAMOS ESTA VARIABLE PARA QUE NO AFECTE A LOS TEMPLATES ABAJO 
	unset($tpl); // LIMPIAMOS ESTA VARIABLE PARA QUE NO AFECTE A LOS TEMPLATES ABAJO 
?>

<div id="tpls-to-be-selected" style="display: none;">
	<?php
		for ($i = 1; $i <= 5;$i++) {
			require get_template_directory() . '/functions/metabox/templates/templates/tpl' . $i . '.php';
		}
	?>
</div>