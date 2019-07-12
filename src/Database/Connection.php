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
        
        //self::$user = "your username";
        //self::$password = "your password ";
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
     public static function setEnv(){
        $config=json_decode(file_get_contents("../config.json"));
        self::$server = "mysql:host=".$config["MYSQL_HOST"].";dbname=blog_app";
        self::$user = $config['MYSQL_USER'];
        self::$password = $config['MYSQL_PASSWORD'];
     }
}