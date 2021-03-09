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
          <a class="link-primary" href="/bugbounty/logout.php" style="text-decoration: none;">logout</a>
          <a class="link-danger" href="/bugbounty/report.php" style="text-decoration: none;">report</a>
        </div>
    </div>
    
  


<?php
    if($decoded->uid === 1):
      if (isset($_SESSION['message']) && $_SESSION['message'])
      {
        echo '<p class="notification">'.$_SESSION['message'].'</p>';
        unset($_SESSION['message']);
      };
      ?>
      <p style="text-align: center" class="text-danger"> uhc{n1c3_XsS_t0_Sess10N_HijACk1nG} </p>
      <form method="POST" action="./upload.php" style="text-align: center" enctype="multipart/form-data">
      <div class="upload-wrapper">
        <span class="file-name">Admin Upload Form - Choose a file...</span>
        <label for="file-upload"><input type="file" id="file-upload" name="uploadedFile"></label>
      </div>  
      <input type="submit" name="uploadBtn" value="Upload" />
    </form>
<?php
endif;
?>


</form>  
    <!-- uhc{_34sy_P34Sy_B0unTy_Fl4G_!_} -->
            <h2 style="text-align: center; margin-top: 30px;"> Bug Reports</h2>
            <h4 style="text-align: center;"> You can view only closed reports or your open reports, but admins can view all of then. </h4>
        
      
     <div class="card" style="width: 85rem; border-radius: 15px; margin-top: 1rem;">
       <div class="card-body">
              <h5 class="card-title">SQLI</h5>
              <h6 class="card-subtitle mb-2 text-muted; text-success">Closed</h6>
              <p class="card-text">A hacker can execute sql querys inside login form /login.php </p>
       </div>
      </div>
    
      <div class="card" style="width: 85rem; border-radius: 15px; margin-top: 1rem">
        <div class="card-body">
               <h5 class="card-title">LFI on contents page</h5>
               <h6 class="card-subtitle mb-2 text-muted; text-success">Closed</h6>
               <p class="card-text">contents.php have LFI in 'file' parametrer </p>
        </div>
    </div>

   <?php
   if($decoded->uid === 1){
       // admin
       $query = "select * from bugs";
       $result = mysqli_query($conn, $query);
       if($result-> num_rows > 0){
           while($row = $result-> fetch_assoc()){
            $replacescripttitle = str_replace("script", "", $row['title']);
            $replacealerttitle = str_replace("alert", "", $replacescripttitle);
            $replacecookietitle = str_replace("cookie", "", $replacealerttitle);
            $title = str_replace("document", "", $replacecookietitle);
            
            $replacescriptdesc = str_replace("script", "", $row['description']);
            $replacealertdesc = str_replace("alert", "", $replacescriptdesc);
            $replacecookiedesc = str_replace("cookie", "", $replacealertdesc);
            $description = str_replace("document", "", $replacecookiedesc);
            
            echo "<div class='card' style='width: 85rem; border-radius: 15px; margin-top: 1rem'><div class='card-body'><h5 class='card-title'>".$title."</h5><h6 class='card-subtitle mb-2 text-muted; text-warning'>Open</h6><p class='card-text text-info'>From: ".$row['ownusername']."</p><p class='card-text'>".$description."</p></div></div>";
           };
       };
       exit();
    } else {
    $query = "select * from bugs where ownusername = '{$decoded->username}'";
    $result = mysqli_query($conn, $query);
    if($result-> num_rows > 0){
        while($row = $result-> fetch_assoc()){
         $replacescripttitle = str_replace("script", "", $row['title']);
         $replacealerttitle = str_replace("alert", "", $replacescripttitle);
         $replacecookietitle = str_replace("cookie", "", $replacealerttitle);
         $title = str_replace("document", "", $replacecookietitle);
         
         $replacescriptdesc = str_replace("script", "", $row['description']);
         $replacealertdesc = str_replace("alert", "", $replacescriptdesc);
         $replacecookiedesc = str_replace("cookie", "", $replacealertdesc);
         $description = str_replace("document", "", $replacecookiedesc);
         
         echo "<div class='card' style='width: 85rem; border-radius: 15px; margin-top: 1rem'><div class='card-body'><h5 class='card-title'>".$title."</h5><h6 class='card-subtitle mb-2 text-muted; text-warning'>Open</h6><p class='card-text text-info'>From: ".$row['ownusername']."</p><p class='card-text'>".$description."</p></div></div>";
        };
    };
};
?>
  </body>

