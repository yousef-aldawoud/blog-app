<?php
class Connection{
    private static $server ;
    private static $user; 
    private static $password ;
    protected static $connection;
    
    public static function getConnection(){
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false
        );
        self::$server = "mysql:host=".getenv("MYSQL_HOST").";dbname=blog_app";
        self::$user = getenv('MYSQL_USER');
        self::$password = getenv('MYSQL_PASSWORD');
        try{
            self::$connection = new PDO(self::$server, self::$user,self::$password,$options);
            return self::$connection;
        }
        catch (PDOException $e){
            echo "There is some problem in connection: " . $e->getMessage();
        }

    }
    public static function closeConnection() {
        self::$connection = null;
     }
}