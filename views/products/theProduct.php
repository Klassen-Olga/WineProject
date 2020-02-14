<?php
$id = $_GET['i'];
$query = \skwd\models\AllProducts::find("productID=" . $id);
$pictures = \skwd\models\Picture::find("productID=" . $id);
$product = \skwd\models\Product::find("id= " . $id);
$priceOfProduct = $product[0]['standardPrice']-($product[0]['standardPrice']*$product[0]['discount']/100);
if (count($product) !== 0):
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
                    <?php foreach ($query as $key => $value): ?>
                        <tr>
                            <td><?php echo $query[$key]['name'] ?></td>
                            <td><?= $query[$key]['value']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <img src="assets/images/backgroundTheProduct/fruits.jpg" style="width:100%; height: 100px"/>
            </div>
        <?php endif; ?>
        <div class="price-add-to-basket-theProduct">
            <p>Price: <?= $product[0]['standardPrice'] . ' €' ?></p>

            <iframe name="hiddenFrame" class="hide"></iframe>
            <form action="?c=pages&a=shoppingCartShow&i=<?= $product[0]['id'] ?>&p=<?= $priceOfProduct ?>"
                  method="post" <?= usersIdIfLoggedIn() === null ? "" : "target=\"hiddenFrame\"" ?> >
                <button type="submit">Add to basket</button>
            </form>

        </div>
        <div class="theProduct-description">
            <h3>Description:</h3>
            <?= $product[0]['description'] ?>
        </div>
    </section>
<?php else: ?>
    <p>This product is missing</p>
<?php endif; ?>
