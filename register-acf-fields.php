<?php

/**
 * Plugin Name:   Register ACF Fields
 * Plugin URI:    https://colinswinney.com
 * Description:   Register ACF fields using StoutLogic's ACF Builder
 * Version:       1.0
 * Author:        Colin Swinney
 * Author URI:    https://colinswinney.com
 * License:       MIT
 * License URI:   http://opensource.org/licenses/MIT
 */

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Relevent plugin documentation
 *
 * @link    https://github.com/StoutLogic/acf-builder/wiki/
 * @link    https://www.advancedcustomfields.com/resources/register-fields-via-php/
 *
 */

use StoutLogic\AcfBuilder\FieldsBuilder;

define( 'REGISTER_ACF_FIELDS', plugin_dir_path( __FILE__ ) );

require_once REGISTER_ACF_FIELDS . 'acf-builder/autoload.php';

/**
 * Register fields from /fields directory
 */
add_action('init', function () {
    collect(glob( REGISTER_ACF_FIELDS .'fields/*.php'))->map(function ($field) {
        return require_once($field);
    })->map(function ($field) {
        if ($field instanceof FieldsBuilder) {
            acf_add_local_field_group($field->build());
        }
    });
});