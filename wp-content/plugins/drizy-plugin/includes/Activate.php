<?php
/**
 * Created by PhpStorm.
 * User: drizy
 * Date: 9/5/18
 * Time: 8:52 AM
 *
 * @package DrizyPlugin
 */
namespace Inc;

class Activate{
    public static function activate(){
            flush_rewrite_rules();
    }
}