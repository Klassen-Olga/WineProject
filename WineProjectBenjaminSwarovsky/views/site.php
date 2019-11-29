
<nav>
        <ul>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=start">startsite</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=basket">basket</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=login">login</a></li>
           
        </ul>
        <form action="<?=$_SERVER['PHP_SELF'].'?p=user';?>" method="post">
            <input type="submit" name="submitLogout" value="logout">
        </form>
    </nav>