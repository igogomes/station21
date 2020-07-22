<?php

    //Função spl_autoload_register()
    //Carregamento de uma classe quando a mesma é necessário, ou seja, instanciada
    
    function MyAutoload($className) {
    
        $extension =  spl_autoload_extensions();
        require_once(str_replace('\\', '/', 'classes/' . $className . $extension));
    
    }

    spl_autoload_extensions('.class.php');
    spl_autoload_register('MyAutoload');

?>