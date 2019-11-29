<!DOCTYPE html>
<html land="de">
    <head>
    </head>
    <body>
        <header>
            <nav>
                <a href="?a=start">Home</a>
                <a href="?a=products">Products</a>
                <a href="?a=wineInformation">Wine Information</a>
                <?php if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) : ?>
                <li><a href="?a=logout">Logout</a></li>
                <?php endif; ?>
                <a href="?a=basket">Basket</a>
                <a href="?a=account">Account</a>
            </nav>
        </header>
        <main>
            <?php echo $body;?>
        </main>
        <footer>
            <a href="?a=imprint">Imprint</a>
        </footer>
    </body>
</html>