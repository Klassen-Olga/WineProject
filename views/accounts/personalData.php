<h1>your personal data</h1>

<?php

if((isset($_GET['j'])&&$_GET['j']=='test')||isset($_POST['submitEdit'])){
    include_once __DIR__.'/personalDataEdit.php';
}
else if(isset($_GET['j'])&&$_GET['j']=='test1'){
    include_once __DIR__.'/addressEdit.php';
}
else if(isset($_GET['j'])&&$_GET['j']=='test2'){
    include_once __DIR__.'/passwordEdit.php';
}
else{

 include_once __DIR__.'/personalDataNoEdit.php';
}

           /* echo $this->_params['customer'][0]['gender']; 
            echo $this->_params['customer'][0]['addressID'];
            echo $this->_params['customer'][0]['dateOfBirth'];
            echo $this->_params['account'][0]['id'];
            echo$this->_params['account'][0]['email'];
           echo $this->_params['account'][0]['password'];
           echo $_COOKIE['id'];*/
           var_dump(intval($_SESSION['id']));
           var_dump($this->_params['account'][0]['id']);
           var_dump($this->_params['error']);
           var_dump($this->_params['customer'][0]['gender']);
            var_dump(intval($this->_params['customer'][0]['addressID']));
           var_dump($this->_params['customer'][0]['dateOfBirth']);
            var_dump(intval($this->_params['account'][0]['id']));
           var_dump($this->_params['account'][0]['email']); 
           var_dump($this->_params['account'][0]['password']);






/*<?php isset($_POST['firstName'])
 ? htmlspecialchars($_POST['firstName']): isset($this->_params['customer'][0]['firstName'])
 ?htmlspecialchars($this->_params['customer'][0]['firstName']):'';?>*/