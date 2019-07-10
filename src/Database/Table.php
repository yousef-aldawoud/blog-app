<?php
require_once 'Connection.php';

class Table{

    private $statement;
    private $columns=[];
    private $name;
    public function __construct(string $name){
        $this->name = $name;
        $this->connection = Connection::getConnection();
        $this->statement = "CREATE TABLE $this->name (";
    }
    public function string($columnName,$length,$null=false){
        $nullable = $null ? "" : "NOT NULL";
        $arraySize=sizeof($this->columns);
        $column = array();

        $column["statment"] = "$columnName VARCHAR($length) $nullable";
        $column["name"] = $columnName;
        $column["type"] = "string";
        array_push($this->columns,$column);
    }

    public function timestamp($columnName,$null=false ,$updateDefault=false){
        $nullable = $null ? "" : "NOT NULL";
        $column = array();
        if($updateDefault){
            $column["statment"] = "$columnName TIMESTAMP $nullable DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
        }else{
            $column["statment"] = "$columnName TIMESTAMP $nullable DEFAULT CURRENT_TIMESTAMP";
        }
        $column["name"] = $columnName;
        $column["type"] = "timestamp";
        array_push($this->columns,$column);
        
    }
    public function bigIncrement($columnName,$null=false){
        $nullable = $null ? "" : "NOT NULL";
        $column = array();
        $column["statment"] = "$columnName BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY $nullable";
        $column["name"] = $columnName;
        $column["type"] = "bigIncrement";
        array_push($this->columns,$column);
        
    }

    public function text($columnName,$null=false){
        $nullable = $null ? "" : "NOT NULL";
        $arraySize=sizeof($this->columns);
        $column = array();

        $column["statment"] = "$columnName MEDIUMTEXT $nullable";
        $column["name"] = $columnName;
        $column["type"] = "MEDIUMTEXT";
        array_push($this->columns,$column);
    }

    public function integer($columnName,$size,$null=false){
        
        $nullable = $null ? "" : "NOT NULL";
        $column = array();
        $column["statment"] = "$columnName INTEGER($size) $nullable";
        $column["name"] = $columnName;
        $column["type"] = "INTEGER";
        array_push($this->columns,$column);
    }
    public function getStatment(){
        $statement = "CREATE TABLE $this->name (";
        for ($i = 0;$i<count($this->columns);$i++){
            $statement = $statement . $this->columns[$i]['statment'] ;
            if(count($this->columns)-1!==$i){
                $statement = $statement.",";
            }
        }
        $statement = $statement .")";
        return $statement;
    }

    public function createTable(){
        
        $statement=$this->connection->prepare($this->getStatment());
        $statement->execute();

    }
    public function dropTable(){

    }
}
