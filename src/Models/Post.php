<?php
session_start();
require_once "Model.php";
require_once "Help.php";
require_once "Comment.php";
class Post extends Model{
    public function comments(){
        return $this->hasMany("comments");
    }
}