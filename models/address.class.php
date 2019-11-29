<?php
class Address {
    private $data;
    const TABLENAME = 'Address';
    public function __construct($id, $country, $city, $zip, $street)
    {
        $this->data['id']=$id;
        $this->data['country']=$country;
        $this->data['city']=$city;
        $this->data['zip']=$zip;
        $this->data['street']=$street;
    }

    public function insert(){
        $db=$GLOBALS['db'];
        try{
            $sql= 'insert into '. self::TABLENAME. ' (country, city, zip, street) values (:country, :city, :zip, :street)';
            $statement=$db->prepare($sql);
            $statement->execute(
                [
                    'country'=>$this->data['country'],
                    'city'=>$this->data['city'],
                    'zip'=>$this->data['zip'],
                    'street'=>$this->data['street'],
                ]
            );
            return true;
        }catch (\PDOException $e){
            die("Query error: ". $e->getMessage());
        }
        return false;
    }
}