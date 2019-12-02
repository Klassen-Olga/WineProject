<!DOCTYPE html>
<html land="de">
                <?php require_once __DIR__ . '/../helper/functions.php';?>
    <head>
    </head>
    <body>
        <header>
            <nav>
                <a href="?a=start">Home</a>
                <a href="?a=products">Products</a>
                <a href="?a=wineInformation">Wine Information</a>
                <a href="?a=basket">Basket</a>
                <a href="?a=account">Account</a>
                <?php
                if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
                include __DIR__ . '/logout.php';
                }
                ?>
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