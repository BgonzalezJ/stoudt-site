<?php
	add_action('admin_menu','stoudt_register_my_admin_panel');
	if (!function_exists('stoudt_register_my_admin_panel')){
		function stoudt_register_my_admin_panel(){
			add_menu_page('Upload Portfolio', 'Upload Portfolio', 'manage_options', 'upload-portfolio', 'stoudt_upload_portfolio');
		}
	}

	if (!function_exists('stoudt_upload_portfolio')){
		function stoudt_upload_portfolio(){
			require 'upload-portfolio.php';
		}
	}


	function stoudt_save_data_upload_portfolio() {
		if (isset($_POST["attachment_id"])) {
			$id = $_POST["attachment_id"];
			update_option("_portfolio_uploaded", $id);
		}
	}

	add_action( 'admin_enqueue_scripts', 'admin_script' );
	function admin_script() {
	    $dir = get_template_directory_uri() . '/functions/admin-panels/panels/portfolio';
	    wp_enqueue_media();
		wp_register_script( 'portfolio', $dir . '/script.js', array( 'jquery' ) );
		wp_localize_script( 'portfolio', 'wp_portfolio',
			array(
				'title' => __( 'Selecciona o sube tu portafolio', 'prfx-textdomain' ),
				'button' => __( 'PDF seleccionado', 'prfx-textdomain' )
			)
		);
		wp_enqueue_script( 'portfolio' );

	}

?>
