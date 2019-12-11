<!DOCTYPE html>
<html lang="de">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href ="assets/styles/styles.css" type="text/css">
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
            </nav>
        </header>
        <main>
            <?php
            if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
                include __DIR__ . '/logout.php';
            }
            else if(isset($_COOKIE['logged']) && $_COOKIE['logged']==='isLogged'){
                include __DIR__ . '/logout.php';
            }
            ?>
            <div class="error">
            <?php
            if (isset($this->_params['error'])){
                foreach ($this->_params['error'] as $value) {
                    echo nl2br($value . "\r\n");
                }
            }
            ?>
            </div>
            <?php echo $body;?>

        </main>
        <footer>
            <a href="?a=imprint">Imprint</a>
        </footer>
    </body>
</html>