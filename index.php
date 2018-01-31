<?php
session_start();
$link=mysqli_connect("localhost","id4155199_chalobatekrain","7532802088","id4155199_chalobatekrain");
if(mysqli_connect_error())
    die ("Connection Error !");
if(isset($_REQUEST['loginbut'])&&$_GET['username']&&$_GET['password'])
{
    $query="SELECT * FROM users WHERE username='".$_GET['username']."'";
    $result=mysqli_query($link,$query);
    if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_array($result);
    $_SESSION['id']=$row['id'];
    header("Location:chat.php");
    }  
}
else if(isset($_REQUEST['signupbut'])&&$_GET['username']&&$_GET['password'])
{
    $query="SELECT * FROM users WHERE username='".$_GET['username']."'";
    $result=mysqli_query($link,$query);
    if(mysqli_num_rows($result)==0){
    $query="INSERT INTO users (username,password) VALUES ('".$_GET['username']."','".$_GET['password']."')";
    $result=mysqli_query($link,$query);
    $_SESSION['id']=mysqli_insert_id($link);
    header("Location:chat.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("jquery.php"); ?>
    <?php include("bootstrapupper.php"); ?>
      <style type="text/css">
          html { 
  background: url(fire.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
          .container{
              width: 40%;
              margin-top: 100px;
              background-color: white;
              padding-bottom: 40px;
              padding-top: 40px;
              border-style: solid;
              border-color: black;
              border-width: 1px;
              border-radius: 10px;
          }
          #signupform{
              display: none;
          }
          body{
              background: none;
          }
          #error{
              align-content: center
          }
          #heading{
              margin-bottom: 20px;
          }
      </style>
    </head>
<body>
<div  class="container">
    <h1 id="heading">Lets Chat</h1>
<form method="get" id="loginform">
    <h3>Login</h3>
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
    <a href="#" id="signuplnk">Signup</a>
      <button type="submit" class="btn btn-primary" name="loginbut">Login</button>
</form>
<form method="get" id="signupform">
    <h3>Signup</h3>
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username" name="username">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
      </div>
    <a href="#" id="loginlnk">Login</a>
      <button type="submit" class="btn btn-primary" name="signupbut">Signup</button>
</form>
    </div>
 <?php include("bootstraplower.php"); ?>
      <script type="text/javascript">
       $("#signuplnk").click(function(){
          $("#signupform").show();
          $("#loginform").hide();
       });
      $("#loginlnk").click(function(){
          $("#signupform").hide();
          $("#loginform").show();
       });
      </script>
  </body>
</html>