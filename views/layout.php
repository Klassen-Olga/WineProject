<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style.css" type="text/css">
    <script src="assets/js/script.js"></script>
</head>
<body>
<header>

</header>
<nav>
    <ul>
        <li><a href="?a=start">Home</a></li>
        <li><div class="dropdown-products">
                <button class="products">Products</button>
                <div class="products-content">
                    <a href="?c=products&a=allProducts">All</a>
                    <a href="?c=products&a=category&s=Red%20Wine">Red wines</a>
                    <a href="?c=products&a=category&s=White%20Wine">White wines</a>
                    <a href="?c=products&a=category&s=Rose%20Wine">Rose wines</a>
                    <a href="?c=products&a=category&s=Sparkling%20Wine">Sparkling wines</a>
                    <a href="?c=products&a=category&s=Accessory">Accessories</a>
                </div>
            </div></li>
        <li><a href="?a=wineInformation">Wine Information</a></li>
        <li><a href="?a=shoppingCartShow">Basket</a></li>
        <li><a href="?a=account">Account</a></li>
    </ul>
</nav>
<main>
    <?php
    if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
        include __DIR__ . '/logout.php';
    } else if (isset($_COOKIE['logged']) && $_COOKIE['logged'] === 'isLogged') {
        include __DIR__ . '/logout.php';
    }
    ?>
    <div class="error">
        <?php
        if (isset($this->_params['error'])) {
            foreach ($this->_params['error'] as $value) {
                echo nl2br($value . "\r\n");
            }
        }
        ?>
    </div>
    <?php echo $body; ?>

</main>
<footer>
    <a href="?a=imprint">Imprint</a>
</footer>
</body>
</html>