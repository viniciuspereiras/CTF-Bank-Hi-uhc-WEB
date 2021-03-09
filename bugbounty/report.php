<?php
session_start();
use \Firebase\JWT\JWT;
require __DIR__ . '/../vendor/autoload.php';
include 'config.php';


$jwt = $_COOKIE['token'];
$key = "@b!ng0_B!NG0@";
if(!$jwt){
    header('Location: /bugbounty/login.php');
}
if($jwt){

    try {

        $decoded = JWT::decode($jwt, $key, array('HS256'));

    } catch (Exception $e) {

    header('Location: /bugbounty/login.php');
    };
};
if($_POST['title']){
  $title = $_POST['title'];
  $description = $_POST['description'];
  if(empty($title)){
    $conn->close();
    exit();
  };
  $query = "insert into bugs (title, description, ownusername) values('${title}', \"{$description}\", '{$decoded->username}')";
  $conn->query($query);
  header('Location: /bugbounty/index.php');
  };
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Bug Bounty &mdash; - bank Hi.</title>
    <meta charset="utf-8">
    <link rel="icon" href="/images/iconmoney.png">
    <link rel="stylesheet" href="/bugbounty/style.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</head>
  <body>
    <div class="header">
        <img src="/images/iconmoney.png" class="rounded float-start" alt="Bank Hi" width="60" height="60" style="text-align: left;">
        <a href="/index.html" class="logo">Bank Hi<span>.</span></a>
        <div class="header-right">
          <a class="link-primary" href="/bugbounty/index.php" style="text-decoration: none;">panel</a>  
          <a class="link-primary" href="/bugbounty/logout.php" style="text-decoration: none;">logout</a>
          <a class="link-danger" href="/bugbounty/report.php" style="text-decoration: none;">report</a>
        </div>
    </div>
   
    <h3 class="text-center text-white pt-5">Report</h3>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="/bugbounty/report.php" method="post">
                        <h3 class="card-subtitle mb-2 text-muted; text-success; text-center;">Report</h3>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Title</label>
                          <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <label for="floatingTextarea">Description</label>
                          <textarea name="description" rows="2" class="form-control" placeholder="Description" id="floatingTextarea"></textarea>
                        </div>
                       <button class="btn btn-primary" type="submit" style="text-align: center; margin-top: 27px;">Submit</button>
                      </form>
                </div>
              </div>
            </div>
          </div>
    
</body>

