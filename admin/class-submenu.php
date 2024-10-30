<?php
/*************************************************************************
 _______ ______  _______ _____ __   _      _______ _______ __   _ _     _
 |_____| |     \ |  |  |   |   | \  |      |  |  | |______ | \  | |     |
 |     | |_____/ |  |  | __|__ |  \_|      |  |  | |______ |  \_| |_____|
 **************************************************************************/
class CKP_Submenu {

	private $CKP_submenu_page;

	
	 // Initializes all of the partial classes.

	public function __construct( $CKP_submenu_page ) {
		$this->CKP_submenu_page = $CKP_submenu_page;
	}

	 // Adds a submenu for this plugin to the 'Tools' menu.
	public function init() {
		 add_action( 'admin_menu', array( $this, 'add_options_page' ) );
	}


	 // Create the submenu item and calls on the Submenu Page object
	public function add_options_page() {

		add_options_page(
			'Cooking Key Admin Page',
			'Cooking Key',
			'manage_options',
			'ck-admin-page',
			array( $this->CKP_submenu_page, 'render' )
		);
	}
}

// ADD STYLE CSS TO RECPE KEYS
function CKP_admin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'ck-admin', $plugin_url . 'ck-admin-style.css' );
 
}
add_action( 'admin_enqueue_scripts', 'CKP_admin_css' );
