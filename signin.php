<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Existing User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body{
        background-image: url('bgimg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;}
    </style>
</head>
<body>
<nav class="navbar navbar-light bg-warning">
  <a class="navbar-brand" href="home.php">
    <img src="logo.jpg" width="65" height="65" class="d-inline-block align-top" alt="">
  </a>
  <h2> MAKER'S TRIBE
</nav>

<!-- php coding part  -->
<?php

$Email = $pwd ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Email = $_POST['Email'];
  $pwd = $_POST['pwd']; 
  
  $servername = "127.0.0.1"; 
  $database = "mt";
  $username = "root";
  $password = "";
  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) 
     die("Connection failed: " . mysqli_connect_error());
  $sql = "SELECT Email, pwd FROM makerstribe WHERE Email='$Email' AND pwd='$pwd'";
  $res = mysqli_query($conn, $sql);
  mysqli_query($conn, $sql);
  $result =(mysqli_fetch_array($res));
  if($Email == $result['Email'] && $pwd == $result['pwd']) {
      echo "welcome";
  } else {
      echo "sorry it seems you are new here";}
  mysqli_close($conn);        
}          
?>

<!-- php coding ends here -->

<br><br><br>
<div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-body">
        <div class="screen-body-item">
          <form class="app-form" action="signin.php" method="post">
          <h2 class="text-left pt-3 pl-5">ENTER THE DETAILS</h2><hr>
            <div class="app-form-group">
            <label for="defaultForm-Email" class="col-sm-2 col-form-label" style="font-size:large";>Email</label>
              <input class="app-form-control" class="col-sm-5" placeholder="Enter email" type="email" name="Email" required>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-pwd" class="col-sm-2 col-form-label" style="font-size:large";>Password</label>
              <input class="app-form-control" class="col-sm-5" placeholder="Enter password" type="password" name="pwd" required>
            </div>
            <br>
            <div class="app-form-group button">
              <input class="app-form-button btn btn-warning" type="reset"  value="Reset"></input>
              <input class="app-form-button btn btn-warning" type="submit" name="submit" id="submit" value="Sign in"></input>
            </div>
           </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>