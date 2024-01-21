<?php
/**
 * Plugin Name: Social Widget
 */

add_action( 'widgets_init', 'appetizo_social_load_widget' );

function appetizo_social_load_widget() {
	register_widget( 'appetizo_social_widget' );
}

class appetizo_social_widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
    public function __construct() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'appetizo_social_widget', 'description' => __('A widget that displays your social icons', 'appetizo') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 250, 'height' => 350, 'id_base' => 'appetizo_social_widget' );

		/* Create the widget. */
        parent::__construct( 'appetizo_social_widget', __('Appetizo: Social Icons', 'appetizo'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );


		/* Our variables from the widget settings. */
        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $facebook = !empty($instance['facebook']) ? $instance['facebook'] : '';
        $twitter = !empty($instance['twitter']) ? $instance['twitter'] : '';
        $instagram = !empty($instance['instagram']) ? $instance['instagram'] : '';
        $bloglovin = !empty($instance['bloglovin']) ? $instance['bloglovin'] : '';
        $snapchat = !empty($instance['snapchat']) ? $instance['snapchat'] : '';
        $youtube = !empty($instance['youtube']) ? $instance['youtube'] : '';
        $tumblr = !empty($instance['tumblr']) ? $instance['tumblr'] : '';
        $pinterest = !empty($instance['pinterest']) ? $instance['pinterest'] : '';
        $dribbble = !empty($instance['dribbble']) ? $instance['dribbble'] : '';
        $soundcloud = !empty($instance['soundcloud']) ? $instance['soundcloud'] : '';
        $vimeo = !empty($instance['vimeo']) ? $instance['vimeo'] : '';
        $linkedin = !empty($instance['linkedin']) ? $instance['linkedin'] : '';
        $rss = !empty($instance['rss']) ? $instance['rss'] : '';
		
		/* Before widget (defined by themes). */
        echo $args['before_widget'];

        /* Display the widget title if one was input (before and after defined by themes). */
        if (!empty($title)) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

		?>
		
			<div class="social-widget">
				<?php if($facebook) : ?><a class="fbshare"  href="<?php echo esc_url(get_theme_mod('appetizo_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i></a><?php endif; ?>
				<?php if($twitter) : ?><a class="twshare"  href="<?php echo esc_url(get_theme_mod('appetizo_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i></a><?php endif; ?>
				<?php if($instagram) : ?><a class="inshare"  href="<?php echo esc_url(get_theme_mod('appetizo_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i></a><?php endif; ?>
				<?php if($pinterest) : ?><a  class="pishare" href="<?php echo esc_url(get_theme_mod('appetizo_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i></a><?php endif; ?>
				<?php if($bloglovin) : ?><a  class="blshare" href="<?php echo esc_url(get_theme_mod('appetizo_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i></a><?php endif; ?>

                <?php if($snapchat) : ?><a  class="scshare" href="<?php echo esc_url(get_theme_mod('appetizo_snapchat')); ?>" target="_blank"><i class="fa fa-snapchat-ghost"></i></a><?php endif; ?>

				<?php if($tumblr) : ?><a  class="tlshare" href="<?php echo esc_url(get_theme_mod('appetizo_tumblr')); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i></a><?php endif; ?>
				<?php if($youtube) : ?><a class="ytshare"  href="<?php echo esc_url(get_theme_mod('appetizo_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a><?php endif; ?>
				<?php if($dribbble) : ?><a  class="dbshare" href="<?php echo esc_url(get_theme_mod('appetizo_dribbble')); ?>" target="_blank"><i class="fa fa-dribbble"></i></a><?php endif; ?>
				<?php if($soundcloud) : ?><a class="scshare"  href="<?php echo esc_url(get_theme_mod('appetizo_soundcloud')); ?>" target="_blank"><i class="fa fa-soundcloud"></i></a><?php endif; ?>
				<?php if($vimeo) : ?><a class="vishare"  href="<?php echo esc_url(get_theme_mod('appetizo_vimeo')); ?>" target="_blank"><i class="fa fa-vimeo-square"></i></a><?php endif; ?>
				<?php if($linkedin) : ?><a class="lishare"  href="<?php echo esc_url(get_theme_mod('appetizo_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i></a><?php endif; ?>
				<?php if($rss) : ?><a class="rsshare"  href="<?php echo esc_url(get_theme_mod('appetizo_rss')); ?>" target="_blank"><i class="fa fa-rss"></i></a><?php endif; ?>
			</div>
			
			
		<?php

		/* After widget (defined by themes). */
        echo $args['after_widget'];
	}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['facebook'] = isset( $new_instance['facebook'] ) ? 1 : false;
		$instance['twitter'] = isset( $new_instance['twitter'] ) ? 1 : false;
		$instance['instagram'] = isset( $new_instance['instagram'] ) ? 1 : false;
		$instance['bloglovin'] = isset( $new_instance['bloglovin'] ) ? 1 : false;
        $instance['snapchat'] = isset( $new_instance['snapchat'] ) ? 1 : false;
		$instance['youtube'] = isset( $new_instance['youtube'] ) ? 1 : false;
		$instance['tumblr'] = isset( $new_instance['tumblr'] ) ? 1 : false;
		$instance['pinterest'] = isset( $new_instance['pinterest'] ) ? 1 : false;
		$instance['dribbble'] = isset( $new_instance['dribbble'] ) ? 1 : false;
		$instance['soundcloud'] = isset( $new_instance['soundcloud'] ) ? 1 : false;
		$instance['vimeo'] = isset( $new_instance['vimeo'] ) ? 1 : false;
		$instance['linkedin'] = isset( $new_instance['linkedin'] ) ? 1 : false;
		$instance['rss'] = isset( $new_instance['rss'] ) ? 1 : false;

		return $instance;
	}


	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Subscribe & Follow','appetizo'), 'facebook' => 'on', 'twitter' => 'on', 'instagram' => 'on', 'pinterest' => '', 'bloglovin' => '', 'snapchat' => '', 'tumblr' => '', 'youtube' => '', 'dribbble' => '', 'soundcloud' => '', 'vimeo' => '', 'linkedin' => '', 'rss' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e('Title','appetizo')?></label>
			<input id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" style="width:90%;" />
		</p>
		
		<p><?php esc_html_e('Note: Set your social links in the Customizer','appetizo'); ?></p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"><?php esc_html_e('Show Facebook','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>" <?php checked( (bool) $instance['facebook'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"><?php esc_html_e('Show Twitter','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>" <?php checked( (bool) $instance['twitter'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>"><?php esc_html_e('Show Instagram','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'instagram' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'instagram' )); ?>" <?php checked( (bool) $instance['instagram'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>"><?php esc_html_e('Show Pinterest','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'pinterest' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'pinterest' )); ?>" <?php checked( (bool) $instance['pinterest'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>"><?php esc_html_e('Show Bloglovin','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'bloglovin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'bloglovin' )); ?>" <?php checked( (bool) $instance['bloglovin'], true ); ?> />
		</p>


        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'snapchat' )); ?>"><?php esc_html_e('Show Snapchat','appetizo') ?></label>
            <input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'snapchat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'snapchat' )); ?>" <?php checked( (bool) $instance['snapchat'], true ); ?> />
        </p>


		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>"><?php esc_html_e('Show Tumblr','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'tumblr' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'tumblr' )); ?>" <?php checked( (bool) $instance['tumblr'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>"><?php esc_html_e('Show Youtube','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'youtube' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'youtube' )); ?>" <?php checked( (bool) $instance['youtube'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>"><?php esc_html_e('Show Dribbble','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'dribbble' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'dribbble' )); ?>" <?php checked( (bool) $instance['dribbble'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>"><?php esc_html_e('Show Soundcloud','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'soundcloud' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'soundcloud' )); ?>" <?php checked( (bool) $instance['soundcloud'], true ); ?> />
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>"><?php esc_html_e('Show Vimeo','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'vimeo' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'vimeo' )); ?>" <?php checked( (bool) $instance['vimeo'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>"><?php esc_html_e('Show Linkedin','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'linkedin' )); ?>" <?php checked( (bool) $instance['linkedin'], true ); ?> />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>"><?php esc_html_e('Show RSS','appetizo') ?></label>
			<input type="checkbox" id="<?php echo esc_attr($this->get_field_id( 'rss' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'rss' )); ?>" <?php checked( (bool) $instance['rss'], true ); ?> />
		</p>


	<?php
	}
}

?>