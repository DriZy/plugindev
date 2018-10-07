<?php
/**
 * @package DrizyPlugin
 */
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class AdminCallbacks extends BaseController{
    
    public function adminDashboard(){
        return require_once( "$this->plugin_path/templates/admin.php" );
    }

    public function cptDashboard(){
        return require_once( "$this->plugin_path/templates/custom-post-type-manager.php" );
    }

    public function ctDashboard(){
        return require_once( "$this->plugin_path/templates/custom-taxonomy-manager.php" );
    }

    public function widgetDashboard(){
        return require_once( "$this->plugin_path/templates/widget.php" );
    }

//    public function drizyCheckboSanitize($input){
//        return $input;
//    }

   
}