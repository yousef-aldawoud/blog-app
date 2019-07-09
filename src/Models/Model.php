<?php
set_include_path("var/www/html/");
require './Database/Connection.php';

class Model {
    public $id;
    protected $table="";
    public $fields = [];
    protected $nofield = ["id"];
    protected $connection;
    public function __construct(){
        if($this->table===""){
            $this->table=strtolower(get_class($this))."s";
        }
        $this->connection = Connection::getConnection();
    }
    public function insert(){
        $params = [];
        foreach($this->fields as $columnName=>$value){
            $params[":$columnName"]=$value;
        }
        $statment = $this->connection->prepare($this->getInsertStatment());
        $statment->execute($params);
    }
    public function update(){
        $params = [];
        foreach($this->fields as $columnName=>$value){
            $params[":$columnName"]=$value;
        }
        $params[":id"]=$this->id;
        $statment = $this->connection->prepare($this->getUpdateStatment());
        $statment->execute($params);
    }
    public function delete(){
        //
        $sql = "DELETE FROM $this->table WHERE id =  :id";
        $statment = $this->connection->prepare($sql);
        $statment->bindParam(':id',$this->id);
        $statment->execute();
        
    }
    public static function all(){
        $model = new static();
        $statment=$model->connection->prepare("SELECT * FROM $model->table");
        $statment->execute();
        return $statment->setFetchMode(PDO::FETCH_ASSOC);
        
    }
    public static function find($id){
        $model = new static();
        $table = $model->table;
        $statment = $model->getConnection()->prepare( " SELECT * FROM $table  WHERE id = :id");
        $statment->bindParam(":id",$id);
        $statment->execute();
        $row = $statment->fetch(PDO::FETCH_ASSOC);
        if(!$row){
            return null;
        }
        foreach ($row as $key=>$value){
            $model->__set($key,$value);
        }
        $model->id = $id;
        return $model;
        

    }
    public function getConnection(){
        return $this->connection;
    }
    public function __get($name)
    {
        return $this->fields[$name] ;
    }
 
    public function __set($name, $value)
    {
        if(in_array($name,$this->nofield)){
            return;
        }
        $this->fields[$name] = $value ;
    }
    public function getInsertStatment(){
        $columns = "";
        $values = "";
        $counter = 0;
        
        foreach($this->fields as $columnName=>$value){
            $columns .=  $columnName;
            $values .= ":$columnName";
            $counter +=1;
            if($counter === count($this->fields)){
                continue;
            }
            $columns = $columns . ",";
            $values = $values . ",";
        }
        return "INSERT INTO ".$this->table." (" . $columns . " ) VALUES (".$values." )";
    }

    public function getUpdateStatment(){
        $updatedFields = "";
        $counter = 0;
        foreach($this->fields as $columnName=>$value){
            $updatedFields .= "`$columnName` = :$columnName";
            $counter +=1;
            if($counter === count($this->fields)){
                continue;
            }
            $updatedFields = $updatedFields . ",";
        }
        return "UPDATE $this->table SET $updatedFields WHERE id = :id";
    }

    public static function where($key,$condition,$value){
        $model = new static();
        $statment=$model->connection->prepare("SELECT * FROM $model->table WHERE `$key` $condition \"$value\"");
        $statment->execute();
        return $statment->fetchAll(PDO::FETCH_BOTH);
    }
}
