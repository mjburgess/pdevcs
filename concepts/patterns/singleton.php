<?php

class SingleInstance {
    private static $instance;
        public static function GetInstance() {
            if(!self::$instance instanceof SingleInstance) {
                self::$instance = new SingleInstance();
            }
        }
        
    public function api();
}


SingleInstance::GetInstance()->api();



