<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup's Page</title>
  <!-- Latest compiled and minified CSS & JS -->
  <link rel="stylesheet" media="screen" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/signup.css">
  <script type="text/javascript" src="../js/signup.js"></script>
  <script type="text/javascript" src="../js/check.js"></script>
  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
  <script type="text/javascript" src="../js/bootstrap-datepicker.js"></script>
  <script>
  $(function() {
    $('#datepicker').datepicker({format: "yyyy-mm-dd"});
  });
  </script>
</head>
<body>
<?php
ini_set('display_errors', 0);
include('../config/config.php');
$ten = $_POST['first_name'];
$hovatenlot = $_POST['last_name'];
$phai = $_POST['gender'];
$diachi = $_POST['address'];
$ngaysinh = $_POST['dob'];
$dienthoai = $_POST['phone'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = sha1(md5(md5($_POST['password'])));
$xacnhanmatkhau = sha1(md5(md5($_POST['password_confirmation'])));
//------Kiểm tra tài khoảng-------
$sqlcheckuser = "SELECT username FROM khachhang WHERE username = '$username'";
$resultcheckuser = mysql_query($sqlcheckuser);
$n = mysql_fetch_row($resultcheckuser);
if($n > 0)
{
  ?>
  <script>
  alert('This username is already taken! Try another one!');
  </script>
  <?php
}
else
{
  if(isset($_POST['register']))
  {
    $sqlinsert = "INSERT INTO khachhang (hovatenlot, ten, phai, diachi, ngaysinh, dienthoai, username, password, xacnhanmatkhau, email) 
                        VALUES('$hovatenlot', '$ten', '$phai', '$diachi', '$ngaysinh', '$dienthoai', '$username', '$password', '$xacnhanmatkhau', '$email')";
    $resultinsert = mysql_query($sqlinsert);
    if($resultinsert)
    {
      ?>
      <script>
      alert('Signed up successfully!');
      location.href="login.php";
      </script>
      <?php
    }
    else
    {
      ?>
      <script>
      alert('Signed up failed!');
      </script>
      <?php
    }
  }
}
?>
<div class="container">
        <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h2 align="center" class="panel-title"><b>21st Century shoestore</b></h2>
            </div>
            <div class="panel-body">
              <form role="form" name="signup_form" id="signup_form" method="post" action="" onsubmit="return checkSignup()">
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                  <!-- First name -->
                    <div class="form-group">
                                  <input type="text" name="first_name" id="first_name" value="<?php echo $_POST['first_name'] ?>" class="form-control input-sm" placeholder="First Name" required data-toggle="floatLabel" data-value="no-js">
                                        <label for="first_name">First Name</label>
                    </div>
                  </div>
                  <!-- Last name -->
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="text" name="last_name" id="last_name" value="<?php echo $_POST['last_name'] ?>" class="form-control input-sm" placeholder="Middle and last Name"  data-toggle="floatLabel" data-value="no-js">
                                        <label for="last_name">Middle and last Name</label>
                    </div>
                  </div>
                </div>
                <!-- Gender -->
                <div class="radio form-control" align="center">
                <?php

                  if($_GET['gender']==1)
                  
                    echo"<label><input type='radio' name='gender' value='1'>Male</label>
                      <label><input type='radio' name='gender' value='0'>Female</label>";
                  else
                   echo"<label><input type='radio' name='gender' value='1' checked>Male</label>
                      <label><input type='radio' name='gender' value='0' checked>Female</label>";
                  
                ?>
                   
                   
                 </div> 
                 <!-- Address -->
                   <textarea name="address" id="address" class="form-control" placeholder="Address..." style="resize: none; margin-bottom: 10px;" cols="30" rows="3"><?php $_POST['address']; ?></textarea>
                   <!-- Birthday -->
                    <div class="form-group">
                      <input type="text" name="dob" id="datepicker" class="form-control" placeholder="Date of birth" value="<?php $_POST['dob']; ?>">
                    </div>
                   <!-- Phone -->
                   <div class="form-group">
                     <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" value="<?php $_POST['phone']; ?>">
                   </div>
                   <!-- Email -->
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address" value="<?php $_POST['email']; ?>">
                </div>
                <!-- Username -->
                   <div class="form-group">
                     <input type="text" name="username" id="username" value="<?php $_POST['username']; ?>" class="form-control" placeholder="Username" required data-toggle="floatLabel" data-value="no-js">
                     <label for="username">Username</label>
                   </div>
                <!-- Password -->
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password" id="password" value="<?php $_POST['password']; ?>" class="form-control input-sm" placeholder="Password">
                    </div>
                  </div>
                  <!-- Password Confirmarion -->
                  <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                      <input type="password" name="password_confirmation" value="<?php $_POST['password_confirmation']; ?>" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                    </div>
                  </div>
                </div>
                <input type="submit" value="Register" name="register" class="btn btn-info btn-block">
                <div>
                <div class="error">
                  <font color="#cc0000"><div id="address_error"></div></font>
                  <font color="#cc0000"><div id="password_error"></div></font>
                  <font color="#cc0000"><div id="phone_error"></div></font>
                  <font color="#cc0000"><div id="phone_error_2"></div></font>
                  <font color="#cc0000"><div id="email_error"></div></font>
                  <font color="#cc0000"><div id="username_error"></div></font>
                  <font color="#cc0000"><div id="password_error"></div></font>
                  <font color="#cc0000"><div id="passwordconfirmation_error"></div></font>
                  <font color="#cc0000"><div id="passwordconfirmation_error_2"></div></font>
                </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>