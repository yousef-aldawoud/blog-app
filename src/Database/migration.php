<?php
set_include_path("/var/www/html/");

require_once 'Database/Table.php';
require_once 'Models/Role.php';
function create(){

    $command = $argv[1];
    $users = new Table("users");
    
    //creates user table
    $users->bigIncrement("id");
    $users->string("name",255);
    $users->string("username",255);
    $users->string("password",255);
    $users->string("auth_token",255,true);
    $users->timestamp("created_at");
    $users->timestamp("updated_at");
    $users->createTable();
    echo "\nCreated users table";
    
    //creates roles table
    $roles = new Table("roles");
    $roles->bigIncrement("id");
    $roles->string("name",255);
    $roles->string("slug",255);
    $roles->timestamp("created_at");
    $roles->timestamp("updated_at");
    $roles->createTable();
    echo "\nCreated roles table";
    
    //creates user_role relation table
    $role_user = new Table("user_role");
    $role_user->bigIncrement("id");
    $role_user->integer("user_id",255);
    $role_user->integer("role_id",255);
    $role_user->timestamp("created_at");
    $role_user->timestamp("updated_at");
    $role_user->createTable();
    
    echo "\nCreated user_role table";
    
    $posts = new Table("posts");
    $posts->bigIncrement("id");
    $posts->integer("user_id",255);
    $posts->string("title",255);
    $posts->text("content");
    $posts->timestamp("created_at");
    $posts->timestamp("updated_at");
    $posts->createTable();

    echo "\nCreated posts table\n\n";

    $comments = new Table("comments");
    $comments->bigIncrement("id");
    $comments->integer("user_id",255);
    $comments->integer("post_id",255);
    $comments->string("comment",255);
    $comments->timestamp("created_at");
    $comments->timestamp("updated_at");
    $comments->createTable();
    
    echo "\nCreated comments table\n\n";


    $adminRole = new Role;
    $adminRole->name = "admin";
    $adminRole->slug = "admin";
    $adminRole->insert();
}

function drop(){
    $tables = ['users','posts',"roles","user_role","comments"];
    foreach($tables as $table){
        Table::dropTable($table);
        echo "dropped $table table \n";
    }
}

if(count($argv)<2){
    echo "\nCommands :-\n   migrate:- to create tables\n   refresh:- to drop an recreate the tables\n   drop:- to drop tables\n\n";

}else{
    switch ($argv[1]){
        case "migrate":
            create();
            break;
        case "drop":
            drop();
            break;
        case "refresh":
            drop();
            create();
            break;
        default:
            echo "Unkouwn command ".$argv[1];
            break;
    }
}