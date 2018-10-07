<?php
/**
 * @package DrizyPlugin
 * 
 */
namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;
use \Inc\Api\Callbacks\ManagerCallbacks;


 class Admin extends BaseController{

    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = array();
    public $subpages = array();

    public function register(){

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

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
                'option_group' => 'drizy_plugin_settings',
                'option_name' => 'cpt_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'taxonomy_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'media_widget_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'gallery_widget_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'post_and_pages_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'testimonial_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'template_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'registration_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'membership_manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
            array(
				'option_group' => 'drizy_plugin_settings',
                'option_name' => 'chat_settings',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboSanitize')
            ),
        );

        $this->settings->setSettings($args);
    }

    public function setSections(){
        $args  = array(
            array(
                'id' => 'drizy_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks_mngr, 'drizyAdminSectionManager'),
                'page' => 'drizy_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields(){
        $args  = array(
            array(
                'id' => 'cpt_manager',
                'title' => 'CPT Manager',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboxField'),
                'page' => 'drizy_plugin',
                'section' => 'drizy_admin_index',
                'args' => array(
                    'label_for'=>'cpt_manager'                    
                )
            )
            
        );
        $this->settings->setFields($args);
    }
   
 }