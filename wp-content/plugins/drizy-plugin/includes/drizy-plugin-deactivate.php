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

class DrizyPluginDeactivate{
    public static function deactivate(){
        flush_rewrite_rules();
    }
}