<form action="<?= $_SERVER['PHP_SELF'] . '?a=personalData&c=accounts&j=test1'; ?>" method="POST">
    <fieldset>
        <legend>change address</legend>
        <div>
            <label for="country">Country</label>:<br>
            <select name="country" id="country">
                <option value=<?= $this->_params['address'][0]['country'] ?>><?= isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : $this->_params['address'][0]['country'] ?></option>
                <?php
                $arrayCountry = ['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                    'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                    'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Croatia'];
                foreach ($arrayCountry as $value) :?>
                    <option value="<?= $value ?>" <?= isset($_POST['country']) ? ($_POST['country'] === $value ? "selected" : '') : '' ?>><?= $value ?></option>    ;
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="zip">Zip:</label><br>
            <input type="text" id="zip" name="zip"
                   value="<?= isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : $this->_params['address'][0]['zip']; ?>"
                   onchange="validateLength(this)" required/><br>
        </div>
        <div>
            <div>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"
               value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : $this->_params['address'][0]['city']; ?>"
               required onchange="validateLength(this)"/><br>
            </div>
            <div>
        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street"
               value="<?= isset($_POST['street']) ? htmlspecialchars($_POST['street']) : $this->_params['address'][0]['street']; ?>"
               required onchange="validateLength(this)"/><br>
            </div>
        <input type="submit" value="submit edit" name="submitEditAddress">
    </fieldset>
</form>