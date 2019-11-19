<header>
    <nav>
        <ul>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=start">startsite</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=basket">basket</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=login">login</a></li>
            <li><a href="<?=$_SERVER['SCRIPT_NAME']?>/?p=.....">Beispielseite</a></li>
        </ul>
        <form action="<?=$_SERVER['PHP_SELF'].'?p=user';?>" method="post">
            <input type="submit" name="submitLogout" value="logout">
        </form>
    </nav>
</header>

<main>

<?
switch($page){
    case 'login':
       
        include VIEWPATH.'pages/login.php';
    break;
    case 'my_orders':
        include VIEWPATH.'pages/my_orders.php';
    break;
    case 'page2':
        include VIEWPATH.'pages/page2.php';
    break;
    case 'page3':
        include VIEWPATH.'pages/page3.php';
    break;

    // ............................

    default :
        echo 'error 404';
    break;
}
?>

</main>

<footer>

</footer>