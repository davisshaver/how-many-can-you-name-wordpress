<?php
/*
	Plugin Name: How Many Can You Name for WordPress
	Plugin URI: http://www.alleyinteractive.com/
	Description: This plugin integrates How Many Can You Name quizzes as a Shortcake shortcodes.
	Author: Davis Shaver
	Author URI: http://www.alleyinteractive.com/
*/
/*  This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**
 * If Shortcake isn't active, then add an administration notice.
 *
 * @since 0.1
 */
function shortcode_ui_detection() {
	if ( ! function_exists( 'shortcode_ui_register_for_shortcode' ) ) {
		add_action( 'admin_notices', 'how_many_can_you_name_shortcake_dependency' );
	}
}
add_action( 'init', 'shortcode_ui_detection' );

/**
 * Display the administration notice if the user can activate plugins.
 *
 * @since 0.1
 */
function how_many_can_you_name_shortcake_dependency() {
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="error message">
			<p><?php esc_html_e( 'Shortcode UI plugin must be active for the How Many Can You Name extension.', 'how-many-can-you-name-shortcake' ); ?></p>
		</div>
		<?php
	}
}

/**
 * Register a basic Shortcode UI for How Many Can You Name
 *
 * @since 0.1
 */
function shortcode_ui_for_how_many_can_you_name() {
	shortcode_ui_register_for_shortcode(
		'simplechart',
		array(
			'label'    => esc_html__( 'Citation Source', 'how-many-can-you-name-shortcake' ),
			'attr'     => 'answers',
			'type'     => 'text',
			'encode'   => true,
			'multiple' => true,
			'meta'     => array(
				'placeholder' => esc_html__( 'Test placeholder', 'how-many-can-you-name-shortcake' ),
			),
		)
	);
}
add_action( 'register_shortcode_ui', 'shortcode_ui_for_how_many_can_you_name' );
