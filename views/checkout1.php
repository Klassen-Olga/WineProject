<div class="checkout1">
    <h1>Checkout</h1>
<div class ="register">

<form action="<?= $_SERVER['PHP_SELF'] . '?a=checkout';?>" method="POST" >
<div class="data">

    
<div class="text">
<h3>consignee </h3>
<table>
<tr><td class="tdWidth">firstname: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
<tr><td class="tdWidth">lastname: </td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
</table>
</div>
</div>


<div class="address">
    <h3>delivery address</h3>
    <div class=text>
        <label for="street">Street:</label>
        <input type="text" id="street" name="street"
        value="<?= isset($_POST['street']) ? htmlspecialchars($_POST['street']) : $this->_params['address'][0]['street']; ?>"
       required/><br>
    </div>
    
    
    
    <div class=text> 
        <div class="input">       
            <label for="zip">Zip: </label>
                    <input type="text" id="zip" name="zip"
                    value="<?= isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : $this->_params['address'][0]['zip']; ?>" required/>
                </div> <br>
            </div>
            <div class=text> 
                <label for="city">City:</label>
                <input type="text" id="city" name="city"
                value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : $this->_params['address'][0]['city'] ;?>"
                required/><br>
            </div>
            <div class="address-country">
                <label for="country">Country: </label>
                <select name="country" id="country">
                    <option value=<?=$this->_params['address'][0]['country']?>><?= isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : $this->_params['address'][0]['country'] ?></option>
                    <?php
                            $arrayCountry = ['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                            'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                            'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Croatia'];
                            foreach ($arrayCountry as $value) :?>
                                <option value="<?= $value ?>" <?= isset($_POST['country']) ? ($_POST['country'] === $value ? "selected" : '') : '' ?>><?= $value ?></option>';
                                <?php endforeach; ?>
                            </select>
                        </div>
            <br>
            <div class="gender">
                <label for="payment">payment:</label>
                <div class="radio">
                    <input type="radio" name="payMethod" value="transfer" required <?= isset($_POST['payMethod']) ? ($_POST['payMethod'] === 'tranfer' ? "checked" : '') : ''?>/>transfer
                    <input type="radio" name="payMethod" value="cash on delivery" required <?= isset($_POST['payMethod']) ? ($_POST['payMethod'] === 'cash on delivery' ? "checked" : '') : ''?>/>cash on delivery
                    <input type="radio" name="payMethod" value="paypal" required <?= isset($_POST['payMethod']) ? ($_POST['payMethod'] === 'paypal' ? "checked" : '') : ''?>/>paypal<br>
                </div>
            </div> 
            <br>
            
            <div class="button">  
                <input type="submit" name="submitCheckout" value="go to order overview">
            </div>
            
        </div>
    </form>
    
    
</div>
</div>