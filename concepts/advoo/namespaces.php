<?php

//pre 5.3
class OD_Folder_File {
    public function api() {}
}


//Folder/File.php
namespace OD\Folder; 

class File {
    public function __construct() {
        echo 'Hello World!';
    }
}


//anyfile.php
namespace OD;

$f = new Folder\File();


//anyotherfile.php
namespace OD;

use OD\Folder\File;

$f = new File;