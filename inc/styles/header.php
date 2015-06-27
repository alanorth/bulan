<?php
/**
 * Header color
 *
 * @package    Aurora
 * @author     ThemePhe
 * @copyright  Copyright (c) 2015, ThemePhe
 * @license    http://www.gnu.org/licenses/gpl-2.0.html
 * @since      1.0.0
 */

if ( ! function_exists( 'aurora_customizer_header_styles' ) && class_exists( 'Customizer_Library_Styles' ) ) :
/**
 * Process user options to generate CSS needed to implement the choices.
 *
 * @since  1.0.0
 */
function aurora_customizer_header_styles() {

	// Theme prefix
	$prefix = 'aurora-';

	// Site title color
	$title = aurora_mod( $prefix . 'site-title-color' );

	if ( $title !== customizer_library_get_default( $prefix . 'site-title-color' ) ) {

		$color = sanitize_hex_color( $title );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-title a'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

	// Site description color
	$desc = aurora_mod( $prefix . 'site-desc-color' );

	if ( $desc !== customizer_library_get_default( $prefix . 'site-desc-color' ) ) {

		$color = sanitize_hex_color( $desc );

		Customizer_Library_Styles()->add( array(
			'selectors' => array(
				'#masthead .site-description'
			),
			'declarations' => array(
				'color' => $color
			)
		) );
	}

}
endif;
add_action( 'aurora_customizer_library_styles', 'aurora_customizer_header_styles' );