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
     
        $this->settings->addPages( $this->pages )->withSubPage('Dashboard')->addSubPages( $this->subpages )->register();    
    }

    public function setPages(){
        $this->pages = array(
            
            array(
                'page_title' => 'Drizy Plugin', 
                'menu_title' => 'Drizy',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_plugin',
                'callback' => array( $this->callbacks, 'adminDashboard' ),
                'icon_url' => 'dashicons-store',
                'position' => 99
            )
        );
    }

    public function setSubPages(){
        $this->subpages = array(
            array(
                'parent_slug' => 'Drizy Plugin',
                'page_title' => 'Modular Administration Area', 
                'menu_title' => 'MAA',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_maa',
                'callback' =>array( $this->callbacks, 'adminDashboard' )
            ),
            array(
                'parent_slug' => 'Drizy Plugin',
                'page_title' => 'Custom Post Type', 
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_cpt',
                'callback' => array( $this->callbacks, 'cptDashboard' )
            ),
            array(
                'parent_slug' => 'Drizy Plugin',
                'page_title' => 'Custom Taxonimy', 
                'menu_title' => 'Taxonimy',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_taxonimy',
                'callback' => array( $this->callbacks, 'ctDashboard' )
            ),
            array(
                'parent_slug' => 'Drizy Plugin',
                'page_title' => 'Widdget', 
                'menu_title' => 'Widdget',
                'capability' => 'manage_options',
                'menu_slug' => 'drizy_widdget',
                'callback' => array( $this->callbacks, 'widgetDashboard' )
            )
        );
    }
   
 }