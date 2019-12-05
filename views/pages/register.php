
    <div>
        <h2>Sign-Up</h2>
    </div>

    <form method="POST" action="<?=$_SERVER['PHP_SELF'].'?a=register';?>"> <fieldset>
        <legend>Personal data</legend>
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="<?=isset($_POST['fname'])?htmlspecialchars($_POST['fname']): '' ?>" required /><br>

        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="<?=isset($_POST['lname'])?htmlspecialchars($_POST['lname']): '' ?>"
            required /><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?=isset($_POST['email'])?htmlspecialchars($_POST['email']): '' ?>"
            required /><br>
        <label for="password1">Password:</label><br>
        <input type="password" id="password1" name="password1"
            value="<?=isset($_POST['password1'])?htmlspecialchars($_POST['password1']): '' ?>" required /><br>
        <label for="password2">Repeat password:</label><br>
        <input type="password" id="password2" name="password2"
            value="<?=isset($_POST['password2'])?htmlspecialchars($_POST['password2']): '' ?>" required /><br>
        <label for="fname">Phone number:</label><br>
        <input type="tel" id="phone" name="phone" value="<?=isset($_POST['phone'])?htmlspecialchars($_POST['phone']): '' ?>" /><br>
        <label for="select">Date of birth:</label><br>

        <select name="month" id="Month">
        <option value="Month"><?=isset($_POST['month'])?htmlspecialchars($_POST['month']): 'Month' ?></option>
        <?php
        $array=['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        foreach($array  as $value){
            echo '<option value ='.$value.'>'.$value.'</option>';
        }
        ?>
        </select>

        <select name="day" id="Day">
        <option value="Day"><?=isset($_POST['day'])?htmlspecialchars($_POST['day']): 'Day' ?></option>
        <?php
        
        for($i=1; $i<=31; $i++){

            if($i<10){
                echo '<option value= 0'. $i . '>' .$i. '</option>';
            }
            else{
                echo '<option value= '. $i . '>' .$i. '</option>';
            }
        }
        ?>
        </select>
        <select name="year" id="Year">
            <option value="Year"><?=isset($_POST['year'])?htmlspecialchars($_POST['year']): 'Year' ?></option>
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
            <label for="zip">Zip:</label><br>
            <input type="text" id="zip" name= "zip" value="<?=isset($_POST['zip'])?htmlspecialchars($_POST['zip']): '' ?>" required /><br>
            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" value="<?=isset($_POST['city'])?htmlspecialchars($_POST['city']): '' ?>"
                required /><br>
            <label for="street">Street:</label><br>
            <input type="text" id="street" name= "street" value="<?=isset($_POST['street'])?htmlspecialchars($_POST['street']): '' ?>"
                required /><br>
            <label for="country">Country:<br>
                <select name= "country" id="countrd">
                <option value="Country"><?=isset($_POST['country'])?htmlspecialchars($_POST['country']): 'Country' ?></option>
                    <?php
                    $array=['Germany', 'Austria', 'Belgium', 'Bulgaria', 'Cyprus', 'Czech Republic', 'Denmark', 'Estonia', 'Finland',
                            'France', 'Great Britain', 'Hungary', 'Ireland', 'Italy', 'Latvia', 'Luxembourg', 'Malta', 'Netherlands',
                            'Poland','Portugal', 'Romania', 'Slovakia','Slovenia', 'Spain', 'Sweden', 'Croatia'];
                            foreach($array as $value){
                                echo '<option value ='.$value.'>'.$value.'</option>';
                            }
                     ?>
                   

                </select>
        </fieldset>
        <br>
        <input type="submit" id="submitRegister" value="Sign-Up" name="submitR">
    </form>
