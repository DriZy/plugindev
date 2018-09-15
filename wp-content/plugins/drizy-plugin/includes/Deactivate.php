<?php
/**
 * Created by PhpStorm.
 * User: drizy
 * Date: 9/5/18
 * Time: 8:52 AM
 *
 * @package DrizyPlugin
 *
 */
namespace Inc;

class Deactivate{
    public static function deactivate(){
        flush_rewrite_rules();
    }
}