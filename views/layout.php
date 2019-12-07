<!DOCTYPE html>
<html land="de">

    <head>
       <!-- <link rel="stylesheet" href ="./assets/styles/styles.css" type="text/css">-->
    </head>
    <body>
        <header>
            <nav id="nav1">
                <div class="links">
                <a href="?a=start">Home</a>
                <a href="?a=products">Products</a>
                <a href="?a=wineInformation">Wine Information</a>
                <a href="?a=basket">Basket</a>
                <a href="?a=account">Account</a>
                </div>
                <?php
                if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
                include __DIR__ . '/logout.php';
                }
                if (isset($this->_params['error'])){
                    foreach ($this->_params['error'] as $value) {
                        echo nl2br($value . "\r\n");
                    }
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