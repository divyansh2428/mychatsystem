<?php
session_start();
$link=mysqli_connect("localhost","id4155199_chalobatekrain","7532802088","id4155199_chalobatekrain");
if(mysqli_connect_error())
    die ("Connection Error !");
$query="SELECT * FROM users WHERE id='".$_SESSION['id']."'";
$result=mysqli_query($link,$query);
$row=mysqli_fetch_array($result);
$_SESSION['user']=$row['username'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("jquery.php"); ?>
    <?php include("bootstrapupper.php"); ?>
      <style type="text/css">
          .container{
              width: 75%;
              background-color:white;
              margin-top: 10px;
              border-style: solid;
              border-color: black;
              border-width: 1px;
              border-radius: 10px;
          }
          body{
              background-image: url(bg.jpg);
          }
          #but{
              margin: 5px;
              color:brown;
          }
          #yourmsg{
              color: brown;
              font-size: 150%;
          }
      </style>
    </head>
<body>
    
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
  <a class="navbar-brand" >Hello <?=$_SESSION['user'] ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    </ul>
    <form class="form-inline my-2 my-lg-0">
        <a href="logout.php">Logout</a>
    </form>
  </div>
</nav>
    
    <div id="result" class="container">
        <?php include("load.php"); ?>
    </div>
    <div class="container">
    <form method="get" action="#" onsubmit="return post()">
    <div class="form-group">
        <input type="text" style="display:none" id="hiddeninp" value="<?= $_SESSION['id'] ?>">
        <label for="message" id="yourmsg">Type your message.</label>
        <textarea class="form-control" id="message" rows="3"></textarea>
        <button type="submit" id="but">send message</button>
    </div>
    </form>
    </div>
 <?php include("bootstraplower.php"); ?>
 <?php include("jquery.php"); ?>
    <script>
 function autoRefresh_div()
 {
      $("#result").load("load.php").show();
 }
  setInterval('autoRefresh_div()', 1000);
</script>
      <script type="text/javascript">
       $("#but").click(function(){
           var message=$("#message").val();
              var userid=$("#hiddeninp").val();
              $.ajax({
                 type: "GET",
                 url: "msg.php",
                 data:
                  {
                    message:message,
                    userid:userid,
                  },
                  success: function(result){
                     $("#message").val("");
                  }
              }); 
       });
      </script>
  </body>
</html>