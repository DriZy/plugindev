<?php

/**
 * @package DrizyPlugin
 * 
 * 
 * PLugin Name: Drizy Plugin
 * Plugin URI: https://github.com/DriZy
 * Description: This is my first atempt on writing plugins
 * Version: 1.0.0
 * Author: Tabi Drizy
 * License: GPLv2 or later
 */

if(! function_exists('add_action')){
    echo "Hey! You don't have access to this file!";
    exit;
}


class DrizyPlugin{

    //constructor methods
     function __construct(){

         add_action('init', array( $this, 'custom_post_type' ));
     }

    function register(){
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

//    //activation
//
//    function activate(){
//        //generate custom post type
//
//        $this->custom_post_type();
//
//
//        //flush the rewrite rules
//        flush_rewrite_rules();
//    }
//
//    //deactivation
//
//    function deactivate(){
//       //flush the rewrite rules
//
//        flush_rewrite_rules();
//    }

    //uninstall

    function uninstall(){
        //delete custom post type
    }

    protected function custom_post_type(){
         register_post_type('book', [
             'public'=> true,
             'label'=>'Books'
         ]);
    }

    function enqueue(){
         // enqueue all scripts
        wp_enqueue_style('drizystyle', plugins_url('/assets/mystyle.css', __FILE__ ));
        wp_enqueue_script('drizyscript', plugins_url('/assets/myscript.js', __FILE__ ));
    }

}

if (class_exists('DrizyPlugin' )){
    $drizyPlugin = new DrizyPlugin();
    $drizyPlugin-> register();
}

//activation

require_once plugin_dir_path(__FILE__) . 'includes/drizy-plugin-activate.php';

register_activation_hook( __FILE__, array('DrizyPluginActivate','activate') );

//deactivation
require_once plugin_dir_path(__FILE__).'includes/drizy-plugin-deactivate.php';
register_deactivation_hook( __FILE__, array('DrizyPluginDeactivate','deactivation'));

