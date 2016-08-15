<?php
    function db($host,$user,$pass,$db_name) {
        $db = mysql_connect($host,$user,$pass);
        if (!$db) {
            exit(mysql_error());
        }
        
        if (!mysql_select_db($db_name,$db)) {
            exit(mysql_error());    
        }
        
        mysql_query("SET NAMES UTF8");
    }
        
    function clear_str($str) {
        return trim(strip_tags($str)); /*strip_tags убирает лишние теги, trim удаляет лишние пробелы*/
    }

    function render($path,$param = array()) { /*функция выводит содержимое страницы и передает параметры*/
        extract($param); /*функция превращает массив в набор переменных, соответствующих параметрам и значениям массива*/
        
        ob_start(); /*буферизированный вывод???*/
        
        if (!include($path.'.php')) {
            exit('нет такого шаблона');
        }
        
        return ob_get_clean();
    }

    function registration($post) {
        
        $login = clear_str($post['reg_login']);/*присваеваем данные полей формы регистрации переменным*/
        $password = trim($post['reg_password']);
        $conf_pass = trim($post['reg_password_confirm']);
        $email = clear_str($post['reg_email']);
        $name = clear_str($post['reg_name']);
        
        $msg = '';
        
        if(empty($login)) { /*проверка заполненности полей формы*/
            $msg .= "Введите логин <br />";
        }
        
        if(empty($password)) {
            $msg .= "Введите пароль <br />";
        }
        
        if(empty($email)) {
            $msg .= "Введите адрес почтового ящика <br />";
        }
        
        if(empty($name)) {
            $msg .= "Введите имя <br />";
        }
        
        if ($msg) { /*если какое-то поле не заполнено, вывести сообщение о необходимости его заполнения*/
            $_SESSION['reg']['login'] = $login;
            $_SESSION['reg']['email'] = $email;
            $_SESSION['reg']['name'] = $name;
            return $msg;
        }
        
        if ($conf_pass == $password) { /*проверка совпадения полей подтверждения пароля и пароля, если поля совпдаают, проверяем, нет ли такого логина в базе*/
            $sql = "SELECT user_id FROM ".PREF."users WHERE login='%s'";
            $sql = sprintf($sql,mysql_real_escape_string($login));
            
            $result = mysql_query($sql);
            
            if (mysql_num_rows($result) > 0) {
                $_SESSION['reg']['email'] = $email;
                $_SESSION['reg']['name'] = $name;
                
                return 'Пользователь с таким логином уже существует';
            }
            
            $password = md5($password);
            $hash = md5(microtime());
            
            $query = "INSERT INTO ".PREF."users (name,email,password,login,hash) VALUES ('%s','%s','%s','%s','$hash')";            
            $query = sprintf($query, mysql_real_escape_string($name), mysql_real_escape_string($email), $password, mysql_real_escape_string($login));
            
            $result2 = mysql_query($query);
            
            if(!$result2) {/*если ошибки не возникает, отправляем пользователю письмо*/
                $_SESSION['reg']['login'] = $login;
                $_SESSION['reg']['email'] = $email;
                $_SESSION['reg']['name'] = $name;
                return 'Ошибка при добавлении пользователя в базу данных'.mysql_error();
            }
            else {
                $headers = '';
                $headers .= 'From: Admin <admin@mail.ru \r\n>';
                $headers .= 'Content-Type: text/plain; charset=utf8';
                
                $tema = 'registration';
                
                $mail_body = 'Спасибо за регистрацию на сайте. Ваша ссылка для подтверждения учетной записи: '.SITE_NAME.'?action=registration&hash='.$hash;
                
                mail($email,$tema,$mail_body,$headers);
                
                return TRUE;
            }
            
        }
        else {
                $_SESSION['reg']['login'] = $login;
                $_SESSION['reg']['email'] = $email;
                $_SESSION['reg']['name'] = $name;
                return 'Вы неправильно подтвердили пароль';
        }
            
            
        }
        
    function confirm() {
        $new_hash = clear_str($_GET['hash']);
        
        $query = "UPDATE ".PREF."users SET confirm='1' WHERE hash = '%s'";
        
        $query = sprintf($query,mysql_real_escape_string($new_hash));
        
        $result1 = mysql_query($query);
        
        if(mysql_affected_rows() == 1) {
            return TRUE;
        }
        else {
            return "Неверный код подстверждения";
        }
        
    }
?>