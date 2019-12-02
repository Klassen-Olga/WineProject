<?php
namespace  skwd\models;
class Customer extends BaseModel{

    const TABLENAME = 'Customer';

    protected $schema=[
        'id'=>['type'=>BaseModel::TYPE_INT]	,
        'firstName'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'lastName'	=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'dateOfBirth'=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>50],
        'phoneNumber'=>['type'=>BaseModel::TYPE_STRING, 'min'=>2, 'max'=>20],
        'addressID'=>['type'=>BaseModel::TYPE_INT]	,
    ];
 /*   public function __construct($id, $firstName, $lastName, $dateOfBirth, $phoneNumber)
    {
        $this->data['id']=$id;
        $this->data['firstName']=$firstName;
        $this->data['lastName']=$lastName;
        $this->data['dateOfBirth']=$dateOfBirth;
        $this->data['phoneNumber']=$phoneNumber;

    }
*/
/*    public function insert(){
        $db=$GLOBALS['db'];
        try{
            $sql= 'insert into '. self::TABLENAME. ' (firstName, lastName, dateOfBirth, phoneNumber, addressID) values (:firstName, :lastName, :dateOfBirth, :phoneNumber, :addressID)';
            $statement=$db->prepare($sql);

            $statement->execute(
                [
                    'firstName'=>$this->data['firstName'],
                    'lastName'=>$this->data['lastName'],
                    'dateOfBirth'=>$this->data['dateOfBirth'],
                    'addressID'=>$db->lastInsertID(),
                    'phoneNumber'=>$this->data['phoneNumber'],

                ]
            );
            return true;
        }catch (\PDOException $e){
            die("Query error: ". $e->getMessage());
        }
        return false;
    }*/
}
