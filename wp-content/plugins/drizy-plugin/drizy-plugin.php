<?php

/**
 * @package DrizyPlugin
 *
 */
 /* 
 * 
 * PLugin Name: Drizy Plugin
 * Plugin URI: https://github.com/DriZy/plugindev
 * Description: This is my first atempt on writing plugins
 * Version: 1.0.0
 * Author: Tabi Drizy
 * Author URI:  https://github.com/DriZy 
 * License: GPLv2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */


 // If this file is called firectly, abort!!!
if(! function_exists('add_action')){
    echo "Hey! You don't have access to this file!";
    exit;
}


// Require once the Composer Autoload
if(file_exists(dirname(__FILE__). '/vendor/autoload.php')){

    require_once dirname(__FILE__). '/vendor/autoload.php';
}

//  //Requiring classesnonce using composer autoload with Inc namwspace
//  use Inc\Base\Activate;

//  use Inc\Base\Deactivate;


/**
 * The code that runs during plugin activation
 */
function activate_drizy_plugin(){
    Inc\Base\Activate::activate();
}

//activation
register_activation_hook( __FILE__, 'activate_drizy_plugin');
 

/**
 * The code that runs during plugin deactivation
 */
function deactivate_drizy_plugin(){
    Inc\Base\Deactivate::deactivate();
}
//deactivation
register_deactivation_hook( __FILE__, 'deactivate_drizy_plugin');



/**
 * Initialize all the core classes of the plugin
 */
if(class_exists('Inc\\Init')){
    Inc\init::register_services();
}
