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

    public function drizyOptionsGroup($input){
        return $input;
    }

    public function drizyAdminSection(){
        echo 'Check this beautiful section!';
    }

    public function drizyFieldExample(){

        $value = esc_attr( get_option( 'field_example' ) );
		echo '<input type="text" class="regular-text" name="field_example" value="' . $value . '" placeholder="Write Something Here!">';
    }

    public function drizyFirstName()
	{
		$value = esc_attr( get_option( 'first_name' ) );
		echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write your First Name">';
	}
}