<?php 

/**
 * 
 *@package DrizyPlugin
 *  
 */

 namespace Inc;

 final class Init{

    /**
     *  Store all ther classes inside an array
     * @return array of classes
     */

    public static function get_services(){
        return [
            Pages\Dashboard::class,
            Base\Enqueue::class,
            Base\EditLink::class,
            Base\SettingsLink::class,
            Base\CPTController::class
           
        ];
    }

    /**
     * Loops through the classes, innitialize them and call the register() method if it exist
     */
    public static function register_services(){
         foreach (self::get_services() as $class) {
             $service = self::instantiate($class);
             if (method_exists($service,'register')) {
                $service-> register();
             }
         }
    }

    /**
     * Initialize the class
     * @param class $class class from the service array
     * @return class instance, the new instance of the class
     */

    private static function instantiate($class){
        $service = new $class();
        return $service;
    }
 }




 
//  use Inc\Pages\Dashboard;
 
 
//  //Checking if plugin exist before registering it
//  if (!class_exists('DrizyPlugin' )){
 
//      class DrizyPlugin{
 
//          public $pluginName;
         
//          //constructor methods
//          function __construct(){
 
//              $this->pluginName = plugin_basename(__FILE__);
//          }
 

//          function uninstall(){
//              //delete custom post type
//          }
 
//          protected function create_post_type(){
//              add_action('init', array($this, 'custom_post_type'));
//          }
 
 
//          function custom_post_type(){
//              register_post_type('book', [
//                  'public'=> true,
//                  'label'=>'Books'
//              ]);
//          }
 
//      }
 
 
//          $drizyPlugin = new DrizyPlugin();
//          $drizyPlugin-> register();
 
 
//  }