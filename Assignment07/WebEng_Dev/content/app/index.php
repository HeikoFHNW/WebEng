<?php

/**
 * diese Funktion nimmt den Link und ruft die gewünschte Seite auf.
 */
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    if(!isset($_SESSION['login_user']))
    {
        $controller = 'User';
        $action = 'loginShow';
        
    }
    $controller = 'Homepage';
    $action = 'show';
}

require_once('../app/layout.php');