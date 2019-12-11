


<div>
    <h2>Sign-Up</h2>
</div>

<form method="POST" action="<?= $_SERVER['PHP_SELF'] . '?a=register'; ?>">
    <fieldset>
        <legend>Personal data</legend>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname"
               value="<?= isset($_POST['fname']) ? htmlspecialchars($_POST['fname']) : '' ?>" required/><br>

        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname"
               value="<?= isset($_POST['lname']) ? htmlspecialchars($_POST['lname']) : '' ?>"
               required/><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"
               value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
               required/><br>
        <label for="password1">Password:</label><br>
        <input type="password" id="password1" name="password1"
               value="<?= isset($_POST['password1']) ? htmlspecialchars($_POST['password1']) : '' ?>" required/><br>
        <label for="password2">Repeat password:</label><br>
        <input type="password" id="password2" name="password2"
               value="<?= isset($_POST['password2']) ? htmlspecialchars($_POST['password2']) : '' ?>" required/><br>
        <label for="phone">Phone number:</label><br>
        <input type="tel" id="phone" name="phone"
               value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : '' ?>"/><br>
        <label for="select">Date of birth:</label><br>

        <select name="Month" id="Month">
            <option value="Month"><?= isset($_POST['Month']) ? htmlspecialchars($_POST['Month']) : 'Month' ?></option>
            <?php
            $array = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
            foreach ($array as $value) {
                echo '<option value =' . $value . '>' . $value . '</option>';
            }
            ?>
        </select>
        <script type="text/javascript">
            document.getElementById('Month').value = "<?php echo $_POST['Month'];?>";
        </script>
        <select name="Day" id="Day">
            <option value="Day"><?= isset($_POST['Day']) ? htmlspecialchars($_POST['Day']) : 'Day' ?></option>
            <?php

            for ($i = 1; $i <= 31; $i++) {

                if ($i < 10) {
                    echo '<option value= 0' . $i . '>' . $i . '</option>';
                } else {
                    echo '<option value= ' . $i . '>' . $i . '</option>';
                }
            }
            ?>
        </select>
        <script type="text/javascript">
            document.getElementById('Day').value = "<?php echo $_POST['Day'];?>";
        </script>
        <select name="Year" id="Year">
            <option value="Year"><?= isset($_POST['Year']) ? htmlspecialchars($_POST['Year']) : 'Year' ?></option>
            <?php
            for ($i = 2020; $i >= 1919; $i--) {
                echo '<option value= ' . $i . '>' . $i . '</option>';
            }
            ?>
        </select><br><br>
        <script type="text/javascript">
            document.getElementById('Year').value = "<?php echo $_POST['Year'];?>";
        </script>
        <label for="gender">Gender:</label>
        <input type="radio" name="genderRadio" value="m" id="m" required/>Male
        <input type="radio" name="genderRadio" value="f" id="f" required/>Female
        <input type="radio" name="genderRadio" value="d" id="d" required/>Diverse<br>

    </fieldset>

    <fieldset>
        <legend>Address</legend>
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
        <label for="country">Country:<br>
            <select name="country" id="country">
                <option value="Country"><?= isset($_POST['Country']) ? htmlspecialchars($_POST['Country']) : 'Country' ?></option>
                <?php
                $arrayCountry= ['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                    'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                    'Poland', 'Portugal', 'Romania', 'Slovakia', 'Slovenia', 'Spain', 'Sweden', 'Croatia'];
                foreach ($arrayCountry as $value) {
                    echo '<option  value = ' . $value . '>' . $value . '</option>';
                }
                ?>
            </select>
            <script type="text/javascript">
                document.getElementById('country').value = "<?php echo $_POST['country'];?>";
            </script>
    </fieldset>
    <br>
    <input type="submit" id="submitRegister" value="Sign-Up" name="submitR">
</form>
