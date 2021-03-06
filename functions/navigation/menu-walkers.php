<?php
/**
 * Customize the output of menus for Foundation top bar
 *
 * @package WordPress
 * @subpackage Double-E Foundation
 * @since FoundationPress 1.0.0
 * Credit to Brett Mason (https://github.com/brettsmason)
 */


 if ( ! class_exists( 'Foundationpress_Top_Bar_Walker' ) ) {
	 class Foundationpress_Top_Bar_Walker extends Walker_Nav_Menu {

		 function start_lvl( &$output, $depth = 0, $args = array() ) {
			 $indent = str_repeat( "\t", $depth );
			 $output .= "\n$indent<ul class=\"dropdown menu vertical\" data-dropdown-menu>\n";
		 }
	 }
 }

 if ( ! class_exists( 'Foundationpress_Mobile_Walker' ) ) {
	 class Foundationpress_Mobile_Walker extends Walker_Nav_Menu {
		 function start_lvl( &$output, $depth = 0, $args = array() ) {
			 $indent = str_repeat( "\t", $depth );
			 $output .= "\n$indent<ul class=\"vertical nested menu\">\n";
		 }
	 }
 }