<?php

	if (class_exists('MultiPostThumbnails')) {
	    new MultiPostThumbnails(
	        array(
	            'label' => 'Imagen en home',
	            'id' => 'secondary-image',
	            'post_type' => 'post'
	        )
	    );
	}


	require get_template_directory() . '/functions/metabox/templates/index.php';
	require get_template_directory() . '/functions/admin-panels/index.php';