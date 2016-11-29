<?php
	add_action('admin_menu','stoudt_register_my_admin_panel_2');
	if (!function_exists('stoudt_register_my_admin_panel_2')){
		function stoudt_register_my_admin_panel_2(){
			add_menu_page('Contact Email', 'Contact Email', 'manage_options', 'contact-email', 'stoudt_contact_email');
		}
	}

	if (!function_exists('stoudt_contact_email')){
		function stoudt_contact_email(){
			require 'html.php';
		}
	}


	function stoudt_save_data_contact_email() {
		if (isset($_POST["contact_email"])) {
			$email = $_POST["contact_email"];
			update_option("_contact_email", $email);
		}
	}

?>
