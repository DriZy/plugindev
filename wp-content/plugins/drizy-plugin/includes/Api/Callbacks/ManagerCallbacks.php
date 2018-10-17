<?php
/**
 * @package DrizyPlugin
 */
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController{
    
    
    public function drizyCheckboxSanitize($input){
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);

        return (isset ($input ) ? true : false );
    }

    public function drizyAdminSectionManager(){
        echo 'Click on checkboxes to activate and manage plugin features';
    }
   
    public function drizyCheckboxField($args)	{
        // var_dump($args);
		$names = $args['label_for'];
		$classes = $args['class'];
		$checkbox = get_option($names);
		echo '<div class="'.$classes.'"><input type="checkbox" id="'.$names.'" name="'.$names.'" value="1" '.($checkbox ? 'checked' : '').'><label  for="'.$names.'"><div></div></label></div>';
	}
    
}