<?php
class Cookie{

    static function set($name, $id, $separate,$key,$expire){
        setcookie($name, $id.$separate.$key, time() + 3600 * 24 * $expire, '/', 'localhost', false, true);
    }

    static function delete($name){
        setcookie($name, '', time() - 3600, '/', 'localhost', false, true);

    }

    static function getCookie($name){
        if(isset($_COOKIE[$name])){
            return $_COOKIE[$name];
        }
        return false;

    }
}

