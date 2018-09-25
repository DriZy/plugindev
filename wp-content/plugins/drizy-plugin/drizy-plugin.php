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
 * Author URI:  https://github.com/DriZy 
 * License: GPLv2 or later
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

if(! function_exists('add_action')){
    echo "Hey! You don't have access to this file!";
    exit;
}

if(file_exists(dirname(__FILE__). '/vendor/autoload.php')){

    require_once dirname(__FILE__). '/vendor/autoload.php';
}

 //Requiring classesonce using composer autoload with Inc namwspace
 use Inc\Base\Activate;

 use Inc\Base\Deactivate;

function activate_drizy_plugin(){
    Activate::activate();
}

//activation
register_activation_hook( __FILE__, 'activate_drizy_plugin');
 
function deactivate_drizy_plugin(){
    Deactivate::deactivate();
}
//deactivation
register_deactivation_hook( __FILE__, 'deactivate_drizy_plugin');


if(class_exists('Inc\\Init')){
    Inc\init::register_services();
}
