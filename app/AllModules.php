<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 13/10/2018
 * Time: 08:48 PM
 */

namespace App;


use Illuminate\Support\Facades\Session;

class  AllModules
{
    private static $modules;
    public static $lights = 0;

    public static function getModules(){
//        return self::$modules;
        return session('modules');
    }

    public static function setModules($value){
        $current_modules = self::getModules();
        if (isset($current_modules)) {
            if (is_array($current_modules)) {
//                $room_name = $value->getRoomName();
                array_push($current_modules,  $value->toJson());
            } else{
                $current_modules = array($current_modules);
                array_push($current_modules, $value->toJson());
            }
        } else {
            $current_modules = array($value->toJson());
        }
        Session::put('modules',$current_modules);
    }

    public static function setModulesById($id , $value){
        $current_modules = self::getModules();
//        $current_modules[$id] = str_replace('"[','[',stripslashes(json_encode($value)));
//        $current_modules[$id] = str_replace( ']"',']', $current_modules[$id]);
        $current_modules[$id] = stripslashes(json_encode($value, JSON_UNESCAPED_UNICODE)) ;
        Session::put('modules',$current_modules);
    }

    public static function setJsonModule($json_module){
        Session::put('modules',$json_module);
    }

    public function getModuleByRoomName($room_name){

    }


}