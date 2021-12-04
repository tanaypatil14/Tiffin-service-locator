<?php
  session_start();
 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess_Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    </head>
  <body>
    <div class="desktop">
    <div class="sticky">
      <div class="navi">
        <ul style="text-align:right;">
        <li><a href="index.php" class="listelement" style="text-decoration:none;"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
        </ul>
      </div>
    </div>
    <div class="back1">
    <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">

      </div>
      <div class="col-md-6">
        <div class="credbox">
          <form name="regform" class="formmain" action="admin/includes/login.php" method="post">
            <div style="margin-left:auto;margin-right:auto;">
              <center><img src="assets/avatar.png" width=40% alt="login"></center><br/>
            </div>

            <label for="username">USER-ID:</label>
            <input class="forminput" type="text" id="name" name="username" autocomplete="off" oninput="return check()" required><br/>
            <span id="username" class="text-danger font-weight-bold"></span><br/>

            <label for="password">PASSWORD:</label>
            <input class="forminput" type="password" id="psw" name="password" autocomplete="off" required><br/>
            <span id="pass" class="text-danger font-weight-bold"></span>

            <button type="submit" name="button" id="send" class="submitbtn">LOGIN</button>
            <!-- for wrong username password START-->
            <?php
              if (isset($_SESSION['error']))
              {
              ?>
              <div style="color:red;text-align:center;">
              <?php  echo $_SESSION['error'];
              }
              ?>
              </div>
            <!-- for wrong username password ENDS-->
          </form>

        </div>
      </div>
      <script type="text/javascript">

        function check(){
          var user = document.getElementById('name').value;
          var password = document.getElementById('psw').value;

          if (user != "")
          {
              if ( /[^A-Za-z0-9\d]/.test(user))
              {
                  alert("Only alpha numeric value accepted..!");
                  document.getElementById('name').value = "";
                  return (false);
              }
          }
        }

      </script>
    </div>
    </div>
    <div class="footer">
      <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
      <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
    </div>
    </div>

  </div>



  <div class="mobile">
  <div class="sticky">
    <div class="navi">
      <ul style="text-align:right;">
      <li><a href="index.php" class="listelement" style="text-decoration:none;"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
      </ul>
    </div>
  </div>
<div class="back1">
  <div class="container-fluid">
  <div class="row">

    <div class="col-md-6">
      <div class="credbox">
        <form name="regform" class="formmain" action="admin/includes/login.php" method="post" onsubmit="return check();">
          <div style="margin-left:auto;margin-right:auto;">
            <center><img src="assets/avatar.png" width=40% alt="login"></center><br/>
          </div>

          <div class="form-group">
          <label for="username">USER-ID:</label>
          <input class="forminput" type="text" id="name" name="username"><br/>
          <span id="username" class="text-danger font-weight-bold"></span>
        </div>

          <div class="form-group">
          <label for="password">PASSWORD:</label>
          <input class="forminput" type="password" id="psw" name="password"><br/>
          <span id="pass" class="text-danger font-weight-bold"></span>
        </div>

          <button type="submit" name="button" id="send" class="submitbtn">LOGIN</button>
          <!-- for wrong username password START-->
          <?php
            if (isset($_SESSION['error']))
            {
            ?>
            <div style="color:red;text-align:center;">
            <?php  echo $_SESSION['error'];
            }
            ?>
            </div>
          <!-- for wrong username password ENDS-->
        </form>

      </div>
    </div>

    <div class="col-md-6">

    </div>

      </div>
  </div>
  <div class="footer">
    <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
    <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
  </div>
</div>

</div>



  </body>
</html>
