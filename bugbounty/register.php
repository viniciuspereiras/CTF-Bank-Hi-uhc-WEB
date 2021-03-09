<?php
include 'config.php';
session_start();
if(empty($_POST['username']) && empty($_POST['password'])){
    session_destroy();
}
if($_POST['username']){
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));
    
    if(empty($username)){
        $conn->close();
        exit();
    };
    $sql = "select count(*) as total from users where username = '{$username}'";
    
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_assoc($result);
    
    if($rows['total'] == 1){
        $_SESSION['exists'] = true;
        $conn->close();
        exit();
    } 
    
    $sqlinsert = "insert into users (username, pass) values('{$username}',md5('{$password}'))";
    
    if($conn->query($sqlinsert) === TRUE){
        $_SESSION['register'] = true;
        header('Location: /bugbounty/login.php');
        exit();
    } else {
    $conn->close();
    
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
    </div>
    
    <div id="login">
      <h3 class="text-center text-white pt-5">Register Form</h3>
      <div class="container">
          <div id="login-row" class="row justify-content-center align-items-center">
              <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                      <form id="login-form" class="form" action="/bugbounty/register.php" method="post">
                          <h3 class="card-subtitle mb-2 text-muted; text-success; text-center;">Register</h3>
                         
                          <?php
                        if($_SESSION['register']):
                        ?>
                         
                        <h4 class="text-success" style="text-align: center"> User created! </h2>
                        <?php
                        endif;
                        unset($_SESSION['register']);
                         ?>
                         
                         <?php
                        if($_SESSION['exists']):
                        ?>
                        
                         <h4 class="text-danger" style="text-align: center"> User already exists! </h2>
                         <?php
                        endif;
                        unset($_SESSION['exists']);
                         ?>
                         
                          <div class="form-group">
                              <label for="username" class="text-info; text-black">Username:</label><br>
                              <input type="text" name="username" id="username" class="form-control">
                          </div>
                          <div class="form-group">
                              <label for="password" class="text-info; text-black">Password:</label><br>
                              <input type="text" name="password" id="password" class="form-control">
                          </div>
                         <button class="btn btn-primary" type="submit" style="text-align: center; margin-top: 27px">Register</button>
                        </form>
  </body>




