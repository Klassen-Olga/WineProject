<?php
class Customer{
    const TABLENAME = '`Customer`';
    private $data;

    public function __construct($id, $name, $description, $standartPrice, $productType){
    
    $this->data['id']  = $id;
    $this->data['name'] = $name;
    $this->data['description'] = $description;
    $this->data['standartPrice'] = $standartPrice;
    $this->data['productType'] = $productType;
    }
    
  public function __get($key){
      if(isset($this->data[$key])){
          return $this->data[$key];
      }
  }

  public static function find($where =''){
    $db = $GLOBALS['db'];
    $result = null;


      
try{
    
    $sql = 'SELECT * FROM ' . self::TABLENAME;
    if(!empty($where)){
        $sql .= ' WHERE '. $where . ';';
    }
    $result = $db->querry($sql)->fetchall();
}
catch(\PDOException $e){
    die('select statement failed: ' . $e.getMessage());
}
    
    return $result;

}

function insert(){
    $db = $GLOBALS['db'];

    try{
        $sql = 'INSERT INTO ' . self::TABLENAME . ' (name, description, standartPrice, productName) VALUES(:name, :description, :standartPrice, :productName)';
        $statement = $db->prepare($sql);
        $statement->bindparam(':name', $this->name);
        $statement->bindparam(':description', $this->description);
        $statement->bindparam(':standartPrice', $this->standartPrice);
        $statement->bindparam(':productName', $this->productName);

        $statement->exexute();
        return true;
    }
    catch(\PDOException $e){
        die('Error inserting customer: ' . $e->getMessage());
        return false;
    }
}

public function delete(){
    $db = GLOBALS['db'];
    try{
        $sql = 'DELETE FROM ' . self::TABLENAME . 'WHERE id = ' . $this->id;
        $db->exec($sql);
        return true;
    }
    catch(\PDOException $e){
        die('Error deleting customer: ' . $e->getMessage());
        return false;
    }
}

}