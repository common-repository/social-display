<?php
	// Removes plugin data
	if( defined('WP_UNINSTALL_PLUGIN') ) {
		unregister_setting('social_display');
		delete_option('social_display');
	}

?>