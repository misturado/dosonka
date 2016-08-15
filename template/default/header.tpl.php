<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=SITE_NAME_HEADER;?></title>
    
    <link rel="stylesheet" href="<?=TEMPLATE;?>css/style.css">
</head>
<body>
    <div id="main">
        <header>
            <h1>Доска объявлений</h1>
        </header>
        <div id="login">
           <? if(!$user): ?> <!--если пользователь не авторизован, выводим ссылки на вход и регистрацию-->
               <a href="?action=login">Вход</a> 
               |
               <a href="?action=registration">Регистрация</a>
            <? else: ?>
                Добро пожаловать [<?=$user['name'];?>] | <a href="?action=login&logout=1">Выход</a>
            <? endif; ?>
            
            
        </div>