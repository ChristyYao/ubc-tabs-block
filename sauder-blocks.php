<?php
/**
 * UBC Tab Block
 *
 * @package     SauderBlocks
 * @author      Christy Yao
 * @copyright   2019 Christy Yao
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: UBC Tab Block
 * Plugin URI:  https://sauder.ubc.ca/
 * Description: Tab Block for UBC Sauder
 * Version:     1.0.0
 * Author:      Christy Yao
 * Author URI:  https://christyyao.com
 * Text Domain: ubc-tab-block
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

 add_action('init', 'ubc_tab_blocks_asset_load', 10);

 function ubc_tab_blocks_asset_load(){
     wp_register_script(
         'ubc-tab-block',
         plugins_url( 'build/block.js', __FILE__ ),
         array(
             'wp-blocks',
             'wp-i18n',
             'wp-element',
             'wp-editor',
             'wp-plugins',
             'wp-edit-post',
         ),
         filemtime( plugin_dir_path( __FILE__ ) . 'build/block.js'),
         true
    );

    wp_register_style(
        'ubc-tab-editor',
        plugins_url( '/build/block.css', __FILE__ ),
        array( 'wp-edit-blocks' ),
        filemtime( plugin_dir_path( __FILE__ ) . 'build/block.css' )
    );

    wp_register_style(
        'ubc-tab-style',
        plugins_url( '/build/frontend.css', __FILE__ ),
        array('wp-editor'),
        filemtime( plugin_dir_path( __FILE__ ) . 'build/frontend.css' )
    );

    register_block_type( 'ubc/tab', array(
        'editor_script' => 'ubc-tab-block',
        'editor_style'  => 'ubc-tab-editor',
        'style'         => 'ubc-tab-style'
    ) );
 }
