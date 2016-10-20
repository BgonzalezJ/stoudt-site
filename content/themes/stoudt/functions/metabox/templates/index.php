<?php

	add_action( 'add_meta_boxes', array('StoudtTemplates', 'add_metaboxes') );
	add_action( 'admin_enqueue_scripts', array('StoudtTemplates', 'add_scripts') );
	add_action( 'save_post', array( 'StoudtTemplates', 'save' ) );

	class StoudtTemplates { //StoudtTemplatePilots ? xD
		public static function add_metaboxes() {
			add_meta_box(
				'metabox',
				'Project View',
				array('StoudtTemplates', 'metabox'),
				'post',
				'normal',
				'high'
			);
		}

		public static function metabox($post) {
			require 'html.php';
		}

		public static function add_scripts() {
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_media();
			wp_register_script( 'tpls', get_template_directory_uri() . '/functions/metabox/templates/js/tpls.js', array( 'jquery' ) );

			wp_localize_script('tpls', 'wp_dir', [
				'dir' => get_template_directory_uri() . '/functions/metabox/templates/templates/'
			]);

			wp_localize_script( 'tpls', 'wp_imgs',
				array(
					'title' => __( 'Selecciona o sube una Imagen', 'prfx-textdomain' ),
					'button' => __( 'Usa esta imagen', 'prfx-textdomain' ),
					'img_example' => get_template_directory_uri() . "/img/img-example.png"
				)
			);
			wp_enqueue_script( 'tpls' );
			wp_register_style( 'tpls_css', get_template_directory_uri() . '/functions/metabox/templates/css/tpls.css');
			wp_enqueue_style( 'tpls_css' );
		}


		public static function save($post_id){

			if (!isset($_POST['tpls_nonce']))
				return $post_id;

			$nonce = $_POST['tpls_nonce'];

			// Verify that the nonce is valid.
			if ( ! wp_verify_nonce( $nonce, 'tpls' ) )
				return $post_id;

			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
				return $post_id;

			// Check the user's permissions.
			if ( 'page' == $_POST['post_type'] ) {
				if ( ! current_user_can( 'edit_page', $post_id ) )
					return $post_id;
			} else {
				if ( ! current_user_can( 'edit_post', $post_id ) )
					return $post_id;
			}

			$tpls = json_encode($_POST["tpl"]);
			update_post_meta($post_id, "_tpls", $tpls);
		}


		public function get_templates($post_id) {
			$tpls = get_post_meta($post_id, "_tpls", true);

			if (!empty($tpls))
				$tpls = json_decode(stripslashes($tpls), true);
			else
				$tpls = [];

			if (is_null($tpls))
				$tpls = [];

			return $tpls;
		}


	}