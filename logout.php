<?php

    session_start();
    ob_start();
    $_SESSION = array();
    session_destroy();
    
    header("Location: login");

?>