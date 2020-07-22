<?php

    //Função spl_autoload_register()
    //Carregamento de uma classe quando a mesma é necessário, ou seja, instanciada
    
    function MyAutoload($className) {
    
        $extension =  spl_autoload_extensions();
        require_once (__DIR__ . '/' . $className . $extension);
    
    }

    spl_autoload_extensions('.class.php');
    spl_autoload_register('MyAutoload');

?>