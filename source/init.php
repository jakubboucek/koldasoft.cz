<?php

function __autoload($class_name) {
    $class_norm_name = strtolower($class_name);
    $file_path = CLASS_PATH."$class_norm_name.php";
    
    //Povolit v případě započetí používání classes
    //if(!file_exists($file_path))
      //throw new FileNotFoundException("Pro požadovanou třídu $class_name nebyl nalezen odpovídající zdrojový soubor ($file_path).");

    require_once ($file_path);
}

//Načtení správce výjimek
//require_once(CLASS_PATH.'exceptions.php');

//Načtení globálních funkcí, které nevyžadují objekty
//require_once(INCLUDE_PATH.'func.php');

