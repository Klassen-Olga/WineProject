<form action="<?= $_SERVER['PHP_SELF'] . '?a=personalData&c=accounts&j=test1'; ?>" method="POST">
<fieldset>
<legend>change address</legend>
<label for="country">Country:<br>
            <select name="country" id="country">
                <option value="Country"><?= isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : 'Country' ?></option>
                <?php
                $arrayCountry = ['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                    'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                    'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Croatia'];
                foreach ($arrayCountry as $value) :?>
                    <option value="<?= $value ?>" <?= isset($_POST['country']) ? ($_POST['country'] === $value ? "selected" : '') : '' ?>><?= $value ?></option>';
                <?php endforeach; ?>
            </select>
<br>
<br>
<label for="zip">Zip:</label><br>
        <input type="text" id="zip" name="zip"
               value="<?= isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : '' ?>" required/><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"
               value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '' ?>"
               required/><br>
        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street"
               value="<?= isset($_POST['street']) ? htmlspecialchars($_POST['street']) : '' ?>"
               required/><br>

 <input type="submit" value="submit edit" name="submitEditAddress">
</fieldset>
</form>