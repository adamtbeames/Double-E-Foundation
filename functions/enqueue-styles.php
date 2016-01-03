<?php
/**
 * Enqueue all scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 *
 * @package WordPress
 * @subpackage Double-E-Foundation
 * @since Double-E Foundation 1.1.1
 */

if ( ! function_exists( 'doublee_scripts' ) ) :
	function doublee_scripts() {

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );

	// Load desired Foundation JS components. More can be found in Double-E-Foundation/assets/javascript.
	$theme = wp_get_theme();
	$version = $theme->get( 'Version' );
	wp_enqueue_script( 'foundation.dropdown', get_template_directory_uri() . '/assets/javascript/foundation.dropdown.js', array('jquery'), $version, true );
	wp_enqueue_script( 'foundation.dropdownMenu', get_template_directory_uri() . '/assets/javascript/foundation.dropdownMenu.js', array('jquery'), $version, true );

	// Add the comment-reply library on pages where it is necessary
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	}

	add_action( 'wp_enqueue_scripts', 'doublee_scripts' );
endif;

?>
