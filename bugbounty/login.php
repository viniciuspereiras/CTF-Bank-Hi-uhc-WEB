<?php
session_start();
use \Firebase\JWT\JWT;
require __DIR__ . '/../vendor/autoload.php';
include 'config.php';
if($_POST['username']){
  
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $pass = mysqli_real_escape_string($conn, $_POST['password']);
  
  $query = "select * from users where username = '{$username}' and pass = md5('{$pass}')";
  $result = mysqli_query($conn, $query);
  
  $row = mysqli_num_rows($result);
  
  
  
  if($row == 1) {
      if($username === 'admin'){
        $id = 1;
      } else {
        $id = 0;
      };
  
    $key = "@b!ng0_B!NG0@";
    $payload = array(
        "uid" => $id,
        "username" => $username,
    );
  
    $jwt = JWT::encode($payload, $key);
    $_SESSION['authenticated'] = true;
    setcookie("token", $jwt);
    
    header('Location: /bugbounty/index.php');
    exit();
    };
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
          <a class="link-primary" href="/bugbounty/register.php" style="text-decoration: none;">register</a>
          <a class="link-primary" href="/bugbounty/logout.php" style="text-decoration: none;">logout</a>
          <a class="link-danger" href="/bugbounty/report.php" style="text-decoration: none;">report</a>
        </div>
    </div>
    
    <div id="login">
      <h3 class="text-center text-white pt-5"> </h3>
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                      <form id="login-form" class="form" action="/bugbounty/login.php" method="post">
                      <h3 class="card-subtitle mb-2 text-muted; text-success; text-center;">Login</h3>
                        <?php
                        if($auth = false):
                        ?>
                        <p class="text-danger">Invalid Username or Password</p>  
                        <?php
                        endif;
                        $auth = true;
                        ?>
                        
                        <div class="form-group">
                              <label for="username" class="text-info; text-black">Username:</label><br>
                              <input type="text" name="username" id="username" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="password" class="text-info; text-black">Password:</label><br>
                              <input type="text" name="password" id="password" class="form-control">
                          </div>
                          <div id="register-link" class="text-right">
                              <a href="register.php" class="text-info;" style="text-decoration: none;">Register here</a>
                         </div>
                         <button class="btn btn-primary" type="submit" style="text-align: center; margin-top: 27px;">Submit</button>
    
  </body>
