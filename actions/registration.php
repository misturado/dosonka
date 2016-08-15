<?php
    if($_GET['hash']) { /*если в суперглобальном массиве GET есть ячейка hash, то*/
        
        $confirm = confirm(); /*в переменную заносим результат выполнения функции*/
        
        if($confirm === TRUE) {
            $_SESSION['msg'] = 'Ваша учетная запись активирована. Можете авторизоваться на сайте.';
            header('Location:'.$_SERVER['PHP_SELF']);/*перенаправление на index.php*/
            exit();
        }
        else {
            $_SESSION['msg'] = $msg;
            header('Location:'.$_SERVER['PHP_SELF']);/*перенаправление на index.php*/
            exit();
        }
        
    }

    if (isset($_POST['reg'])) { /*выполняем проверку, были ли отправлены данные методом POST*/
        $msg = registration($_POST);
        
        if ($msg === true) {
            $_SESSION['msg'] = 'Вы успешно зарегистрировались на сайте. И для подтверждения регистрации вам на почту отправлено письмо с инструкциями';     
        }
        else {
            $_SESSION['msg'] = $msg;
        }
        
        header("Location:".$_SERVER['PHP_SELF']);
        exit;
    }
    
    $content = render(TEMPLATE."registration.tpl",array('title' => 'hello'));
?>