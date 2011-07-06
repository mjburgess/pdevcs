<?php

interface IProduct {
  public function api();
}

class Pen implements IProduct {
    public function api() {}
}
class Paper implements IProduct {
    public function api() {}
} 
//...


class ProductFactory {
    public static function GetPaper() {
        return new Paper();
    }
    
    public static function GetPen() {
        return new Pen();
    }
    
    //...
}

ProductFactory::GetPaper()->api();


