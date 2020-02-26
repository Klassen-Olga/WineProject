<?php
$product = $this->_params['products'];
if ($product !== false):
    $query = $this->_params['query'];
    $pictures =  $this->_params['pictures'];
    $priceOfProduct=$product[0]['standardPrice'];
    if ($product[0]['discount']!==null){
        $priceOfProduct = $product[0]['standardPrice']-($product[0]['standardPrice']*$product[0]['discount']/100);
    }
    ?>
    <h2><?= $product[0]['prodName'] ?></h2><br>
    <section class="max-section">
        <?php if (count($pictures) !== 0): ?>
            <div class="image-theProduct">
                <?php foreach ($pictures as $key => $value): ?>
                    <img class="image-theProduct" src="<?= $value['path'] ?>">
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if (count($query) !== 0): ?>
            <div class="table-theProduct">
                <table>
                    <?php foreach ($query as $key => $value):
                        $name=preg_replace('/(?<!^)([A-Z])/', ' \\1', $query[$key]['name']);
                        $name=strtolower($name);
                        ?>
                        <tr>
                            <td><?php echo ucfirst($name); ?></td>
                            <td><?= $query[$key]['value'].metaToProducts($query[$key]['name']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <img src="assets/images/backgroundTheProduct/fruits.jpg" style="width:100%;"/>
            </div>
        <?php endif; ?>
        <div class="price-add-to-basket-theProduct">
            <p>Price: <?= $priceOfProduct . ' €' ?></p>
            <form action="?c=pages&a=shoppingCartShow&i=<?= $product[0]['prodId'] ?>"
                  method="post">
                <input type="submit" value="Add to basket" onclick="preventDefaultAndUseAjax(event, <?=$product[0]['prodId']?>)"/>
            </form>

        </div>
        <div class="theProduct-description">
            <h3>Description:</h3>
            <?= $product[0]['description'] ?>
        </div>
    </section>
<?php else: ?>
    <h3 class="noProd">This product is missing</h3>
<?php endif; ?>
