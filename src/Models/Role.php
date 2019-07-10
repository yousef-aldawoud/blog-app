<?php
set_include_path("/var/www/html");
require_once("Models/Model.php");
class Role extends Model{
    public static function findBySlug($slug){
        $roles=self::where("slug","=",$slug);
        if(count($roles)<1){
            return null;
        }
        $role = self::find( $roles[0]['id']);
        return $role;
    }
}