<?php
require_once 'Table.php';
/*
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
*/
$posts = new Table("posts");
$posts->integer("user_id",255);
$posts->string("title",255);
$posts->text("content");
$posts->timestamp("created_at");
$posts->timestamp("updated_at");
$posts->createTable();

echo "\nCreated posts table";
