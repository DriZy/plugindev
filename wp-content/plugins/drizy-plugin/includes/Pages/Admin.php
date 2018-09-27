<?php
/**
 * @package DrizyPlugin
 * 
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;


 class Admin extends BaseController{

    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    public function register(){

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();
     
        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->addSubPages( $this->subpages )->register();    }

    public function setPages(){
        $this->pages = array(
            
            array(
                'page_title' => 'Drizy Plugin', 
                'menu_title' => 'Drizy',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 110
            )
        );
    }

    public function setSubPages(){
        $this->subpages = array(
            array(
                'parent_slug' => 'drizy_plugin',
                'page_title' => 'Custom Post Type', 
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_cpts',
                'callback' => array( $this->callbacks, 'cptDashboard' )
            ),
            array(
                'parent_slug' => 'drizy_plugin',
                'page_title' => 'Custom Taxonomy', 
                'menu_title' => 'Taxonomy',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_taxonomies',
                'callback' => array( $this->callbacks, 'ctDashboard' )
            ),
            array(
                'parent_slug' => 'drizy_plugin',
                'page_title' => 'Widget', 
                'menu_title' => 'Widget',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_widgets',
                'callback' => array( $this->callbacks, 'widgetDashboard' )
            )
        );
    }

    public function setSettings(){
        $args  = array(
            array(
                'option_group' => 'drizy_options_group',
                'option_name' => 'field_example',
                'callback' => array($this->callbacks, 'drizyOptionsGroup')
            ),
            array(
				'option_group' => 'drizy_options_group',
				'option_name' => 'first_name'
			)
        );

        $this->settings->setSettings($args);
    }

    public function setSections(){
        $args  = array(
            array(
                'id' => 'drizy_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'drizyAdminSection'),
                'page' => 'drizy_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields(){
        $args  = array(
            array(
                'id' => 'field_example',
                'title' => 'Text Field',
                'callback' => array($this->callbacks, 'drizyFieldExample'),
                'page' => 'drizy_plugin',
                'section' => 'drizy_admin_index',
                'args' => array(
                    'label_for'=>'field_example',
                    'class'=>'example-class'
                )
            ),
            array(
				'id' => 'first_name',
				'title' => 'First Name',
				'callback' => array( $this->callbacks, 'drizyFirstName' ),
				'page' => 'drizy_plugin',
				'section' => 'drizy_admin_index',
				'args' => array(
					'label_for' => 'first_name',
					'class' => 'example-class'
				)
			)
        );
        $this->settings->setFields($args);
    }
   
 }