<?php

namespace skwd\controller;

class PagesController extends \skwd\core\Controller
{


    public function actionTheProduct()
    {

    }

    public function actionCheckout()
    {
        $this->_params['error']=[];

        $this->_params['checkoutSite1']=true;

        $this->_params['account']= \skwd\models\Account::find('id= '. getAccountId());
       

        
        $this->_params['shopingCartItem']= getShoppingCartItems(getAccountId());


        $this->_params['customer']= \skwd\models\Customer::find('id= '.'\''. $this->_params['account'][0]['customerID']. '\'');
        $date = $this->_params['customer'][0]['dateOfBirth'];
        $this->_params['dateOfBirthInRightOrder']= dateOfBirthInRightOrder($date);
        $this->_params['address']= \skwd\models\Address::find('id= '.'\''. $this->_params['customer'][0]['addressID']. '\'');

        $this->_params['orderPrice']=getBasketSubtotal(getAccountId());
        $this->_params['shipPrice']=shipPrice($this->_params['orderPrice']);
       $this->_params['orderPriceTotal'] = $this->_params['orderPrice'] + $this->_params['shipPrice'];

        if(isset($_POST['submitCheckout'])){

            //go to checkout2
            if(validateAddressTable($this->_params['error'])&&validatePayMethod($this->_params['error'])){
                
                $this->_params['checkoutSite1']=false;
                    /* Data is stored in the session array so that the data from checkout1 is not lost 
                    when you click the back button in checkout2 */
                        $_SESSION['country']=$_POST['country'];
                        $_SESSION['city']=$_POST['city'];
                        $_SESSION['zip']=$_POST['zip'];
                        $_SESSION['street']=$_POST['street'];
                        $_SESSION['payMethod']=$_POST['payMethod'];
            }

        }

        if(isset($_POST['submitOrder'])){
            createOrder($this->_params['shopingCartItem'], $this->_params['error'], $this->_params['customer'], $this->_params['shipPrice']);

            if(count($this->_params['error'])===0){
                header('Location: index.php?c=pages&a=start&k=orderFinished');
                //after the payment via paypal a window of the PayPal login should open (start.php)
                if($_SESSION['payMethod']=='paypal'){
                }
            }
        }
    }


    public function actionLogin()
    {
        $errors = [];
        
        $rememberMe = false;
        if (isset($_POST['rememberMe'])) {
            $rememberMe = true;
        }
        if (isset($_POST['submitLogin']) && login($_POST['validationPassword'], $_POST['email'], $rememberMe, $errors) == true) {
            $dbQuery = \skwd\models\Account::find('email= ' . '\'' . $_POST['email'] . '\'');
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['id'] = $dbQuery[0]['id'];
            actionIfUserIsNotLoggedIn();
        }
        $this->_params['error'] = $errors;
    }

    public function actionMyOrders()
    {

    }

    public function actionError()
    {

    }
    //*//
    // Implements the processes of adding in shoppingCart,
    // deleting of a product from choppingCart
    //Will be realised either simply through form post if js is not activated
    //or through ajax and js without new loading of the page
    //*//
    public function actionShoppingCartShow()
    {
        $errors = [];
        //should know if user is logged in
        $accountId = getAccountId();
        //case user wants to add a product to his basket and he is not logged in
        //save all data to cookie, because we want, that user automatically get his basket after login/register and all elements from submit disappear from $_GET
        if (is_null($accountId) && isset($_GET['i'])) {
            $_SESSION['destination']="shoppingCartShow";
            $_SESSION['productToBasket']=$_GET['i'];
            //send data to shoppingCart.js to pop up window and log in
            if (isset($_GET['ajax'])){
                echo json_encode(['notLoggedIn'=>true]);
                exit(0);

            }
            header('Location: index.php?c=pages&a=login');
            return;
        } //case user want to show his basket and is not logged in
        elseif (is_null($accountId)) {
            $_SESSION['destination']="shoppingCartShow";
            header('Location: index.php?c=pages&a=login');
            return;
        }
        //else the user is logged in and maybe wants to manipulate his shopping cart
        userIsLoggedIn($accountId, $errors);
        if (isset($_GET['ajax'])===true){
            if (isset($_GET['cartOp'])){
                echo json_encode([
                    'qty'=>getBasketQTY(getAccountId()),
                    'subtotal'=>getBasketSubtotal(getAccountId())
                ]);
                exit(0);
            }//send errors to shoppingCart.js and output them  ajax
            if (count($errors) !== 0){
                echo json_encode($errors);
                exit(0);
            }
            else{
                echo json_encode(['ok'=>"Success"]);
                exit(0);
            }
        }
        else{//output of errors from server
            if(count($errors) !== 0){
                $this->_params = $errors;
            }

        }
    }
    //*//
    //implements registration process and validation of it from start to end
    //*//
    public function actionRegister()
    {

        if (isset($_POST['submitR']) || isset($_GET['ajax'])) {
            $errors = [];
            requiredCheck($errors);
            //error output with or without ajax
            if (count($errors) !== 0) {
                if (isset($_GET['ajax'])){
                    echo  json_encode([0=>"Fill all fields!"]);
                    exit(0);
                }
                else{
                    $this->_params['error'] = $errors;
                    return;
                }

            }
            $good = register($errors);
            if (isset($_GET['ajax'])){
                if ($good===true){
                    echo json_encode([
                        'ok'=> 'Welcome to us!']);
                    exit(0);
                }
                else{
                    echo json_encode($errors);
                    exit(0);
                }
            }
            else{
                if ($good === true) {
                    actionIfUserIsNotLoggedIn();
                } else {
                    $this->_params['error'] = $errors;
                }

            }

        }

    }


    public
    function actionStart()
    {

        if (isset($_POST['submitLogout'])) {
            logout();
        }

        if(isset($_GET['k'])&&'orderFinished'){
            $this->_params['orderFinished']=true;
        }
        else{
            $this->_params['orderFinished']=false;
        }
        $where=' where discount is not null';
        $orderBy='ORDER BY prodId DESC';
        if (empty($_GET['page'])){
            $_GET['page']=1;
        }
        elseif(ctype_digit($_GET['page'])==false){
            header('Location: index.php?c=pages&a=error');
        }
        //pagination part
        $this->_params['pagesNumber']=getNumberOfPages(null, $where , $orderBy);
        $this->_params['products']=getProductsAccordingToThePage(null, $where, $orderBy);
    }

    public
    function actionProducts()
    {

    }


    public
    function actionWineInformation()
    {

    }

    public
    function actionPayOffice()
    {

    }

    public
    function actionImprint()
    {

    }

    public
    function actionAccount()
    {

    }
    public function actionPrivacyPolicy(){

    }
    public function actionTermsOfService()
    {

    }

    public function actionDocumentation()
    {

    }
}