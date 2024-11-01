<?php
	function sd_register_customizer($wp_customize) {
		// Adds Social Display Settings
		$wp_customize->add_setting('sd_logo_size', array(
			'default' => '2',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_back_size', array(
			'default' => '21',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_custom_color_fb', array(
			'default' => '#3B5998',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_custom_color_twitter', array(
			'default' => '#00ACED',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_custom_color_linkedin', array(
			'default' => '#007FB1',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_custom_color_google', array(
			'default' => '#DF4A32',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_custom_color_wp', array(
			'default' => '#21759B',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_custom_color_rss', array(
			'default' => '#FF8300',
			'transport' => 'refresh'
		));

		$wp_customize->add_setting('sd_custom_color_logo', array(
			'default' => '#FFFFFF',
			'transport' => 'refresh'
		));
		
		// Adds Social Display Customizer Section
		$wp_customize->add_section('sd_customizer_section', array(
			'title' => __('Social Display', 'social-display-translate'),
			'priority' => 200,
			'description' => 'Customize the Social Display Plugin'
		));

		// Adds Controls
		$wp_customize->add_control('sd_logo_size', array(
			'label' => 'Logo Size (em)',
			'section' => 'sd_customizer_section',
			'type' => 'number',
			'priority' => 1000
		));

		$wp_customize->add_control('sd_back_size', array(
			'label' => 'Background Size (%)',
			'section' => 'sd_customizer_section',
			'type' => 'number',
			'priority' => 1000
		));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sd_fb_color', array(
			'label' => __('Facebook Icon Color', 'social-display-translate'),
			'section' => 'sd_customizer_section',
			'settings' => 'sd_custom_color_fb'
		) ) );

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sd_twitter_color', array(
			'label' => __('Twitter Icon Color', 'social-display-translate'),
			'section' => 'sd_customizer_section',
			'settings' => 'sd_custom_color_twitter'
		) ) );

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sd_linkedin_color', array(
			'label' => __('LinkedIn Icon Color', 'social-display-translate'),
			'section' => 'sd_customizer_section',
			'settings' => 'sd_custom_color_linkedin'
		) ) );

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sd_google_color', array(
			'label' => __('Google+ Icon Color', 'social-display-translate'),
			'section' => 'sd_customizer_section',
			'settings' => 'sd_custom_color_google'
		) ) );

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sd_wp_color', array(
			'label' => __('WordPress Icon Color', 'social-display-translate'),
			'section' => 'sd_customizer_section',
			'settings' => 'sd_custom_color_wp'
		) ) );

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sd_rss_color', array(
			'label' => __('RSS Icon Color', 'social-display-translate'),
			'section' => 'sd_customizer_section',
			'settings' => 'sd_custom_color_rss'
		) ) );

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sd_logo_color', array(
			'label' => __('Logo Color', 'social-display-translate'),
			'section' => 'sd_customizer_section',
			'settings' => 'sd_custom_color_logo'
		) ) );
	}
	add_action('customize_register', 'sd_register_customizer');

	function sd_apply_customisation() { ?>
		<style type="text/css">
			li#fb_color {
				background-color:<?php echo get_theme_mod('sd_custom_color_fb', '#3B5998');?>;
			}

			li#twitter_color {
				background-color:<?php echo get_theme_mod('sd_custom_color_twitter', '#00ACED');?>;
			}

			li#linkedin_color {
				background-color:<?php echo get_theme_mod('sd_custom_color_linkedin', '#007FB1');?>;
			}
			li#google_color {
				background-color:<?php echo get_theme_mod('sd_custom_color_google', '#DF4A32');?>;
			}
			li#wp_color {
				background-color:<?php echo get_theme_mod('sd_custom_color_wp', '#21759B');?>;
			}
			li#rss_color {
				background-color:<?php echo get_theme_mod('sd_custom_color_rss', '#FF8300');?>;
			}

			.social_display li a {
				color: <?php echo get_theme_mod('sd_custom_color_logo', '#FFFFFF');?>
			}

			.social_display li {
				font-size: <?php echo get_theme_mod('sd_logo_size', '2');?>em !important;
				width: <?php echo get_theme_mod('sd_back_size', '21');?>% !important
			}
		</style>
	<?php }
	add_action('wp_head', 'sd_apply_customisation');
?>