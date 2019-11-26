

    <form method="POST" action=views/register.php> <fieldset>
        <legend>Personal data</legend>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" value="<?=isset($_Post['fname'])?htmlspecialchars($_Post['fname']): '' ?>"
            required /><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" value="<?=isset($_Post['lname'])?htmlspecialchars($_Post['lname']): '' ?>"
            required /><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" value="<?=isset($_Post['email'])?htmlspecialchars($_Post['email']): '' ?>"
            required /><br>
        <label for="dob">Password:</label><br>
        <input type="password" id="password1"
            value="<?=isset($_Post['password1'])?htmlspecialchars($_Post['password1']): '' ?>" required /><br>
        <label for="dob">Repeat password:</label><br>
        <input type="password" id="password2"
            value="<?=isset($_Post['password2'])?htmlspecialchars($_Post['password2']): '' ?>" required /><br>
        <label for="fname">Phone number:</label><br>
        <input type="tel" id="phone" value="<?=isset($_Post['phone'])?htmlspecialchars($_Post['phone']): '' ?>" /><br>
        <label for="select">Date of birth:</label><br>

        <select name="month" id="select">
        <option value="month">Month</option>
        <?php
        $array=['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        foreach($array  as $value){
            echo '<option value ='. strtolower($value).'>'.$value.'</option>';
        }
        ?>
        </select>

        <select name="day" id="select">
        <option value="day">Day</option>
        <?php
        
        for($i=1; $i<=31; $i++){
            
           echo '<option value= '. $i . '>' .$i. '</option>';
        }
        ?>
        </select>
        <select name="year" id="select">
            <option value="year">Year</option>
           <?php
           for($i=2020;$i>=1919; $i--){
            echo '<option value= '. $i . '>' .$i. '</option>';
           }
           ?>
        </select><br><br>
        <label for="gender">Gender:</label>
        <input type="radio" name="genderRadio" id="male" required />Male
        <input type="radio" name="genderRadio" id="female" required />Female
        <input type="radio" name="genderRadio" id="diverse" required />Diverse<br>

        </fieldset>

        <fieldset>
            <legend>Address</legend>
            <label for="zipCode">Zip:</label><br>
            <input type="text" id="zipCode"
                value="<?=isset($_Post['zipCode'])?htmlspecialchars($_Post['zipCode']): '' ?>" required /><br>
            <label for="city">City:</label><br>
            <input type="text" id="city" value="<?=isset($_Post['city'])?htmlspecialchars($_Post['city']): '' ?>"
                required /><br>
            <label for="street">Street:</label><br>
            <input type="text" id="street" value="<?=isset($_Post['street'])?htmlspecialchars($_Post['street']): '' ?>"
                required /><br>
            <label for="select">Country:<br>
                <select name="country" id="select">
                <option value="country">Country</option>
                    <?php
                    $array=['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                            'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                            'Poland','Portugal', 'Romania', 'Slovakia','Slovenia', 'Spain', 'Sweden', 'Croatia'];
                            foreach($array as $value){
                                echo '<option value ='. strtolower($value).'>'.$value.'</option>';
                            }
                    ?>
                   

                </select>
        </fieldset>
        <br>
        <input type="submit" id="submitRegister" value="Sign-Up">
    </form>
