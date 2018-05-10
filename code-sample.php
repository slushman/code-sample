<?php

/**
 * Plugin Name: 			Code Sample
 * Plugin URI: 				https://github.com/slushman/code-sample/
 * Description: 			Adss a code sample button to the TinyMCE Editor.
 * Author: 					slushman
 * Author URI: 				https://www.slushman.com/
 * GitHub Plugin URI: 		https://github.com/slushman/code-sample/
 * Github Branch: 			master
 * Version: 				1.0.0
 * License: 				GPL2+
 * License URI: 			http://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @since 					1.0.0
 * @package 				Code_Sample
 * 
 * @todo 		Extend the code block to include selecting the language as a block setting.
 * 					Include the list from Prism.js.
 * 					Should this just be a separate block?
 * @todo 		Add the selected language in a rel attribute on the pre element.
 * @todo 		Add "language-xxx" class to the code element to support prism.js & Google Pretty Print.
 * @todo 		Add "xxx" class to the code element to support highlight.js & syntaxhighlighter.
 * @todo 		Add data-language="xxx" attribute to code element to support rainbow.js.
 * @todo 		Add "sh_xxx" class to code element to support SHJS.
 * @todo 		Add "prettyprint" class to pre element to support Google Pretty Print.
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_filter( 'mce_external_plugins', 'code_sample_add_external_plugin', 999, 1 );
add_filter( 'mce_buttons', 'code_sample_button', 999, 1 );
add_action( 'admin_enqueue_scripts', 'code_sample_scripts' );

/**
 * Adds the Code Sample TinyMCE plugin from the CloudFlare CDN to
 * the list of MCE plugins.
 * 
 * @hooked 		mce_external_plugins
 * @since 		1.0.0
 * @param 		array 		$mce_plugins 		The current MCE plugins array.
 * @return 		array 		$mce_plugins 		The modified MCE plugins array.
 */
function code_sample_add_external_plugin( $mce_plugins ) {

	$mce_plugins['codesample'] = 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.12/plugins/codesample/plugin.min.js'; // 

	return $mce_plugins;

} // code_sample_add_external_plugin()

/**
 * Adds the Code Sample button to the list of buttons
 * for the first row of the TinyMCE editor.
 * 
 * @hooked 		mce_buttons
 * @since 		1.0.0
 * @param 		array 		$mce_buttons 		The current MCE buttons array.
 * @return 		array 		$mce_plugins 		The modified MCE buttons array.
 */
function code_sample_button( $mce_buttons ) {

	$mce_buttons[] = 'codesample';

	return $mce_buttons;

} // code_sample_button

/**
 * Enqueues the init script to initialize the Code Sample TinyMCE plugin.
 * 
 * @since 		1.0.0
 */
function code_sample_scripts() {

	wp_enqueue_script( 'code-sample-init', plugin_dir_url( __FILE__ ) . 'js/code-sample-init.js', array(), '1.0.0', true );

} // code_sample_scripts()