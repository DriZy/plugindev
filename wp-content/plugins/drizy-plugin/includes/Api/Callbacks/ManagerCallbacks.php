<?php
/**
 * @package DrizyPlugin
 */
namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;

class ManagerCallbacks extends BaseController{
    
    
    public function drizyCheckboxSanitize($input){
        // return filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        $output = array();

        foreach ($this->managers as $key => $value) {
            $output[$key] = isset ($input[$key]) ? true : false ;
        }
        return $output;
    }

    public function drizyAdminSectionManager(){
        echo 'Click on checkboxes to activate and manage plugin features';
    }
   
    public function drizyCheckboxField($args)	{
        // var_dump($args);
		$names = $args['label_for'];
        $classes = $args['class'];
        $option_name = $args['option_name'];
        $checkbox = get_option($option_name);
        
        $checked = isset($checkbox[$names]) ? ($checkbox[$names] ? true : false) : false;
		echo '<div class="'.$classes.'"><input type="checkbox" id="'.$names.'" name="'.$option_name.'['.$names.']"  value="1" '.( $checked ? 'checked' : '').'><label  for="'.$names.'"><div></div></label></div>';
	}
    
}