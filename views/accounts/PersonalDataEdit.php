<div class="test1">
<div class="personalDataEdit">
<div class="register">
    <form action="<?= $_SERVER['PHP_SELF'] . '?a=personalData&c=accounts&j=test'; ?>" method="POST">
        <div class="address">
        <h3>change personal data</h3>
        <div class="text">
        <label for="fname">First name:</label>
            <input type="text" name="firstName"
                   value="<?= isset($_POST['firstName'])
                       ? htmlspecialchars($_POST['firstName']) : $this->_params['customer'][0]['firstName'] ?>"
                   onchange="validateLength(this)"/>
                   <br>
        </div>
        <div class="text">
        <label for="lname">Last name:</label>
        <input type="text" name="lastName"
               value="<?= isset($_POST['lastName'])
                   ? htmlspecialchars($_POST['lastName']) : $this->_params['customer'][0]['lastName'] ?>"
               onchange="validateLength(this)"/>
               <br>
        </div>
        <div class="text">
        <label for="email">Email:</label>
        <input type="text" name="email"
               value="<?= isset($_POST['email'])
                   ? htmlspecialchars($_POST['email']) : $this->_params['account'][0]['email'] ?>"
               onchange="validateEmail(this)"/>

               <br>
        </div>
        <div class="text">
        <label for="phone">Phone number:</label>
        <input type="text" name="phone"
               value="<?= isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : $this->_params['customer'][0]['phoneNumber'] ?>"/>
                   <br>
        </div>
        <div class="button">
        <input type="submit" value="submit edit" name="submitEdit">
        </div>
    </div>
    </form>
</div>
</div>
</div>
