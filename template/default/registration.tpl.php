<h1>Регистрация</h1>

<?=$_SESSION['msg'];?>
<? unset($_SESSION['msg']); ?>

<form method="post">
   Логин<br>
   <input type="text" name="reg_login" value="<?=$_SESSION['reg']['login'];?>">
   <br>
   Пароль<br>
   <input type="password" name="reg_password">
   <br>
   Подтвердите пароль<br>
   <input type="password" name="reg_password_confirm">
   <br>
   Почта<br>
   <input type="text" name="reg_email" value="<?=$_SESSION['reg']['email'];?>">
   <br>
   Имя<br>
   <input type="text" name="reg_name" value="<?=$_SESSION['reg']['name'];?>">
   <br>
   <input type="submit" style="float:left;" name="reg" value="Регистрация">
    
</form>