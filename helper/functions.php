<?php
//*//
// Make a date of birth to be a certain format for database
////*//
function dateOfBirthFilter()
{

    $array = ['January', 'February', 'March', 'April', 'May', 'June', 'July',
        'August', 'September', 'October', 'November', 'December'];
    $monthNumber = 0;
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] === $_POST['month']) {
            $monthNumber = $i + 1;
            break;
        }
    }
    if ($monthNumber < 10) {
        $monthNumberWith0 = '0' . $monthNumber;
    }
    $resultMonth = isset($monthNumberWith0) ? $monthNumberWith0 : $monthNumber;
    $day = $_POST['day'];
    if (strlen($day) === 2) {
        $day = '0' . $day;
    }
    return $_POST['year'] . '-' . $resultMonth . '-' . $day;

}
//*//
//Check if required fields are set
//*//
function requiredCheck(&$errors)
{
    //country, year, month and day can not be unset
    if (isset($_POST['fname']) === false) {
        array_push($errors, "Please fill out first name field");
    }
    if (!isset($_POST['lname'])) {
        array_push($errors, "Please fill out last name field");
    }
    if (!isset($_POST['email'])) {
        array_push($errors, "Please fill out email field");
    }
    if (!isset($_POST['password1'])) {
        array_push($errors, "Please fill out password field");
    }
    if (!isset($_POST['password2'])) {
        array_push($errors, "Please fill out repeat password field");
    }
    if (!isset($_POST['genderRadio'])) {
        array_push($errors, "Please set your gender");
    }
    if (!isset($_POST['zip'])) {
        array_push($errors, "Please fill out zip field");
    }
    if (!isset($_POST['city'])) {
        array_push($errors, "Please fill out city field");
    }
    if (!isset($_POST['street'])) {
        array_push($errors, "Please fill out street field");
    }
}

//should have minimum 1 char and 1 number
function validatePasswordForm(&$errors, $password)
{

    if (!preg_match('/[a-zA-Z]/', $password)) {
        array_push($errors, "Use at least one letter symbol for your password");
        return false;
    }
    if (!preg_match('/[0-9]/', $password)) {

        array_push($errors, "Use at least one number for your password");
        return false;
    }
    if (strlen($password) < 8) {
        array_push($errors, "The length of our password should be more than 7 symbols");
        return false;
    }
    return true;
}
function validatePhoneNumber(&$errors){
    if (strlen($_POST['phone'])<10){
        array_push($errors, 'A valid phone number should not be shorter as 10 digits');
        return;
    }
    if (is_numeric($_POST['phone'])===false){
        array_push($errors, 'Enter a valid phone number ');
    }
}

function validatePassword(&$errors, $password1, $password2)
{
    //the passwords1 and password 2 should be equal
    if ($password1 !== $password2) {
        array_push($errors, "Both passwords should be equal");
        return false;
    }
    //the password should be valid
    if (validatePasswordForm($errors, $password1) === false) {
        return false;
    }
    return true;
}
//*//
// checks if user with this id exists in db
//*//
function isUnique(&$errors, $email)
{
    $result = \skwd\models\Account::find('email= ' . '\'' . $email . '\'');
    if (count($result) === 0) {
        return true;
    }
    array_push($errors, "User with this email already exists");
    return false;
}
//*//
// checks if year, month and day aren't set as default values(year, month, day)
//*//
function validateDateOfBirth(&$errors)
{
    if ($_POST['year'] === '') {
        array_push($errors, "Please enter valid year in your date of birth");
    }
    if ($_POST['month'] === '') {
        array_push($errors, "Please enter valid month in your date of birth");
    }
    if ($_POST['day'] === '') {
        array_push($errors, "Please enter valid day in your date of birth");
    }
}
//*//
//checks if country is not set as default value(country)
//*//
function validateCountry(&$errors)
{
    if ($_POST['country'] === 'Country') {
        array_push($errors, "Please enter valid country");
    }
}
//*//
//searches the same address in db, returns id of address found
//*//
function findAddressInDb($address)
{
    $country = $address->__get('country');
    $city = $address->__get('city');
    $zip = $address->__get('zip');
    $street = $address->__get('street');
    $id = \skwd\models\Address::find('country= ' . '\'' . $country . '\'' . ' and city= ' .
        '\'' . $city . '\'' . ' and zip= ' . '\'' . $zip . '\'' . ' and street= ' . '\'' . $street . ' \' ');
    if (count($id) === 0) {
        return null;
    }
    return $id[0]['id'];
}

function validateCustomerTable(&$errors)
{

    if (empty($_POST['phone'])) {
        $_POST['phone'] = null;
    }
    else{
        validatePhoneNumber($errors);
    }

    $customer = ['firstName' => $_POST['fname'],
        'lastName' => $_POST['lname'],
        'gender' => $_POST['genderRadio'],
        'phoneNumber' => $_POST['phone']
    ];
    $customerInstance = new \skwd\models\Customer($customer);
    $customerInstance->validate($errors);
    validateDateOfBirth($errors);

    if (count($errors) === 0) {
        $customerInstance->__set('dateOfBirth', dateOfBirthFilter());
        return $customerInstance;
    } else {
        return false;
    }

}

function validateAddressTable(&$errors)
{

    $address = [
        'city' => $_POST['city'],
        'zip' => $_POST['zip'],
        'street' => $_POST['street']
    ];
    $addressInstance = new \skwd\models\Address($address);
    $addressInstance->validate($errors);
    validateCountry($errors);
    if (count($errors) === 0) {
        $addressInstance->__set('country', $_POST['country']);
        //it is not allowed to save the same addresses to the database
        $addressID = findAddressInDb($addressInstance);
        if (!is_null($addressID)) {
            $addressInstance->__set('id', $addressID);
        }
        return $addressInstance;
    } else {
        return false;
    }
}

function validateAccountTable(&$errors)
{
    if (!validatePassword($errors, $_POST['password1'], $_POST['password2']) || !isUnique($errors, $_POST['email']) || !validateEmail($errors)) {
        return false;
    }
    $password = password_hash($_POST['password1'], PASSWORD_DEFAULT);
    $account = [
        'email' => $_POST['email'],
        'password' => $password
    ];
    $accountInstance = new \skwd\models\Account($account);
    $accountInstance->validate($errors);
    if (count($errors) === 0) {
        return $accountInstance;
    } else {
        return false;
    }
}
//*//
//writes in database users data if data is valid
//*//
function register(&$errors)
{
    $db = $GLOBALS['db'];
    $db->beginTransaction();
    $customerInstance = validateCustomerTable($errors);
    $addressInstance = validateAddressTable($errors);
    $accountInstance = validateAccountTable($errors);
    if ($customerInstance === false || $addressInstance === false || $accountInstance === false) {
        return false;
    }

    if ($addressInstance->__get('id') === null) {
        $addressInstance->save($errors);
    }
    //only if the address is inserted we can go forward
    if (count($errors) === 0) {
        $customerInstance->__set('addressID', $addressInstance->__get('id'));
        $customerInstance->save($errors);
        //only if the customer is inserted we can go forward
        if (count($errors) === 0) {
            $accountInstance->__set('customerID', $customerInstance->__get('id'));
            $accountInstance->save($errors);
            //only if the account is inserted we can go forward
            if (count($errors) === 0) {
                $shoppingCart = [
                    'accountId' => $accountInstance->__get('id')
                ];
                $shoppingCartInstance = new skwd\models\ShoppingCart($shoppingCart);
                $shoppingCartInstance->save($errors);
                //only if all four instances are inserted we can commit the transaction
                if (count($errors) === 0) {
                    $db->commit();
                    return true;
                } else {
                    $db->rollBack();
                    return false;
                }
            } else {
                $db->rollBack();
                return false;
            }
        } else {
            $db->rollBack();
            return false;
        }
    } else {
        return false;
    }
}


// isEmail is for the distinction between the login and change password form
function isPasswordfromUser($password, $email, &$errors, $isEmail=true)
{

    $dbQuery = skwd\models\Account::find('email= ' . '\'' . $email . '\'');

    if (!empty($dbQuery)) {

        // "Wrong password or email" is for the login form
        // "Wrong old password" is for personal data password change because there is no field for email
        if (password_verify($password, $dbQuery[0]['password'])) {
            return true;
        } else {
            if ($isEmail == true) {
                array_push($errors, "Wrong password or email");
                return false;
            } else {
                array_push($errors, "Wrong old password");
                return false;
            }
        }
    } else {
        if ($isEmail == true) {
            array_push($errors, "Wrong password or email");
            return false;
        } else {
            array_push($errors, "Wrong old password");
            return false;
        }
    }

}


//rememberMe shows if the checkbox in login form is set
function login($password, $email, $rememberMe, &$errors)
{
    $isLoginSuccessful = false;
    $isLoginSuccessful = isPasswordfromUser($password, $email, $errors);
    //if remember me is set, the user should remain logged in after closing the browser window
    if ($isLoginSuccessful == true && $rememberMe == true) {
        $dbQuery = \skwd\models\Account::find('email= ' . '\'' . $email . '\'');
        $id = $dbQuery[0]['id'];
        rememberMe($email, $id);
    }

    return $isLoginSuccessful;
}

function logout()
{
    unset($_SESSION['id']);
    session_destroy();
    
    setcookie('id', '', -1, '/');
    header('Location: index.php?c=pages&a=start');
}

function rememberMe($email, $id)
{
    // coockie is set for 1 month
    $duration = time() + 3600 * 24 * 30;

    setcookie('id', $id, $duration, '/');
}

function getAccountId()
{
    if (isset($_SESSION['id'])) {
        return $_SESSION['id'];
    } else if (isset($_COOKIE['id'])) {
        return $_COOKIE['id'];
    } else return null;
}

// the date is in database is in YYYY-MM-DD but we need DD.MM.YYYY for the website
function dateOfBirthInRightOrder($dateOfBirth)
{
    if (!empty($dateOfBirth)) {

        $date = explode("-", $dateOfBirth);
        $newDate = $date[2] . '.' . $date[1] . '.' . $date[0];
        return $newDate;
    } else {
        return '';
    }
}

function updatePersonalDataAccount($gender, $dateOfBirth, $addressID, $customerID, $email, $password, &$error)
{

    $customer = ['id' => $customerID,
        'firstName' => $_POST['firstName'],
        'lastName' => $_POST['lastName'],
        'gender' => $gender,
        'dateOfBirth' => $dateOfBirth,
        'phoneNumber' => empty($_POST['phone']) ? null : $_POST['phone'],
        'addressID' => $addressID];

    if (isset($_SESSION['id'])) {
        $account = ['id' => $_SESSION['id'],
            'email' => $_POST['email'],
            'password' => $password,
            'customerID' => $customer['id']];
    } else if (isset($_COOKIE['id'])) {
        $account = ['id' => $_COOKIE['id'],
            'email' => $_POST['email'],
            'password' => $password,
            'customerID' => $customer['id']];
    }


    $account1 = new \skwd\models\Account($account);
    $account1->save($error);
    $customer1 = new \skwd\models\Customer($customer);
    $customer1->save($error);

}

function validatePersonalDataAccount(&$error, $gender, $addressID, $dateOfBirth, $customerID, $email, $password)
{
    if (!empty($_POST['phone'])){
        validatePhoneNumber($error);
    }
    if (count($error)>0){
        return false;
    }
    if (strlen($_POST['firstName']) < 2) {
        array_push($error, "Your first name should have more characters");
        return false;
    } else if (strlen($_POST['lastName']) < 2) {
        array_push($error, "Your last name last name field");
        return false;
    } else if (strlen($_POST['email']) <= 5) {
        array_push($error, "Your email should have more characters");
        return false;
    }
    else {
        $test = true;
        if (strcmp($email, $_POST['email']) !== 0) {

            $test = isUnique($error, $_POST['email']);
            //falls der user seine email ändert darf diese im system nicht vorhanden sein
            if ($test === true) {
                updatePersonalDataAccount($gender, $dateOfBirth, $addressID,  $customerID,$email,$password, $error);
                return true;
            } else {
                return false;
            }
        } else {
            updatePersonalDataAccount($gender, $dateOfBirth, $addressID, $customerID,$email, $password, $error);
            return true;
        }

    }

}


function productsPicture($productId)
{

    $picture = \skwd\models\Picture::find('productID=' . $productId);
    return $picture;
}

function actionIfUserIsNotLoggedIn()
{
    if (isset($_SESSION['destination'])) {
        header('Location: index.php?c=pages&' . 'a=' . $_SESSION['destination']);
    } else {
        header('Location: index.php?c=pages&a=start');
    }
}


function upDateOrInsertProductInShoppingCart($productId, $shoppingCartId, &$errors)
{
    //case: user adds product(it doesn't exist in shopping cart)=>update
    $databaseCheck = \skwd\models\ShoppingCartItem::find('productID=' . $productId . ' and shoppingCartId=' . $shoppingCartId);
    if (count($databaseCheck) === 0) {
        $shoppingCartItem = array('qty' => 1, 'productID' => $productId, 'shoppingCartId' => $shoppingCartId);
    } else {
        $shoppingCartItem = $databaseCheck[0];
        //product exists in shopping cart, user wants to update qty in shopping cart through button change qty
        if (isset($_GET['cartOp']) && $_GET['cartOp'] === 'upDate') {
            $shoppingCartItem['qty'] = isset($_GET['qty']) ? $_GET['qty'] : $_POST['qty'];//ajax or not
        } else {
            //product exists in shopping cart, user wants to add it outside of shopping cart(through add to basket)
            if (($shoppingCartItem['qty'] + 1) > 10) {
                array_push($errors, 'You can not add more than 10 items of the same product');
            } else {
                $shoppingCartItem['qty'] += 1;
            }
        }
    }
    $shoppingCartItemInstance = new \skwd\models\ShoppingCartItem($shoppingCartItem);
    $shoppingCartItemInstance->save($errors);

    if (isset($_GET['ajax']) === false) {
        header('Location: index.php?a=shoppingCartShow');
    }
}

function deleteProductFromShoppingCart($productId, $shoppingCartId, &$errors)
{
    $option = $_GET['cartOp'];
    $shoppingCartItem = \skwd\models\ShoppingCartItem::find('productID=' . $productId . ' and shoppingCartId=' . $shoppingCartId)[0];
    if ($option === 'delete') {
        $shoppingCartItemInstance = new \skwd\models\ShoppingCartItem($shoppingCartItem);
        $shoppingCartItemInstance->delete($errors);
        unset($_GET['i']);
        if (isset($_GET['ajax']) === false) {
            header('Location: index.php?a=shoppingCartShow');
        } else {
            if (count(\skwd\models\ShoppingCartItem::find('shoppingCartId=' . $shoppingCartId)) == 0) {
                //shopping cart is empty
                echo json_encode([
                    'lastElement' => 'true'
                ]);
                exit(0);
            }
        }

    }
}
//*//
//action if user is logged in and shopping cart was called
//*//
function userIsLoggedIn($accountId, &$errors)
{

    $shoppingCartId = \skwd\models\ShoppingCart::find('accountId=' . $accountId)[0]['id'];
    //case: after successfully registration/login the product will be saved to shoppingCart, that user wanted to save before he was logged in
    if (isset($_SESSION['destination']) && ($_SESSION['destination'] === 'shoppingCartShow') && isset($_SESSION['productToBasket'])) {
        upDateOrInsertProductInShoppingCart($_SESSION['productToBasket'], $shoppingCartId, $errors);
        unset($_SESSION['destination']);
        unset($_SESSION['productToBasket']);
    } //case user wanted to show his basket and he was not logged in, now he is
    elseif (isset($_COOKIE['destination']) && ($_COOKIE['destination'] === 'shoppingCartShow')) {
        unset($_SESSION['destination']);
    }//case user is logged in and wants to delete an item
    elseif (isset($_GET['cartOp']) && $_GET['cartOp'] === 'delete') {
        $productId = $_GET['i'];
        //if user wants to delete  his purchase $_GET['cartOp'] must be set
        deleteProductFromShoppingCart($productId, $shoppingCartId, $errors);
    }//case user wants to insert new item or add quantity +1 to old item
    if (isset($_GET['i'])) {
        upDateOrInsertProductInShoppingCart($_GET['i'], $shoppingCartId, $errors);
    }

}

function editPassword(&$error, $email, $accountId, $customerId)
{
    $isEmail = false;
    if (
        isPasswordfromUser($_POST['oldPassword'], $email, $error, $isEmail)
        && validatePassword($error, $_POST['newPassword'], $_POST['newPasswordCheck'])
        && validatePasswordForm($error, $_POST['newPassword'])) {
        // the password is saved as hash in database
        $account = ['id' => $accountId,
            'email' => $email,
            'password' => password_hash($_POST['newPassword'], PASSWORD_DEFAULT),
            'customerID' => $customerId];

        $account1 = new \skwd\models\Account($account);
        $account1->save($error);
        return true;
    } else {
        return false;
    }
}

function editAddress(&$error, $addressId = null)
{
    $address = [
        'id' => $addressId,
        'city' => $_POST['city'],
        'zip' => $_POST['zip'],
        'street' => $_POST['street']
    ];
    $addressInstance = new \skwd\models\Address($address);
    $addressInstance->validate($error);
    validateCountry($error);
    if (count($error) === 0) {
        $addressInstance->__set('country', $_POST['country']);
        $addressInstance->save();
        return true;
    } else {
        return false;
    }

}


function validatePayMethod(&$errors)

{

    if (!isset($_POST['payMethod'])) {
        array_push($errors, "Please choose a pay method");
    }


    if (count($errors) === 0) {
        return true;
    } else {
        return false;
    }
}


function shipPrice($orderPrice)
{

    $shipPrice = 0.0;

    if ($orderPrice < 50.00) {
        $shipPrice = 3.49;
    }

    return $shipPrice;
}

function validateAddressTableCheckout(&$errors, $city, $zip, $street, $country)
{

    $address = [
        'country' => $_SESSION['country'],
        'city' => $_SESSION['city'],
        'zip' => $_SESSION['zip'],
        'street' => $_SESSION['street']
    ];
    $addressInstance = new \skwd\models\Address($address);
    $addressInstance->validate($errors);
    if (count($errors) === 0) {
        $addressID = findAddressInDb($addressInstance);
        if (!is_null($addressID)) {
            $addressInstance->__set('id', $addressID);
            return $addressInstance;
        } else {
            $addressInstance->save($errors);
            return $addressInstance;
        }

    }
}


function createOrder($shopingcartItems, &$errors, $customer, $shipPrice)
{


    $orderDate = date("Y-m-d");

    $shipDate = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));

    $address = validateAddressTableCheckout($errors, $_SESSION['city'], $_SESSION['zip'], $_SESSION['street'], $_SESSION['country']);


    if (count($errors) === 0) {
        $order = ['id' => null,
            'orderDate' => $orderDate,
            'shipDate' => $shipDate,
            'shipPrice' => $shipPrice,
            'payStatus' => 'unpaid',
            'payMethod' => $_SESSION['payMethod'],
            'payDate' => null,
            'customerID' => $customer[0]['id'],
            'addressID' => $address->__get('id')];

        $order1 = new \skwd\models\Orders($order);
        $order1->save($errors);

        if (count($errors === 0)) {

            //All products from the shopping cart are entered in the database as orderItem
            foreach ($shopingcartItems as $key => $value) {
                $products = \skwd\models\Product::find('prodId=' . $shopingcartItems[$key]['productID']);
                if ($products !== null && count($products) !== null) {
                    $product = $products[0];
                    $standardPrice = $product['standardPrice'];
                    $discount = $product['discount'];
                    $productPrice = $discount !== null ? number_format($standardPrice - ($standardPrice * $discount / 100), 2, '.', '') : $standardPrice;
                    $orderItem = ['id' => null,
                        'actualPrice' => $productPrice,
                        'qty' => $shopingcartItems[$key]['qty'],
                        'productID' => $shopingcartItems[$key]['productID'],
                        'orderID' => $order1->__get('id')
                    ];
                    $orderItem1 = new \skwd\models\OrderItem($orderItem);
                    $orderItem1->save($errors);
                }
                if (count($errors === 0)) {
                    //after a product has been entered as orderItem it must be removed from the shopping cart
                    $shoppingCartItem = ['id' => $shopingcartItems[$key]['id'],
                        'qty' => $shopingcartItems[$key]['qty'],
                        'productID' => $shopingcartItems[$key]['productID'],
                        'shoppingCartId' => $shopingcartItems[$key]['shoppingCartId']
                    ];
                    $shoppingCartItem1 = new \skwd\models\ShoppingCartItem($shoppingCartItem);
                    $shoppingCartItem1->delete($errors);

                }

            }

        }

    }


}

function getShoppingCartItems($accountId)
{

    $shoppingCart = \skwd\models\ShoppingCart::find('accountId=' . $accountId);
    $shoppingCart = $shoppingCart[0];
    $shoppingCartItems = \skwd\models\ShoppingCartItem::find('shoppingCartId=' . $shoppingCart['id']);
    return $shoppingCartItems;
}
//*//
//calculates subtotal of shopping cart incl. discount or not
//*//
function getBasketSubtotal($accountId)
{
    $sum = 0.0;
    $shoppingCartItems = getShoppingCartItems($accountId);
    foreach ($shoppingCartItems as $item) {
        $product = \skwd\models\Product::find('prodId=' . $item['productID']);
        if ($product !== null && count($product) > 0) {
            $product = $product[0];
            if ($product['discount'] === null) {
                $price = $product['standardPrice'];
            } else {
                $price = $product['standardPrice'] - ($product['standardPrice'] * $product['discount'] / 100);
            }
            $sum += $price * $item['qty'];
        }
    }
    return $sum;
}

function getBasketQTY($accountId)
{
    $qty = 0;
    $shoppingCartItems = getShoppingCartItems($accountId);
    foreach ($shoppingCartItems as $item) {
        $product = \skwd\models\Product::find('prodId=' . $item['productID']);
        if ($product !== null && count($product) > 0) {
            $qty += $item['qty'];
        }
    }
    return $qty;
}
//*//
//is used to remove a get parameter from url
//in the case that user chooses for example 2 times different region in filter, it shouldn't add the region query twice
//*//
function removeQuery($queriesArray)
{
    $matchCounter = 0;
    $url = "$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]";
    list($urlPart, $queryPart) = array_pad(explode('?', $url), 2, '');
    parse_str($queryPart, $queryVariables);
    foreach ($queriesArray as $queryName) {
        if (isset($queryVariables[$queryName])) {
            unset($queryVariables[$queryName]);
            $matchCounter++;
        }
    }
    if ($matchCounter !== 0) {
        $newQuery = http_build_query($queryVariables);
        return $urlPart . '?' . $newQuery;
    } else {
        return "$_SERVER[PHP_SELF]?$_SERVER[QUERY_STRING]";
    }

}


//*//
//for sorted descent products
//*//
function getQueryWithLimitAndOffsetDesc($page)
{
    $offset = NUMBER_LIMIT * ($page - 1);
    $sqlWithLimitAndOffset = ' limit ' . NUMBER_LIMIT . ' offset ' . $offset;
    return $sqlWithLimitAndOffset;
}
//*//
//for sorted ascent products
//*//
function getQueryWithLimitAndOffsetAsc($page)
{
    $offset = $page * NUMBER_LIMIT - NUMBER_LIMIT;
    $sqlWithLimitAndOffset = ' limit ' . NUMBER_LIMIT . ' offset ' . $offset;
    return $sqlWithLimitAndOffset;
}

function getProductsAccordingToThePage($join = null, $where = null, $orderBy = null, $groupByAndHaving = null)
{

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if (isset($orderBy)) {
        $sqlWithLimitAndOffset = getQueryWithLimitAndOffsetDesc($page);
    } else {
        $sqlWithLimitAndOffset = getQueryWithLimitAndOffsetAsc($page);
    }
    return \skwd\models\Product::findComplex($join, $where, $orderBy, $groupByAndHaving, $sqlWithLimitAndOffset);
}
//*//
//returns the number of pages depending on number of all products and number of products should de shown at once
//*//
function getNumberOfPages($join = null, $where = null, $orderBy = null, $groupByAndHaving = null)
{
    // In case of millions of products this value could be stored in database as redundancy

    $prodNumber = count(\skwd\models\Product::findComplex($join, $where, $orderBy, $groupByAndHaving));
    if ($prodNumber >= NUMBER_LIMIT) {
        return ceil($prodNumber / NUMBER_LIMIT);
    } else {
        return 1;
    }
}
//*//
//checks if user didn't modify his url, and url contains only valid queries
//*//
function validateUserUrl($available, $queryParameter)
{
    foreach ($available as $value) {
        if ($value === $queryParameter) {
            return true;
        }
    }
    return false;
}

function orderPriceProducts($orderId){
    $orderprice =0.00;
    $orderitems = \skwd\models\OrderItem::find('orderID ='.'\'' . $orderId.'\''.' order by productID');
    foreach($orderitems as $key => $value){
       $orderprice += $orderitems[$key]['actualPrice']*$orderitems[$key]['qty'];
    }
    return $orderprice; 
}

function  priceIsValid($price){
    if ( validateUserUrl($price,$_GET['minPrice'])==false){
        return false;
    }
    if ( validateUserUrl($price,$_GET['maxPrice'])==false){
        return false;
    }
    if ($_GET['minPrice']>$_GET['maxPrice']){
        return false;
    }
     return true;
}
function getDbYears(){
    $propYear=\skwd\models\AllProducts::find('name= \'year\'');
    $years=[];
    if ($propYear!==null && count($propYear)>0){
        foreach ($propYear as $year){
            if(!in_array($year['value'],$years, true)){
                array_push($years, $year['value']);
            }
        }
        arsort($years);
        return $years;
    }
    return 0;
}
function getDbRegions(){
    $propRegion=\skwd\models\AllProducts::find('name= \'country\'');
    $regions=[];
    if ($propRegion!==null && count($propRegion)>0){
        foreach ($propRegion as $region){
            if(!in_array($region['value'],$regions, true)){
                array_push($regions, $region['value']);
            }
        }
        return $regions;
    }
    return 0;
}

function metaToProducts($name){
    if ($name=='bottleSize'){
        return ' liter';
    }
    elseif ($name=='alcoholPercentage'){
        return ' %';
    }
    return '';
}

// needed in layout.php for the change between responsive and normal layout without javascript
function nav(){
    if(isset($_GET['m']) && ($_GET['m']=='m')){
        $_GET['m'] = null;
        return ' responsive"';
    }
    else{
        return'"';
    }
}

function validateEmail(&$errors){
   
        $pattern = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

        if(preg_match($pattern, $_POST['email'])!==1){
            array_push($errors, 'Enter a valid email');
            return false;
        }
        return true;
}