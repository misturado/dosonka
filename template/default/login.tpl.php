<h1>Авторизуйтесь</h1>
    <?=$_SESSION['msg'];?>
    <? unset($_SESSION['msg']); ?>
    <form method="post">
        <label for="">
            Login<br>
            <input type="text" name="login">             
        </label><br>
        Password<br>
        <label for="">
            <input type="password" name="password">
        </label><br>
        <label>Member
           <input type="checkbox" name="member" value="1">            
        </label><br>
        <input type="submit" style="float:left" value="Вход">
        
    </form>