<?php
/**
 * @package DrizyPlugin
 */
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController{
    
    
    public function drizyCheckboSanitize($input){
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);

        return (isset($input) ? true : false );
    }

    public function drizyAdminSectionManager(){
        echo 'Click on checkboxes to activate and manage plugin features';
    }

    public function drizyCheckboxField($args){

        var_dump($args);
    }

    
}