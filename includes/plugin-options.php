<?php
	// Sets up plugin options
	function sd_register_plugin_page() {
		add_options_page(
			// Adds plugin page to dashboard
			'Social Display Options', // Title
			__('Social Display', 'social-display-translate'), // Menu Text
			'manage_options', // Roles
			'social-display-options', // Slug
			'sd_render_plugin_page' // Callback
		);
	}
	add_action('admin_menu', 'sd_register_plugin_page');

	function sd_render_plugin_page() { ?>
		<!--Adds HTML for plugin page-->
		<div id="wrap">
			<!-- Checks if settings saved successfully -->
			<h1>Social Display Options</h1>
			<?php screen_icon(); ?>
			<form method="post" action="options.php">
				<?php settings_fields('social-display-links'); ?>
				<?php do_settings_sections('social-display-options'); ?>
				<?php submit_button(); ?>
			</form>
		</div>
<?php }
	function sd_register_options() {
	// Registers settings, fields and sections
	// Settings for Social Display Links
		register_setting(
			// Facebook link
			'social-display-links', // Group (ONLY USE ONE GROUP NAME)
			'social_display' // Name
		);
		add_settings_section(
			'social-links', // ID
			__('Basic Setup', 'social-display-translate'), // Title
			'sd_render_social_section', // Callback
			'social-display-options' // Page Slug
		);
		add_settings_section(
			'social-visibility', // ID
			__('Visibility Setup', 'social-display-translate'), // Title
			'sd_render_social_visibility', // Callback
			'social-display-options' // Page Slug
		);
		add_settings_section(
			'social-customize', // ID
			__('Further Customization', 'social-display-translate'), // Title
			'sd_render_social_customize', // Callback
			'social-display-options' // Page Slug
		);
		add_settings_field(
			'sd_facebook', // ID
			__('Facebook Link', 'social-display-translate'), // Title
			'sd_render_fb', // Callback
			'social-display-options', // Page Slug
			'social-links' // Section ID
		);
		add_settings_field(
			'sd_twitter', // ID
			__('Twitter Link', 'social-display-translate'), // Title
			'sd_render_twitter', // Callback
			'social-display-options', // Page Slug
			'social-links' // Section ID
		);
		add_settings_field(
			'sd_linkedin', // ID
			__('LinkedIn Link', 'social-display-translate'), // Title
			'sd_render_linkedin', // Callback
			'social-display-options', // Page Slug
			'social-links' // Section ID
		);
		add_settings_field(
			'sd_google', // ID
			__('Google+ Link', 'social-display-translate'), // Title
			'sd_render_google', // Callback
			'social-display-options', // Page Slug
			'social-links' // Section ID
		);
		add_settings_field(
			'sd_wordpress_profile', // ID
			__('WordPress Link', 'social-display-translate'), // Title
			'sd_render_wp_profile', // Callback
			'social-display-options', // Page Slug
			'social-links' // Section ID
		);
		add_settings_field(
			'sd_rss', // ID
			__('RSS Feed Link', 'social-display-translate'), // Title
			'sd_render_rss_link', // Callback
			'social-display-options', // Page Slug
			'social-links' // Section ID
		);
		add_settings_field(
			'sd_facebook_visible', // ID
			__('Show Facebook?', 'social-display-translate'), // Title
			'sd_render_facebook_visible', // Callback
			'social-display-options', // Page Slug
			'social-visibility' // Section ID
		);
		add_settings_field(
			'sd_twitter_visible', // ID
			__('Show Twitter?', 'social-display-translate'), // Title
			'sd_render_twitter_visible', // Callback
			'social-display-options', // Page Slug
			'social-visibility' // Section ID
		);
		add_settings_field(
			'sd_linkedin_visible', // ID
			__('Show LinkedIn?', 'social-display-translate'), // Title
			'sd_render_linkedin_visible', // Callback
			'social-display-options', // Page Slug
			'social-visibility' // Section ID
		);
		add_settings_field(
			'sd_google_visible', // ID
			__('Show Google+?', 'social-display-translate'), // Title
			'sd_render_google_visible', // Callback
			'social-display-options', // Page Slug
			'social-visibility' // Section ID
		);
		add_settings_field(
			'sd_wp_profile_visible', // ID
			__('Show WordPress Profile?', 'social-display-translate'), // Title
			'sd_render_wp_profile_visible', // Callback
			'social-display-options', // Page Slug
			'social-visibility' // Section ID
		);
		add_settings_field(
			'sd_rss_visible', // ID
			__('Show RSS Link?', 'social-display-translate'), // Title
			'sd_render_rss_visible', // Callback
			'social-display-options', // Page Slug
			'social-visibility' // Section ID
		);
		add_settings_field(
			'sd_show_images', // ID
			__('Use Logos?', 'social-display-translate'), // Title
			'sd_render_show_images', // Callback
			'social-display-options', // Page Slug
			'social-customize' // Section ID
		);
	}
	add_action('admin_init', 'sd_register_options');	

	function sd_render_social_section() {
		// Section  Callback 
		_e('<p>Configure your social media links.</p>', 'social-display-translate');
	}

	function sd_render_social_visibility() {
		// Section Callback 
		_e('<p>Choose what social media is displayed.</p>', 'social-display-translate');
	}

	function sd_render_social_customize() {
		// Section Callback 
		_e('<p>Personalise your social media. Some settings can be adjusted further in the <a href="customize.php">Customizer</a> if activated.</p>', 'social-display-translate');
	}
 
	function sd_render_fb() {
		// Facebook Field Callback
		$options = get_option('social_display');
	?>
		<input type="text" name="social_display[facebook_link]" value="<?php if(isset($options['facebook_link'])) {echo esc_url($options["facebook_link"]);}?>">
		<span class="description">Link to your Facebook Profile</span>
<?php } 
	function sd_render_twitter() {
		// Twitter Field Callback
		$options = get_option('social_display');
	?>
		<input type="text" name="social_display[twitter_link]" value="<?php if(isset($options['twitter_link'])) {echo esc_url($options['twitter_link']);}?>">
		<span class="description">Link to your Twitter Profile</span>
<?php } 
	function sd_render_linkedin() {
		// LinkedIn Field Callback
		$options = get_option('social_display');
	?>
		<input type="text" name="social_display[linkedin_link]" value="<?php if(isset($options['linkedin_link'])) {echo esc_url($options['linkedin_link']);}?>">
		<span class="description">Link to your LinkedIn Profile</span>
<?php }
	function sd_render_google() {
		// Google Field Callback
		$options = get_option('social_display')
	?>
		<input type="text" name="social_display[google_link]" value="<?php if(isset($options['google_link'])) {echo esc_url($options['google_link']);}?>">
		<span class="description">Link to your Google+ Profile</span>
<?php }
	function sd_render_wp_profile() {
		// WordPress Profile Field Callback
		$options = get_option('social_display');
	?>
		<input type="text" name="social_display[wp_profile_link]" value="<?php if(isset($options['wp_profile_link'])) {echo esc_url($options['wp_profile_link']);}?>">
		<span class="description">Link to your WordPress Profile</span>
<?php }
	function sd_render_rss_link() {
		// WordPress Profile Field Callback
		$options = get_option('social_display');
	?>
		<input type="text" name="social_display[rss_link]" value="<?php if(isset($options['rss_link'])) {echo esc_url($options['rss_link']);}?>">
		<span class="description">Link to your RSS Feed</span>
<?php }
	function sd_render_facebook_visible() {
		// Render Facebook Visible Callback
		$options = get_option('social_display');
		?>
		<input type="checkbox" name="social_display[facebook_visible]" value="1" <?php if(isset($options['facebook_visible'])) {checked(1, $options['facebook_visible']);}?> />
		<span class="description">Show Facebook</span>
<?php }
	function sd_render_twitter_visible() {
		// Render Twitter Visible Callback
		$options = get_option('social_display');
		?>
		<input type="checkbox" name="social_display[twitter_visible]" value="1" <?php if(isset($options['twitter_visible'])) {checked(1, $options['twitter_visible']);}?> />
		<span class="description">Show Twitter</span>
<?php }
	function sd_render_linkedin_visible() {
		// Render LinkedIn Visible Callback
		$options = get_option('social_display');
		?>
		<input type="checkbox" name="social_display[linkedin_visible]" value="1" <?php if(isset($options['linkedin_visible'])) {checked(1, $options['linkedin_visible']);}?>
		<span class="description">Show LinkedIn</span>
<?php }
	function sd_render_google_visible() {
		// Render Google+ Visible Callback
		$options = get_option('social_display');
		?>
		<input type="checkbox" name="social_display[google_visible]" value="1" <?php if(isset($options['google_visible'])) {checked(1, $options['google_visible']);}?>
		<span class="description">Show Google+</span>
<?php }	
	function sd_render_wp_profile_visible() {
		// Render WordPress Profile Visible Callback
		$options = get_option('social_display');
		?>
		<input type="checkbox" name="social_display[wp_profile_visible]" value="1" <?php if(isset($options['wp_profile_visible'])) {checked(1, $options['wp_profile_visible']);}?>
		<span class="description">Show WordPress Profile</span>
<?php }
	function sd_render_rss_visible() {
		// Render RSS Visible Callback
		$options = get_option('social_display');
		?>
		<input type="checkbox" name="social_display[rss_visible]" value="1" <?php if(isset($options['rss_visible'])) {checked(1, $options['rss_visible']);}?>
		<span class="description">Show RSS Feed</span>
<?php }
	function sd_render_show_images() {
		// Show Images Callback
		$options = get_option('social_display');
	?>
		<input type="checkbox" name="social_display[show_images]" value="1" <?php if(isset($options['show_images'])) {checked(1, $options['show_images']);}?>
		<span class="description">Enables the social media icons</span>
<?php }
	function translate_plugin_options() {
		// Calls translation files
		load_plugin_textdomain('social-display-translate', false, dirname(plugin_basename(__FILE__)) . '/lang');
	}
	add_action('after_theme_setup', 'translate_plugin_options');
?>