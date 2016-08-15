<?php
    header("Content-type:text/html; charset=UTF-8");
    
    session_start();
    
    require_once("config.php");
    require_once("functions.php");

    db(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//    $categories = 
//    $razd = 
//    $user = 

    $action = clear_str($_GET['action']); /*очистка переменной суперглобального массива GET, чтобы избужеать выполнениям вредоносного кода*/
    
    if (!$action) {
        $action = 'main'; /*если не указан action, выводим main, как action по-умолчанию*/
    }

    if (file_exists(ACTIONS.$action.".php")) {
        include ACTIONS.$action.".php";
    }
    else {
        include ACTIONS."main.php";
    }

    require_once (TEMPLATE.'/index.php');
?>