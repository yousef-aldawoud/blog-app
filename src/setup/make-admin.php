<?php

set_include_path("/var/www/html");
require_once "Models/User.php";
require_once "Models/Role.php";
$username = readline("username: ");
$name = readline("name: ");
$password = readline("password: ");
if(empty($name)||empty($username)||empty($password)){
    echo "\nUsername can't be empty\nPassword cann't be empty\nName can't be empty\n";
}
$user=User::createUser($username,$name,$password);
if($user===null){
    die("\nUsername $username is already used\n" );
}
$role = Role::findBySlug("admin");
$user->attach($role,"user_role");
if($user===null){
    echo "username is used";
}else{
    echo "user is created";
}