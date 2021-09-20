<?php
    spl_autoload_register('autoLoad');
    
    function autoLoad($className){
        $url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        $path = strpos($url, "endpoints")? "../classes/":"classes/";
        $ext = ".class.php";
        $mainPath = $path.$className.$ext;
        if(!file_exists($mainPath)){
            return false;
        }
        include $mainPath;
    }

?>