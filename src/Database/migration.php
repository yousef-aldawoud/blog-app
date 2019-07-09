<?php
require 'Table.php';

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
echo "Created users table";

//creates roles table
$roles = new Table("roles");
$roles->bigIncrement("id");
$roles->string("name",255);
$roles->string("slug",255);
$roles->timestamp("created_at");
$roles->timestamp("updated_at");
$roles->createTable();
echo "Created roles table";

//creates user_role relation table
$role_user = new Table("user_role");
$role_user->bigIncrement("id");
$role_user->integer("user_id",255);
$role_user->integer("role_id",255);
$role_user->timestamp("created_at");
$role_user->timestamp("updated_at");
$role_user->createTable();

echo "Created user_role table";