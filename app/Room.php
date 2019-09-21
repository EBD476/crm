<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 08/10/2018
 * Time: 10:17 PM
 */

namespace App;


class Room
{
    private $room_name;
    private $room_type;
    private $light_module;
    private $room_image;

    public function getRoomName(){
        return $this->room_name;
    }

    public function setRoomName($value){
        $this->room_name = $value;
    }

    public function setRoomType($value){
        $this->room_type = $value;
    }

    public function getLights(){
        return $this->light_module;
    }

    public function setLights($value){
        $this->light_module = $value;
    }

    public function setRoomImage($value){
        $this->room_image = $value;
    }

    public function getRoomImage(){
        return $this->room_image;
    }

    public function toJson(){
        return json_encode(get_object_vars($this));
    }

}