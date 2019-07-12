# blog-app
a blog app that allows people to create posts and comment on them

## Description

Users can create accounts with a username and a password. Logged in users can create posts and comment on them. They can also delete any post that was created by them.

Admins can do everything a normal logged in user can and can delete posts, comments, and users.

## Setup

### Setup using docker
To run the app inside a docker container. You need to follow the following steps:-

1. Change the mysql database name, username and password in the dev.env file

```
MYSQL_HOST=[YOUR_HOST_NAME]
MYSQL_USER=[YOUR_MYSQL_USERNAME]
MYSQL_PASSWORD=[YOUR_MYSQL_USER_PASSWORD]
MYSQL_ROOT_PASSWORD=[YOUR_MYSQL_ROOT_PASSWORD]
MYSQL_DATABASE=[YOUR_DATABASE_NAME]
INCLUDE_PATH=[WHERE_YOUR_APPLICATION_IS_BASED]
```
2. run the docker container by entering the following commandline
```
docker-compose up -d
```

3. Migrate the databases by running the following command inside your container.

```
php Database/migration.php migrate
```
### Setup using apache webserver
1. Copy the files in the `src` folder to apache hosting point
2. Set your enviroment variables to your mysql database name, username and password in your server 

```
MYSQL_HOST=[YOUR_HOST_NAME]
MYSQL_USER=[YOUR_MYSQL_USERNAME]
MYSQL_PASSWORD=[YOUR_MYSQL_USER_PASSWORD]
MYSQL_ROOT_PASSWORD=[YOUR_MYSQL_ROOT_PASSWORD]
MYSQL_DATABASE=[YOUR_DATABASE_NAME]
INCLUDE_PATH=[WHERE_YOUR_APPLICATION_IS_BASED]
```

in case you don't want to use enviroment variables you can change the user name and password in the src/Database/Connection.php file uncomment and write your password and username

```
    //self::$user = "your username";
    //self::$password = "your password ";
```

3. Migrate the databases by running the following command inside your container.

```
php Database/migration.php migrate
```
## Making admin users
To create an admin user you need to enter the command:-
```
php setup/make-admin.php
```
then enter your username password and name.