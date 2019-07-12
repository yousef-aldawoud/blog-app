<?php
set_include_path(getenv("INCLUDE_PATH"));
require_once("Models/User.php");
require_once("Models/Post.php");
require_once("Models/Comment.php");
$users=[
    ['username'=>"john","name"=>"John smith","password"=>"password","admin"=>true],
    ['username'=>"robert","name"=>"Robert (:","password"=>"password","admin"=>false],
    ['username'=>"megan","name"=>"MY name is megan","password"=>"password","admin"=>false],
    ['username'=>"alex","name"=>"Alex MC","password"=>"password","admin"=>false],
];
$posts=[
    ['title'=>"I love this movie","content"=>"It was great I watched on Saturday. Life is no as greate as we know it","user_id"=>"1"],
    ['title'=>"Nice watch I got today","content"=>"lol nothing speacail I prefer it more than the new watch","user_id"=>"1"],
    ['title'=>"Look left","content"=>"right up down left right left right","user_id"=>"3"],
    ['title'=>"Normal post","content"=>"normal text normal blog .....","user_id"=>"4"],
    ['title'=>"Go out and get it done","content"=>"The saying doesn't mean a thing it is one of these that we don't care about","user_id"=>"4"],
    ['title'=>"Hello world","content"=>"My first program is program 101","user_id"=>"4"],
    ['title'=>"Existince is pain","content"=>"12345678911121314151617181920","user_id"=>"4"],
    ['title'=>"big title not that big","content"=>"small content","user_id"=>"4"],
];

foreach($users as $user){
    $u=User::createUser($user['username'],$user['name'],$user['password']);
    if($user['admin']){
        $role = Role::findBySlug("admin");
        $u->attach($role,"user_role");
    }
}
foreach($posts as $post){
    $p=new Post;
    $p->title = $post['title'];
    $p->content = $post['content'];
    $p->user_id = $post['user_id'];
    $p->insert();
}