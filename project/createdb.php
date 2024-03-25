<?php
include("./connection.php");

 // Create Database
$sql="CREATE DATABASE IF NOT EXISTS db_blogs";
$result=mysqli_query($conn,$sql);
if ($result){
    echo"Database Created <br />";
}else{
    echo "Failed Creating Database";
}

   //Create Table
$sql = "CREATE TABLE IF NOT EXISTS admins (
           id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
           name VARCHAR(25),
           email VARCHAR(25),
           username VARCHAR(25),
           password VARCHAR(25),
           status INT(1)
           )";
   $result=mysqli_query($conn,$sql);
   if ($result){
       echo "Table Created <br />";
   }else {
       echo "Failed Creating Table";
   }

   $sql = "CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25),
    email VARCHAR(25),
    phone BIGINT(10),
    address VARCHAR(25),
    website VARCHAR(25),
    profile_img VARCHAR(255),
    created_at DATETIME,
    last_login_at DATETIME,
    username VARCHAR(25),
    password VARCHAR(25),
    status INT(1)
    )";

$result=mysqli_query($conn,$sql);
if ($result){
echo "Table Created <br />";
}else {
echo "Failed Creating Table";
}

$sql = "CREATE TABLE IF NOT EXISTS categories (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(25),
    rank VARCHAR(25),
    created_at DATETIME,
    updated_at DATETIME,
    created_by VARCHAR(25),
    updated_by VARCHAR(25),
    status INT(1)
    )";
$result=mysqli_query($conn,$sql);
if ($result){
echo "Table Created <br />";
}else {
echo "Failed Creating Table";
}

$sql = "CREATE TABLE IF NOT EXISTS blogs (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description VARCHAR(2550),
    short_description VARCHAR(250),
    feature_img VARCHAR(25),
    view_count INT,
    created_at DATETIME,
    updated_at DATETIME,
    created_by VARCHAR(25),
    updated_by VARCHAR(25),
    status INT(1)
    )";
$result=mysqli_query($conn,$sql);
if ($result){
echo "Table Created <br />";
}else {
echo "Failed Creating Table";
}

$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   blog_id INT,
   commented_by VARCHAR(255),
   commented_at DATETIME,
   commment VARCHAR(255),
    status INT(1)
    )";
$result=mysqli_query($conn,$sql);
if ($result){
echo "Table Created <br />";
}else {
echo "Failed Creating Table";
}
?>
