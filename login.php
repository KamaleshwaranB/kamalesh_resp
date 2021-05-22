<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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

$fname = $lname = $Email = $dob = $pwd = $telNo = $interest = $profession = $country ="";
$perror ="";
$error=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $Email = $_POST['Email'];
  $dob = $_POST['dob'];
  $pwd = $_POST['pwd'];
  $interest = $_POST['interest'];
  $profession = $_POST['profession'];
  $country = $_POST['country'];
  $telNo = $_POST['telNo'];
  if( strlen($pwd) < 8 ) {
    $error= 1;
    }
    if( strlen($pwd) > 20 ) {
    $error= 1;
    }
    if( strlen($pwd) < 8 ) {
    $error= 1;
    }
    if( !preg_match("#[0-9]+#", $pwd) ) {
    $error= 1;
    }
    if( !preg_match("#[a-z]+#", $pwd) ) {
    $error= 1;
    }
    if( !preg_match("#[A-Z]+#", $pwd) ) {
    $error= 1;
    }
    if( !preg_match("#\W+#", $pwd) ) {
    $error= 1;
    }
  if($error==0){
  $servername = "127.0.0.1"; 
  $database = "mt";
  $username = "root";
  $password = "";
  $conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) 
     die("Connection failed: " . mysqli_connect_error());
  $sql = "INSERT INTO makerstribe(fname, lname, Email, dob, pwd, interest, profession, country,telNo) VALUES ('$fname', '$lname','$Email','$dob', '$pwd' ,'$interest', '$profession', '$country','$telNo')"; 
  mysqli_query($conn, $sql);
  mysqli_close($conn);}
else{
  $perror ="invalid password";
}
}     
?>

<br><br>
  <div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-body">
        <div class="screen-body-item">
          <form class="app-form" action="login.php" method="post">
          <h2 class="text-left pt-3 pl-5">ENTER THE DETAILS</h2><hr>
            <div class="app-form-group">
              <label for="defaultForm-fname"class="col-sm-2 col-form-label" style="font-size:large";>First name</label>
              <input class="app-form-control"class="col-sm-5" placeholder="Enter first name" type="text" name="fname" required>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-lname"class="col-sm-2 col-form-label" style="font-size:large";>Last name</label>
              <input class="app-form-control" class="col-sm-5" placeholder="Enter last name" type="text" name="lname" required>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-Email" class="col-sm-2 col-form-label" style="font-size:large";>Email</label>
              <input class="app-form-control" class="col-sm-5" placeholder="Enter email" type="email" name="Email" required>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-dob" class="col-sm-2 col-form-label" style="font-size:large";>D.O.B</label>
              <input class="app-form-control" class="col-sm-5" placeholder="dd/mm/yyyy" type="date" name="dob" required>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-pwd" class="col-sm-2 col-form-label" style="font-size:large";>Password</label>
              <input class="app-form-control" class="col-sm-5" placeholder="Enter password" type="password" name="pwd" required>
              <span class = "error">* <?php echo $perror;?></span>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-interest" class="col-sm-2 col-form-label" style="font-size:large";>Field of interest</label>
              <input class="app-form-control" class="col-sm-5" placeholder="Enter interest" type="text" name="interest" required>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-profession" class="col-sm-2 col-form-label" style="font-size:large";>Profession</label>
              <input class="app-form-control" class="col-sm-3" input type="radio" name="profession" value="student">Student
              <input class="app-form-control"  class="col-sm-3"input type="radio" name="profession" value="Employee">Employee<br>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-country" class="col-sm-2 col-form-label" style="font-size:large";>Country</label>
              <input class="app-form-control" class="col-sm-5" placeholder=" Enter country" type="text" name="country" required>
            </div>
            <div class="app-form-group">
              <label for="defaultForm-phonenumber"class="col-sm-2 col-form-label" style="font-size:large";>Phone number</label>
              <input class="app-form-control" class="col-sm-5" placeholder="Enter phone number" type="text" name="telNo" pattern="[0-9]{10}"required>
            </div>
            <br>
            <div class="app-form-group button">
              <input class="app-form-button btn btn-warning" type="submit" value="CREATE" name="submit" onclick="myFunction()"></input>
              <input class="app-form-button btn btn-warning" type="reset" value="RESET" name="reset"></input>
            </div>
           </form>
        </div>
      </div>
    </div>
  </div>
</div>
<br><br>
<br>

<script>
function myFunction() {
  alert("heyy!! you have registered sucesfully");
}
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>