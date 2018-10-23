<?php
/**
 * @package DrizyPlugin
 */
namespace Inc\Base;

use \Inc\Api\SettingsApi;
use Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;


class CPTController extends BaseController{
    
    public $callbacks;

    public $subpages = array();

    public function register(){


        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setSubPages();

        $this->settings->addSubPages( $this->subpages )->register();

        add_action('init', array( $this, 'activate'));
    }

    public function setSubPages(){
        $this->subpages = array(
            array(
                'parent_slug' => 'drizy_plugin',
                'page_title' => 'Custom Post Type', 
                'menu_title' => 'CPT Manager',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_cpts',
                'callback' => array( $this->callbacks, 'cptDashboard' )
            )
        );
    }

    public function activate(){
        register_post_type( 'drizy_products', 
            array(
                'labels' => array(
                    'name' => 'Products',
                    'singular_name' => 'Product'
                ),
                'public' => true,
                'has_archive' => true
            ) 
        );
    }
}