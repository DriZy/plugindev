<?php
/**
 * @package DrizyPlugin
 */
namespace Inc\Base;

class BaseController{
    public $plugin_url;
    public $plugin_path;
    public $plugin_basename;
    public $managers = array(); 
    
    public function __construct(){
        $this->plugin_path = plugin_dir_path(  dirname(__FILE__, 2));
        $this->plugin_url = plugin_dir_url( dirname(__FILE__, 2));
        $this->plugin_basename = plugin_basename( dirname(__FILE__, 3)).'/drizy-plugin.php';

        $this->managers = array(
            'cpt_manager' => 'CPT Manager',
            'taxonomy_manager' => 'Taxonomy Manager',
            'media_widget_manager' => 'Media Widget Manager',
            'gallery_widget_manager' => 'Gallery Widget Manager',
            'testimonial_manager' => 'Testimonial Manager',
            'template_manager' => 'Templates Manager',
           ' registration_manager' => 'Registration Manager',
            'membership_manager' => 'Membership Manager',
           ' chat_settings' => 'Chat Manager'
        );
    }
}