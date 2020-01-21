
<div class="checkout2">
<div class="fieldset">
<h1>Checkout</h1>

<h3>consignee </h3>
<br>
<table>
<tr><td class="tdWidth">firstname: </td><td><?php echo $this->_params['customer'][0]['firstName'];?></td></tr>
<tr><td class="tdWidth">lastname:</td> <td><?php echo $this->_params['customer'][0]['lastName'];?></td></tr>
<tr><td class="tdWidth">email: </td><td><?php echo $this->_params['account'][0]['email'];?></td></tr>
<tr><td class="tdWidth">phone number: </td><td><?php echo $this->_params['customer'][0]['phoneNumber']; ?></td></tr>
<tr><td class="tdWidth">date of birth: </td><td><?php echo dateOfBirthInRightOrder($this->_params['customer'][0]['dateOfBirth']);?></td></tr>
</table>

<br>
<hr>

<br>

<h3>delivery address </h3>
<br>
<table>
<tr><td class="tdWidth">zip: </td><td><?php echo $_POST['zip'];?></td></tr>
<tr><td class="tdWidth">city</td><td><?php echo $_POST['city'];?></td></tr>
<tr><td class="tdWidth">street</td><td><?php echo $_POST['street'];?></td></tr>
<tr><td class="tdWidth">country</td><td><?php echo $_POST['country'];?></td></tr>
</table>
<br>
<hr>
<br>


<h3>pay method:  </h3>
<br>
<table>
<tr><td><?php echo $_POST['payMethod'];?></td></tr>
</table>
<br> <br>

<form action="<?= $_SERVER['PHP_SELF'] . '?a=checkout';?>" method = "POST">
<div class="buttonLogin">
    <input type="submit" name="submitOrder" value="submit order">
</div>
</form>
</div>
</div>

