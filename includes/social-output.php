<?php

	// Displays the social links in the widget from the plugin options 

	class Social_Display_Widget extends WP_Widget {
		public function __construct() {
			// Initializes the widget
			parent::__construct(
				'social_display_widget', // Widget ID
				__('Social Display', 'social-display-translate'), // Widget Title
				array('description' => __("Displays given social links from the plugin options", 'social-display-translate') )
			);
			load_plugin_textdomain('social-display-translate', false, dirname(plugin_basename(__FILE__)) . '/lang'); // Loads translation files for widget
		}

		public function form($instance) {
			// Outputs yhe widget options in the backend
			// $instance refers to widget stored values in the database

			$defaults = array(
				'title' => __('Social Feeds', 'social-display-translate')
			);

			// Merges arguments as default values if none stored
			$instance = wp_parse_args((array) $instance, $defaults);

			?>
				<!-- Widget fields HTML -->
				<p>
					<label for="<?php echo $this->get_field_id('title');?>">Title:</label>
					<input type"" id"<?php echo $this->get_field_id('title');?>" name="<?php echo $this->get_field_name('title');?>" class="widefat" value="<?php echo esc_attr($instance['title']);?>">
				</p>
			<?php
		}

		public function update($new_instance, $old_instance) {
			// Processes widget options for saving
			$instance = $old_instance;

			// Title
			$instance['title'] = strip_tags($new_instance['title']);

			return $instance;

		}

		public function widget($args, $instance) {
			// Displays the widget on the frontend
			extract($args); // Gets values to use
			$title = apply_filters('widget-title', $instance['title']);

			echo $before_widget; // Defined in functions of themes

			if ($title) {
				echo $before_title . $title . $after_title;
			}

			$options = get_option('social_display');
			if ( isset($options['show_images']) ){
				$linkcontent = array(
					'facebook' => array(
							'id' => 'fb_color',
							'url' => esc_url($options['facebook_link']),
							'content' => '<span class="fa fa-facebook" alt="Facebook Logo"></span>',
							'visible' => (isset($options['facebook_visible'])) ? $options['facebook_visible'] : false
					),
					'twitter' => array(
							'id' => 'twitter_color',
							'url' => esc_url($options['twitter_link']),
							'content' => '<span class="fa fa-twitter" alt="Twitter Logo"></span>',
							'visible' => (isset($options['twitter_visible'])) ? $options['twitter_visible'] : false
					),
					'linkedin' => array(
						'id' => 'linkedin_color',
						'url' => esc_url($options['linkedin_link']),
						'content' => '<span class="fa fa-linkedin" alt="LinkedIn Logo"></span>',
						'visible' => (isset($options['linkedin_visible'])) ? $options['linkedin_visible'] : false
					),
					'google' => array(
						'id' => 'google_color',
						'url' => esc_url($options['google_link']),
						'content' => '<span class="fa fa-google-plus" alt="Google+ Logo"></span>',
						'visible' => (isset($options['google_visible'])) ? $options['google_visible'] : false
					),
					'wp_profile' => array(
						'id' => 'wp_color',
						'url' => esc_url($options['wp_profile_link']),
						'content' => '<span class="fa fa-wordpress" alt="WordPress Logo"></span>',
						'visible' => (isset($options['wp_profile_visible'])) ? $options['wp_profile_visible'] : false
					),
					'rss' => array(
						'id' => 'rss_color',
						'url' => esc_url($options['rss_link']),
						'content' => '<span class="fa fa-rss" alt="RSS Icon"></span>',
						'visible' => (isset($options['rss_visible'])) ? $options['rss_visible'] : false
					));
			} else {
				$linkcontent = array(
					'facebook' => array(
							'id' => 'fb_color',
							'url' => esc_url($options['facebook_link']),
							'content' => __('Facebook', 'social-display-translate'),
							'visible' => (isset($options['facebook_visible'])) ? $options['facebook_visible'] : false
					),
					'twitter' => array(
							'id' => 'twitter_color',
							'url' => esc_url($options['twitter_link']),
							'content' => __('Twitter', 'social-display-translate'),
							'visible' => (isset($options['twitter_visible'])) ? $options['twitter_visible'] : false
					),
					'linkedin' => array(
						'id' => 'linkedin_color',
						'url' => esc_url($options['linkedin_link']),
						'content' =>  __('LinkedIn', 'social-display-translate'),
						'visible' => (isset($options['linkedin_visible'])) ? $options['linkedin_visible'] : false
					),
					'google' => array(
						'id' => 'google_color',
						'url' => esc_url($options['google_link']),
						'content' => __('Google+', 'social-display-translate'),
						'visible' => (isset($options['google_visible'])) ? $options['google_visible'] : false
					),
					'wp_profile' => array(
						'id' => 'wp_color',
						'url' => esc_url($options['wp_profile_link']),
						'content' => __('WordPress Profile', 'social-display-translate'),
						'visible' => (isset($options['wp_profile_visible'])) ? $options['wp_profile_visible'] : false
					),
					'rss' => array(
						'id' => 'rss_color',
						'url' => esc_url($options['rss_link']),
						'content' => __('RSS Feed', 'social-display-translate'),
						'visible' => (isset($options['rss_visible'])) ? $options['rss_visible'] : false
					));
			}
			ob_start();
			?>
			
			<?php if(isset($options['show_images'])) : ?>
					<ul class="social_display">
			<?php else : ?>
				<ul id="no-logos" class="social_display">
			<?php endif;?>

				<?php foreach ($linkcontent as $link) : ?>
					<?php if($link['visible']) : ?>
						<li id="<?php echo $link['id'];?>"><a href="<?php echo $link['url'];?>"><?php echo $link['content'];?></a></li>
					<?php endif;?>
				<?php endforeach; ?>
			</ul>
			<?php
			echo ob_get_clean(); 
			echo $after_widget;
		}
	}

	function sd_widget_register() {
		register_widget('Social_Display_Widget');
	}
	add_action('widgets_init', 'sd_widget_register');
?>