<?php

add_action('wp_enqueue_scripts', 'enqueue');
function enqueue(){
	wp_deregister_script('jquery');
	wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');

	//Bootstrap
	wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', NULL, '3.3.4');

	//Fancybox
	wp_register_script('fancybox2', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.js', NULL, '2.1.4');

	//Flexslider
	wp_register_script('flexslider', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', NULL, '2.5.0');

	//jQuery UI
	wp_register_script('jquery-ui', '//code.jquery.com/ui/1.11.4/jquery-ui.js');

	//jQuery Easing
	wp_register_script('easing', get_stylesheet_directory_uri() . '/js/jquery.easing.min.js', NULL, NULL);

	//Theme Functions
	wp_register_script('functions', get_stylesheet_directory_uri() . '/js/functions.js', NULL, NULL);

	//Google Map
	wp_register_script('google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
	wp_register_script('acf-map', get_stylesheet_directory_uri().'/js/acfmap.js');

//enqueue scripts
	wp_enqueue_script(array('jquery','bootstrap','fancybox2','functions'));

	//styles
	//Bootstrap Core CSS
	wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css', NULL, '3.3.4');

	wp_register_style('fancybox2', get_stylesheet_directory_uri().'/js/source/jquery.fancybox.css', NULL, '2.1.4');

	//Theme stylesheet
	wp_register_style('styles', get_stylesheet_directory_uri().'/style.css', NULL, NULL);


//enqueue styles
	wp_enqueue_style(array('bootstrap','fancybox2','styles'));


	//Locations
	if ( is_page_template('page-templates/locations.php') ){
		wp_enqueue_script(array('google-map','acf-map'));
	}

	//Menu
	if ( is_post_type_archive('menu') ){
		wp_enqueue_script('easing');
	}

}

//home
/*
if (is_page(33)){
	wp_register_script('flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js', NULL, NULL );
	wp_enqueue_script('flexslider');
}
*/

/*
if ( wp_is_mobile() ) {
	wp_enqueue_style('jquery-mobile', 'https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css');
	wp_enqueue_script('jquery-mobile', 'https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js');
}
*/