<?php 
/**
 * @package DrizyPlugin
 */

 namespace Inc\Base;
 use \Inc\Base\BaseController;

 class EditLink extends BaseController{
    public function register(){
        add_filter("plugin_action_links_$this->plugin_basename", array($this, 'edit_link'));
    }
    
    public function edit_link($links){
        // add custom settings link
        $edit_link = '<a href = "admin.php?page=drizy_plugin">Edit</a>';
        array_push($links, $edit_link);
        return $links;
    }
 }