<?php

// switch off auto <p>
remove_filter( 'the_content', 'wpautop' );

// load theme stylesheet
wp_register_style(
	'core-css',
	get_template_directory_uri() . '/style.css',
	'',
	'5.0',
	'all'
);
function squares_enqueue_style() {
	wp_enqueue_style( 'core-css', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'squares_enqueue_style' );

// register menus
function register_my_menu() {
	register_nav_menu( 'main-nav',__( 'Navigation Menu' ) );
}
add_action( 'init', 'register_my_menu' );

function getAverage($sourceURL){
    $image = imagecreatefromjpeg($sourceURL);
    $scaled = imagescale($image, 1, 1, IMG_BICUBIC); 
    $index = imagecolorat($scaled, 0, 0);
    $rgb = imagecolorsforindex($scaled, $index); 
    $red = round(round(($rgb['red'] / 0x33)) * 0x33); 
    $green = round(round(($rgb['green'] / 0x33)) * 0x33); 
    $blue = round(round(($rgb['blue'] / 0x33)) * 0x33); 
    return sprintf('#%02X%02X%02X', $red, $green, $blue);
}

// Override img caption shortcode to fix 10px issue.
function fix_img_caption_shortcode( $val, $attr, $content = null ) {
    extract( shortcode_atts( array(
        'id'    => '',
        'align' => '',
        'width' => '',
        'caption' => ''
    ), $attr ) );
    
    if ( 1 > ( int ) $width || empty( $caption ) ) return $val;
    
    return '<figure id="' . $id . '" class="image-caption ' . esc_attr( $align ) . '">' . do_shortcode( $content ) . '<figcaption>' . $caption . '</figcaption></figure>';
}
add_filter('img_caption_shortcode', 'fix_img_caption_shortcode', 10, 3);

// add div around video embeds
function div_vid_embed( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'div_vid_embed', 10, 3 );
add_filter( 'video_embed_html', 'div_vid_embed' ); // for Jetpack

// theme support
function squares_setup() {
	
	add_theme_support( 'custom-logo', array(
		'height'		=> 40,
		'width'			=> 400,
		'flex-height'	=> true,
	) );
	
	add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'squares_setup' );

// adjust excerpt length and add read more link
function custom_excerpt_length( $length ) {
	return 28;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
	return sprintf( '&hellip;',
		get_permalink( get_the_ID() ),
		__( 'Read more', 'textdomain' )
	);
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

// custom menu walker [https://www.microdot.io/simpler-wp-nav-menu-markup/]
class Microdot_Walker_Nav_Menu extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '<div>';
    }

    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= '</div>';
    }

    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $classes = array();
        if( !empty( $item->classes ) ) {
            $classes = (array) $item->classes;
        }

        $active_class = '';
        if( in_array('current-menu-item', $classes) ) {
            $active_class = ' class="active"';
        } else if( in_array('current-menu-parent', $classes) ) {
            $active_class = ' class="active-parent"';
        } else if( in_array('current-menu-ancestor', $classes) ) {
            $active_class = ' class="active-ancestor"';
        }

        $url = '';
        if( !empty( $item->url ) ) {
            $url = $item->url;
        }

        $output .= '<div><a ' . $active_class . ' href="' . $url . '">' . $item->title . '</a>';
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= '</a></div>';
    }
}

?>