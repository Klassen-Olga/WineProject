<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles/style1.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
</head>
<body>
<header>
    <a class="logo1" href="?a=start">
    <img  src="assets/styles/weinhandel.jpg" alt="">
    </a>

</header>

<ul class="menu" id="myTopnav">
    <li><a class="home-icon" href="?a=start"><i class="fa fa-home"></i></a></li>
    <li><a href="?a=wineInformation">Wine Guide</a></li>
    <li><a href="?c=pages&a=shoppingCartShow">Basket</a></li>
    <li><a href="?c=products&a=allProducts" onclick="tabChange(this)">Products</a>
        <ul>
            <li><a href="?c=products&a=allProducts">All</a></li>
            <li><a href="?c=products&a=category&s=Red%20Wine">Red wines</a></li>
            <li><a href="?c=products&a=category&s=White%20Wine">White wines</a></li>
            <li><a href="?c=products&a=category&s=Rose%20Wine">Rose wines</a></li>
            <li><a href="?c=products&a=category&s=Sparkling%20Wine">Sparkling wines</a></li>
            <li><a href="?c=products&a=category&s=Accessory">Accessories</a></li>
        </ul>

    </li>

        <?php

        if (isset($_SESSION['id'])) {
            include __DIR__ . '/logout.php';
        } else if (isset($_COOKIE['id'])) {
            include __DIR__ . '/logout.php';
        }
        ?>


    <!--Account -->
    <li><a href="#" onclick="tabChange(this)">Account</a>
        <ul>
            <?php if (getAccountId() !== null): ?>
                <li><a href="?c=accounts&a=personalData"> Personal data</a></li>
                <li><a href="?c=accounts&a=myOrders"> My orders</a></li>

            <?php else: ?>
                <li><a href="?a=login">Login</a></li>
                <li><a href="?a=register">Sign-Up</a></li>
            <?php endif; ?>
        </ul>
    </li>
    <li class="responsive-class-icon"><a href="javascript:void(0);"onclick="responsiveNav()">
            <i class="fa fa-bars"></i></a></li>

</ul>

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
    <div class="footer1">
    <?php if(isset($_GET['a'])&&$_GET['a']=='imprint'):?>
    <a href="?a=privacyPolicy"> Privacy Policy</a>
    <?php elseif(isset($_GET['a'])&&$_GET['a']=='privacyPolicy'):?>
    <a href="?a=imprint">Imprint </a>
    <?php else:?>
   <a href="?a=imprint">Imprint </a> | <a href="?a=privacyPolicy"> Privacy Policy</a>
    <?php endif; ?>
    <script src="assets/js/main2.js"></script>
    </div>
</footer>
</body>
</html>
