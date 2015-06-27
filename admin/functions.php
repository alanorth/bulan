<?php
/**
 * Custom and output functions for the theme customizer 
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'aurora_mod' ) ) :
/**
 * Wrap get_theme_mod function
 */
function aurora_mod( $name ) {
	return get_theme_mod( $name, customizer_library_get_default( $name ) );
}
endif;

if ( ! function_exists( 'aurora_textarea_stripslashes' ) ) :
/**
 * Sanitize a textarea for ads.
 *
 * @since  1.0.0
 */
function aurora_textarea_stripslashes( $string ) {
	return stripslashes( $string );
}
endif;

/**
 * Custom customizer function.
 *
 * @since  1.0.0
 */
function aurora_move_default_customizer( $wp_customize ) {

	// Move the customize to new panel
	$wp_customize->get_section( 'title_tagline' )->panel       = 'header';
	$wp_customize->get_section( 'nav' )->panel                 = 'general';
	$wp_customize->get_section( 'static_front_page' )->panel   = 'general';
	$wp_customize->get_section( 'colors' )->panel              = 'color';
	$wp_customize->get_section( 'background_image' )->panel    = 'bg_image';

	// Change the title/description
	$wp_customize->get_section( 'title_tagline' )->title       = __( 'Site Title', 'aurora' );
	$wp_customize->get_section( 'title_tagline' )->description = __( 'Site title will automatically disapear if you upload a logo.', 'aurora' );
	$wp_customize->get_section( 'colors' )->title              = __( 'Background', 'aurora' );
	$wp_customize->get_section( 'colors' )->priority           = 1;

	// Live preview
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	
}
add_action( 'customize_register', 'aurora_move_default_customizer' );

/**
 * Retrieve tags list.
 *
 * @since  1.0.0
 * @return array $tags
 */
function aurora_tags_list() {

	// Set up empty array.
	$tags = array();

	// Retrieve available tags.
	$tags_obj = get_tags();

	// Set default/empty tag.
	$tags[''] = __( 'Select a tag &hellip;', 'aurora' );

	// Display the tags.
	foreach ( $tags_obj as $tag ) {
		$tags[$tag->term_id] = esc_attr( $tag->name );
	}

	return $tags;

}

/**
 * Retrieve categories list.
 *
 * @since  1.0.0
 * @return array $tags
 */
function aurora_cats_list() {

	// Set up empty array.
	$cats = array();

	// Retrieve available categories.
	$cats_obj = get_categories();

	// Set default/empty tag.
	$cats[''] = __( 'Select a category &hellip;', 'aurora' );

	// Display the tags.
	foreach ( $cats_obj as $cat ) {
		$cats[$cat->term_id] = esc_attr( $cat->name );
	}

	return $cats;

}