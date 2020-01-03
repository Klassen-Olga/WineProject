<div>
    <h2>Sign-Up</h2>
</div>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] . '?a=register'; ?>">
    <fieldset>
        <legend>Personal data</legend>
        <div class="input">
            <label for="fname">First name:</label><br>
            <input type="text" id="fname" name="fname"
                   value="<?= isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : '' ?> "
                   onchange="validateLength(this)" required/><br>
        </div>
        <div class="input">
            <label for="lname">Last name:</label><br>
            <input type="text" id="lname" name="lname"
                   value="<?= isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : '' ?> "
                   onchange="validateLength(this)" required/><br>
        </div>
        <div>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"
                   value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                   onchange="validateLength(this)" required/><br>
        </div>
        <div>
            <label for="password1">Password:</label><br>
            <input type="password" id="password1" name="password1"
                   value="<?= isset($_POST['password1']) ? htmlspecialchars($_POST['password1']) : '' ?>"
                   onchange="validateLength(this)" required/><br>
        </div>
        <div>
            <label for="password2">Repeat password:</label><br>
            <input type="password" id="password2" name="password2"
                   value="<?= isset($_POST['password2']) ? htmlspecialchars($_POST['password2']) : '' ?>"
                   onchange="validateLength(this)" required/><br>
        </div>
        <label for="phone">Phone number:</label><br>
        <input type="tel" id="phone" name="phone"
               value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>"/><br>
        <div class="select">
            <label for="month">Date of birth:</label><br>
            <select name="month" id="month" onchange="dobValidation(this, 'month')">
                <option value="">Month</option>
                <?php
                $array = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                foreach ($array as $value) :?>
                    <option value="<?= $value ?>" <?= isset($_POST['month']) ? ($_POST['month'] === $value ? "selected" : '') : '' ?>><?= $value ?></option>;
                <?php endforeach; ?>
            </select>
            <select name="day" id="day" onchange="dobValidation(this, 'day')">
                <option value="">Day</option>
                <?php for ($i = 1; $i <= 31; $i++) : ?>
                    <option value="<?= $i ?>" <?= isset($_POST['day']) ? ($_POST['day'] == $i ? "selected" : '') : '' ?>><?= $i ?></option>;
                <?php endfor; ?>
            </select>
            <select name="year" id="year" onchange="dobValidation(this, 'year')">
                <option value="">Year</option>
                <?php
                for ($i = 2002; $i >= 1919; $i--) :?>
                    <option value="<?= $i ?>" <?= isset($_POST['year']) ? ($_POST['year'] == $i ? "selected" : '') : '' ?>><?= $i ?></option>;
                <?php endfor; ?>
            </select><br><br>
        </div>
        <label for="gender">Gender:</label>
        <input type="radio" name="genderRadio" value="m"
               required <?= isset($_POST['genderRadio']) ? ($_POST['genderRadio'] === 'm' ? "checked" : '') : '' ?>/>Male
        <input type="radio" name="genderRadio" value="f"
               required <?= isset($_POST['genderRadio']) ? ($_POST['genderRadio'] === 'f' ? "checked" : '') : '' ?>/>Female
        <input type="radio" name="genderRadio" value="d"
               required <?= isset($_POST['genderRadio']) ? ($_POST['genderRadio'] === 'd' ? "checked" : '') : '' ?>/>Diverse<br>

    </fieldset>
    <fieldset>
        <legend>Address</legend>
        <div>
        <label for="zip">Zip:</label><br>
        <input type="text" id="zip" name="zip"
               value="<?= isset($_POST['zip']) ? htmlspecialchars($_POST['zip']) : '' ?>"
               onchange="validateLength(this)" required/><br>
        </div>
        <div>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"
               value="<?= isset($_POST['city']) ? htmlspecialchars($_POST['city']) : '' ?>"
               onchange="validateLength(this)" required/><br>
        </div>
        <div>
        <label for="street">Street:</label><br>
        <input type="text" id="street" name="street"
               value="<?= isset($_POST['street']) ? htmlspecialchars($_POST['street']) : '' ?>"
               onchange="validateLength(this)" required/><br>
        </div>
        <div>
        <label for="country">Country:</label><br>
            <select name="country" id="country" onchange="countryValidation(this)">
                <option value="Country"><?= isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : 'Country' ?></option>
                <?php
                $arrayCountry = ['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                    'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                    'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Croatia'];
                foreach ($arrayCountry as $value) :?>
                    <option value="<?= $value ?>" <?= isset($_POST['country']) ? ($_POST['country'] === $value ? "selected" : '') : '' ?>><?= $value ?></option>';
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>
    <br>
    <input type="submit" id="submitRegister" value="Sign-Up" name="submitR">
</form>
