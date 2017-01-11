<?php
	add_action('admin_menu','stoudt_register_my_admin_panel_logo');
	if (!function_exists('stoudt_register_my_admin_panel_logo')){
		function stoudt_register_my_admin_panel_logo(){
			add_menu_page('Upload Logo', 'Upload Logo', 'manage_options', 'upload-logo', 'stoudt_upload_logo');
		}
	}

	if (!function_exists('stoudt_upload_logo')){
		function stoudt_upload_logo(){
			require 'upload-logo.php';
		}
	}


	function stoudt_save_data_upload_logo() {
		if (isset($_POST["attachment_id"]) 
			&& isset($_POST["attachment_hover_id"])) {
			$id = $_POST["attachment_id"];
			$hover_id = $_POST["attachment_hover_id"];
			update_option("_stoudt_logo", $id);
			update_option("_stoudt_logo_hover", $hover_id);
		}
	}

	add_action( 'admin_enqueue_scripts', 'admin_script_2' );
	function admin_script_2() {
	    $dir = get_template_directory_uri() . '/functions/admin-panels/panels/logo';
	    wp_enqueue_media();
		wp_register_script( 'logo', $dir . '/script.js', array( 'jquery' ) );
		wp_localize_script( 'logo', 'wp_logo',
			array(
				'title' => __( 'Selecciona o sube tu logo', 'prfx-textdomain' ),
				'button' => __( 'Imagen seleccionada', 'prfx-textdomain' )
			)
		);
		wp_enqueue_script( 'logo' );
	}


	function logo_or_name() {
		$id = get_option("_stoudt_logo", 0);
		$hover_id = get_option("_stoudt_logo_hover", 0);

		if ($id == 0 || $hover_id == 0)
			return "<div class='text'>" . get_bloginfo() . "</div>";
		else {
			$url = wp_get_attachment_url($id);
			$url_hover = wp_get_attachment_url($hover_id);
			$img = "<img src='".$url."' class='logo-stoudt' />";
			$img .= "<img src='".$url_hover."' class='logo-stoudt hover' />";
			return $img;			
		}
	}


?>
