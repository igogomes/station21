<?php

    //Função spl_autoload_register()
    //Carregamento de uma classe quando a mesma é necessário, ou seja, instanciada
    
    spl_autoload_register(function ($class) {
    
        require_once(str_replace('\\', '/', 'classes/' .$class . '.class.php'));

    });

?>