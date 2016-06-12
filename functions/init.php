<?php
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'print_emoji_detection_script', 7 );
remove_action('wp_print_styles', 'print_emoji_styles' );

if(!function_exists('initialize')){
	function initialize() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support('post-thumbnails');
		//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	}
	add_action('init','initialize');
}

function custom_login_logo(){
	$logo = get_stylesheet_directory_uri().'/images/Komatsu-Ramen-logo-gold.jpg';
	$images = get_stylesheet_directory_uri().'/images/';
	//$l = getimagesize($path);
	echo '<style type="text/css">
			h1 a { background-image:url("'. $logo .'") !important; background-size:contain !important;width:220px !important;height:220px !important;margin: 0 auto !important;}
			body.login {background:#000 !important;}
			.login #backtoblog a, .login #nav a, .login h1 a {color:#bba963;}
			.login #backtoblog a:hover, .login #nav a:hover, .login h1 a:hover {color: #96884f !important;}
			#login {padding: 40px 4% 20px !important}
			.login label {
    color: #7b6b43;
    font-size: 11.5px;
    text-transform: uppercase;
    letter-spacing: .25em;
    font-family: "Raleway", Arial, sans-serif;
}
.login form{padding: 12px 22px 0 !important;}
.login form .input, .login input[type=text] {
    border: 0;
    background: #000;
    box-shadow: none;
    border-bottom: 2px solid #bba963;
}
.login form {margin-top: 0;background: rgba(255, 255, 255, 0) !important;}
input#wp-submit {
    background: #bba963;
    border: 0;
    border-radius: 0;
    text-shadow: none;
    text-transform: uppercase;
    letter-spacing: .2em;
    font-family: "Raleway", Arial, sans-serif;
    padding: 8px 26px 5px;
    height: auto;
    color: #000;
    font-weight: bold;
}
input#rememberme {
    border: 1px solid #B9AD6C;
    box-shadow: none;
    background: #000;
}
input[type=checkbox]:checked:before {color: #B9AD6C;}
		</style>';
}
add_action('login_head','custom_login_logo');
function login_header_url() {
    return home_url();
}
add_filter('login_headerurl', 'login_header_url');

function login_header_title() {
    return get_bloginfo('name');
}
add_filter('login_headertitle', 'login_header_title');

/*
function change_menu_labels($t) {
    global $menu;
	//pre($menu);exti;
    $menu[103][0] = 'Backup';
    foreach($menu as $k=>$v){
	    if($v[0]==''){

	    }
    }
}
add_action('admin_menu', 'change_menu_labels' ,1000);
*/

?>