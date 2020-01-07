<form action="<?= $_SERVER['PHP_SELF'] . '?a=personalData&c=accounts&j=test'; ?>" method="POST">
    <fieldset>
        <legend>personal data</legend>
        <div>
            <input type="text" name="firstName"
                   value="<?= isset($_POST['firstName'])
                       ? htmlspecialchars($_POST['firstName']) : $this->_params['customer'][0]['firstName'] ?>"
                   onchange="validateLength(this)"/>
        </div>
        <div>
        <input type="text" name="lastName"
               value="<?= isset($_POST['lastName'])
                   ? htmlspecialchars($_POST['lastName']) : $this->_params['customer'][0]['lastName'] ?>"
               onchange="validateLength(this)"/>
        </div>
        <div>
        <input type="text" name="email"
               value="<?= isset($_POST['email'])
                   ? htmlspecialchars($_POST['email']) : $this->_params['account'][0]['email'] ?>"
               onchange="validateLength(this, 6)"/>
        </div>
        <div>
        <input type="text" name="phoneNumber"
               value="<?= isset($_POST['phoneNumber'])
                   ? htmlspecialchars($_POST['phoneNumber']) : $this->_params['customer'][0]['phoneNumber'] ?>"/>
        </div>
        <input type="submit" value="submit edit" name="submitEdit">
    </fieldset>
</form>
