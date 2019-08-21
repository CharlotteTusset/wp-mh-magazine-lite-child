<?php

/***** Register Widgets *****/

function mh_magazine_lite_register_widgets() {
	register_widget('last_expo_widget');
}
add_action('widgets_init', 'mh_magazine_lite_register_widgets');

/***** Include Widgets *****/

require_once('widgets/last-expo.php');

?>