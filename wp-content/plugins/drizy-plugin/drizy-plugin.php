<?php

/**
 * @package DrizyPlugin
 * 
 * 
 * PLugin Name: Drizy Plugin
 * Plugin URI: https://github.com/DriZy/plugindev
 * Description: This is my first atempt on writing plugins
 * Version: 1.0.0
 * Author: Tabi Drizy 
 * License: GPLv2 or later
 */

if(! function_exists('add_action')){
    echo "Hey! You don't have access to this file!";
    exit;
}

if(file_exists(dirname(__FILE__). '/vendor/autoload.php')){

    require_once dirname(__FILE__). '/vendor/autoload.php';
}
//Requiring classesonce using composer autoload with Inc namwspace
use Inc\Activate;

use Inc\Deactivate;


//Checking if plugin exist before registering it
if (!class_exists('DrizyPlugin' )){

    class DrizyPlugin{

        public $pluginName;
        
        //constructor methods
        function __construct(){

            $this->pluginName = plugin_basename(__FILE__);
        }

        function register(){
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action( 'admin_menu', array( $this, 'add_admin_pages'));

            add_filter("plugin_action_links_$this->pluginName", array($this, 'edit_link'));

            add_filter("plugin_action_links_$this->pluginName", array($this, 'settings_link'));
            
        }

        public function edit_link($links){
            // add custom settings link
            $edit_link = '<a href = "admin.php?page=drizy_plugin">Edit</a>';
            array_push($links, $edit_link);
            return $links;
        }


        public function settings_link($links){
            // add custom settings link
            $settings_link = '<a href = "admin.php?page=drizy_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages(){
            add_menu_page( 'Drizy Plugin', 'Drizy', 'manage_options', 'drizy_plugin', array($this, 'admin_index'), 'dashicons-store', 100 );
        }

        public function admin_index(){
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';

        }

        function uninstall(){
            //delete custom post type
        }

        protected function create_post_type(){
            add_action('init', array($this, 'custom_post_type'));
        }


        function custom_post_type(){
            register_post_type('book', [
                'public'=> true,
                'label'=>'Books'
            ]);
        }


        function activate(){
            Activate::activate();
        }

        function enqueue(){
            // enqueue all scripts
            wp_enqueue_style('drizystyle', plugins_url('/assets/mystyle.css', __FILE__ ));
            wp_enqueue_script('drizyscript', plugins_url('/assets/myscript.js', __FILE__ ));
        }

    }


        $drizyPlugin = new DrizyPlugin();
        $drizyPlugin-> register();


    //activation
    register_activation_hook( __FILE__, array($drizyPlugin,'activate') );

    //deactivation
    register_deactivation_hook( __FILE__, array('Deactivate','deactivation'));
}
