<?php

/***** MH Custom Posts [lite] *****/

class last_expo_widget extends WP_Widget {
    function __construct() {
		parent::__construct(
			'last_expo', esc_html_x('Last Expo', 'widget name', 'mh-magazine-lite-child'),
			array(
				'classname' => 'last_expo',
				'description' => esc_html__('Widget to display last exhibition', 'mh-magazine-lite-child'),
				'customize_selective_refresh' => true
			)
		);
	}
    function widget($args, $instance) {
	    $defaults = array('title' => '');
		$instance = wp_parse_args($instance, $defaults);
	   	$query_args = array();

		$widget_loop = new WP_Query($query_args);
        echo $args['before_widget'];
        	if (!empty($instance['title'])) {
				echo $args['before_title'];
					if ($instance['category'] != 0) {
						echo '<a href="' . esc_url(get_category_link($instance['category'])) . '" class="mh-widget-title-link">';
					}
					echo esc_html(apply_filters('widget_title', $instance['title']));
					if ($instance['category'] != 0) {
						echo '</a>';
					}
				echo $args['after_title'];
			} ?>
			<ul class="last-expo-widget mh-clearfix"><?php
				while ($widget_loop->have_posts()) : $widget_loop->the_post(); ?>
					<li class="post-<?php the_ID(); ?> last-expo-item last-expo-small mh-clearfix">
						<figure class="last-expo-thumb">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
								if (has_post_thumbnail()) {
									the_post_thumbnail('mh-magazine-lite-small');
								} else {
									echo '<img class="mh-image-placeholder" src="' . get_template_directory_uri() . '/images/placeholder-small.png' . '" alt="' . esc_html__('No Image', 'mh-magazine-lite') . '" />';
								} ?>
							</a>
						</figure>
						<div class="last-expo-header">
							<p class="last-expo-small-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php the_title(); ?>
								</a>
							</p>
							<div class="mh-meta last-expo-meta">
								<?php mh_magazine_lite_loop_meta(); ?>
							</div>
						</div>
					</li><?php
				endwhile;
				wp_reset_postdata(); ?>
        	</ul><?php
        echo $args['after_widget'];
    }
    function update($new_instance, $old_instance) {
        $instance = array();
        if (!empty($new_instance['title'])) {
			$instance['title'] = sanitize_text_field($new_instance['title']);
		}
    }
    
    function form($instance) {
	    $defaults = array('title' => '', 'category' => 0, 'tags' => '', 'postcount' => 5, 'offset' => 0, 'sticky' => 1);
        $instance = wp_parse_args($instance, $defaults); ?>
		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'mh-magazine-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_html_e('Select a Category:', 'mh-magazine-lite'); ?></label>
            <select id="<?php echo esc_attr($this->get_field_id('category')); ?>" class="widefat" name="<?php echo esc_attr($this->get_field_name('category')); ?>">
            	<option value="0" <?php selected(0, $instance['category']); ?>><?php esc_html_e('All', 'mh-magazine-lite'); ?></option><?php
            		$categories = get_categories();
            		foreach ($categories as $cat) { ?>
            			<option value="<?php echo absint($cat->cat_ID); ?>" <?php selected($cat->cat_ID, $instance['category']); ?>><?php echo esc_html($cat->cat_name) . ' (' . absint($cat->category_count) . ')'; ?></option><?php
            		} ?>
            </select>
            <small><?php esc_html_e('Select a category to display posts from.', 'mh-magazine-lite'); ?></small>
		</p>
		<p>
        	<label for="<?php echo esc_attr($this->get_field_id('tags')); ?>"><?php esc_html_e('Filter Posts by Tags (e.g. lifestyle):', 'mh-magazine-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo esc_attr($instance['tags']); ?>" name="<?php echo esc_attr($this->get_field_name('tags')); ?>" id="<?php echo esc_attr($this->get_field_id('tags')); ?>" />
	    </p>
        <p>
        	<label for="<?php echo esc_attr($this->get_field_id('postcount')); ?>"><?php esc_html_e('Post Count (max. 50):', 'mh-magazine-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo absint($instance['postcount']); ?>" name="<?php echo esc_attr($this->get_field_name('postcount')); ?>" id="<?php echo esc_attr($this->get_field_id('postcount')); ?>" />
	    </p>
	    <p>
        	<label for="<?php echo esc_attr($this->get_field_id('offset')); ?>"><?php esc_html_e('Skip Posts (max. 50):', 'mh-magazine-lite'); ?></label>
			<input class="widefat" type="text" value="<?php echo absint($instance['offset']); ?>" name="<?php echo esc_attr($this->get_field_name('offset')); ?>" id="<?php echo esc_attr($this->get_field_id('offset')); ?>" />
	    </p>
        <p>
			<input id="<?php echo esc_attr($this->get_field_id('sticky')); ?>" name="<?php echo esc_attr($this->get_field_name('sticky')); ?>" type="checkbox" value="1" <?php checked(1, $instance['sticky']); ?> />
			<label for="<?php echo esc_attr($this->get_field_id('sticky')); ?>"><?php esc_html_e('Ignore Sticky Posts', 'mh-magazine-lite'); ?></label>
		</p>
    	<p>
    		<strong><?php esc_html_e('Info:', 'mh-magazine-lite'); ?></strong> <?php esc_html_e('This is the lite version of this widget with basic features. More features and options are available in the premium version of MH Magazine.', 'mh-magazine-lite'); ?>
    	</p><?php
    }
}

?>