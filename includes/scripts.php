<?php

	// Adds the plugin stylesheet
	
	function sd_setup_styles() {
		wp_enqueue_style('sd-styles', plugin_dir_url(__FILE__) . 'css/style.css');
	}
	add_action('wp_enqueue_scripts', 'sd_setup_styles');
?>