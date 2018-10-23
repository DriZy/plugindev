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


 class Dashboard extends BaseController{

    public $settings;
    public $callbacks;
    public $callbacks_mngr;
    public $pages = array();
    // public $subpages = array();

    public function register(){

        $this->settings = new SettingsApi();

        $this->callbacks = new AdminCallbacks();

        $this->callbacks_mngr = new ManagerCallbacks();

        $this->setPages();

        // $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();
     
        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )->register();    }

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

    // public function setSubPages(){
    //     $this->subpages = array(
    //         array(
    //             'parent_slug' => 'drizy_plugin',
    //             'page_title' => 'Custom Post Type', 
    //             'menu_title' => 'CPT',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'drizy_cpts',
    //             'callback' => array( $this->callbacks, 'cptDashboard' )
    //         ),
    //         array(
    //             'parent_slug' => 'drizy_plugin',
    //             'page_title' => 'Custom Taxonomy', 
    //             'menu_title' => 'Taxonomy',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'drizy_taxonomies',
    //             'callback' => array( $this->callbacks, 'ctDashboard' )
    //         ),
    //         array(
    //             'parent_slug' => 'drizy_plugin',
    //             'page_title' => 'Widget', 
    //             'menu_title' => 'Widget',
    //             'capability' => 'manage_options',
    //             'menu_slug' => 'drizy_widgets',
    //             'callback' => array( $this->callbacks, 'widgetDashboard' )
    //         )
    //     );
    // }

    public function setSettings(){
        //innitializing the args array for the setSettings function
        $args  = array(
            array(
                'option_group' => 'drizy_plugin_settings',
                'option_name' => 'drizy_plugin',
                'callback' => array($this->callbacks_mngr, 'drizyCheckboxSanitize')
            )    
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
        
        //innitializing the args array for the setSettings function
        $args  = array();
        //looping through the managers array to get the option_name and set the settings for the field
        //key equals managers array index, seSettings option_name the setField id and the setFields args array label value.
        foreach ($this->managers as $key => $value) {
            $args[] = array(
                'id' => $key,
                'title' => $value,
                'callback' => array( $this->callbacks_mngr, 'drizyCheckboxField'),
                'page' => 'drizy_plugin',
                'section' => 'drizy_admin_index',
                'args' => array (
                    'option_name' => 'drizy_plugin',
                    'label_for' => $key,
					'class' => 'ui-toggle'
                )
            );
        }
        $this->settings->setFields( $args );
    }
   
 }