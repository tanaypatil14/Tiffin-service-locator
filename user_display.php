<?php
  session_start();
  if(isset($_SESSION['user']))
  {
    include_once 'admin/includes/config.php';
    $user = $_SESSION["user"];
    $userdetail = "SELECT * FROM user_info WHERE u_contact ='$user'";
    $result = $conn->query($userdetail);

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
         $mess_id = $row["mess_id"];
         $tiffin_type = $row["u_tiffin_type"];
       }
     }
  }
  else
  {
    header('Location: cred.php');
    exit();
  }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/main.css">
    <title>User-display data</title>
  </head>
  <body>
    <div class="desktop">
    <div class="sticky">
      <div class="navi">
        <form action="admin/includes/logout.php" method="post">
        <ul style="text-align:right;">
          <li style="color:white;float:left;margin-top:1px;font-weight:bold">Hi <?php echo $_SESSION["role"]; ?></li>
          <li style="color:white;">LOGIN_ID: <?php echo $_SESSION["user"]; ?></li>
          <li><button type="submit" class="listelement" name="logout" style="text-decoration:none;background-color:transparent;border:none;outline:none;"><i class="fa fa-sign-out" aria-hidden="true"></i>LOGOUT</button></li>
        </form></ul>

      </div>
    </div>
    <?php
    $user = $_SESSION["user"];
    $vendor = "SELECT * FROM mess_info WHERE mess_id ='$mess_id'";
    $result = $conn->query($vendor);

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
        if($tiffin_type = 'F'){
          $tiffin_type ="Full Meal";
          $pdf = $row["mess_full_meal"];
        }
        else{
          $tiffin_type ="Half Meal";
          $pdf = $row["mess_half_meal"];
        }
    ?>

    <div class="back" style="height:1300px;">
      <div class="container-fluid">
        <p>.</p>
        <div class="row">
          <div class="col-md-6" style="margin-top:30px;">
              <center><p class="dates"><b>START DATE: </b>15/03/2021</p></center>
          </div>

          <div class="col-md-6" style="margin-top:30px;">
              <center><p class="dates" ><b>END DATE: </b>15/04/2021</p></center>
          </div>
        </div>
        <center><p style="color:#fff;font-size:30px;"><?php echo $row["mess_name"]; echo " ($tiffin_type)"; ?></p></center>
        <center><div>
            <object data="assets/<?php echo "$pdf";?>" type="application/pdf" width="500" height="700">
                <a href="assets/<?php echo "$pdf";?>">full.pdf</a>
            </object>
        </div></center>
        <center><button type="button" name="button" id="myBtn" class="paymentbtn">Payment Details</button></center>

        </div>
    </div>

    <?php
      }
    }
    else
    {
        echo "DATA NOT FETCHED! CHECK THE SYSTEM OR DATABASE";
    }
    ?>
<div class="footer">
  <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
  <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
</div>
</div>


<div class="mobile">
  <div class="sticky">
    <div class="navi">
      <form action="admin/includes/logout.php" method="post">
      <ul style="text-align:right;">
        <li style="color:white;float:left;margin-top:1px;font-weight:bold;font-size:10px;margin-left:-5px;">Hi <?php echo $_SESSION["role"]; ?></li>
        <li><button type="submit" class="listelement" name="logout" style="text-decoration:none;background-color:transparent;border:none;outline:none;font-size:10px;"><i class="fa fa-sign-out" aria-hidden="true"></i>LOGOUT</button></li>
      </form></ul>
    </div>
  </div>
  <?php
  $user = $_SESSION["user"];
  $vendor = "SELECT * FROM mess_info WHERE mess_id ='$mess_id'";
  $result = $conn->query($vendor);

  if($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      if($tiffin_type = 'F'){
        $tiffin_type ="Full Meal";
        $pdf = $row["mess_full_meal"];
      }
      else{
        $tiffin_type ="Half Meal";
        $pdf = $row["mess_half_meal"];
      }
  ?>
  <div class="back1">
    <div class="container-fluid">
      <p>.</p>
      <div class="row">
        <div class="col-md-6" style="margin-top:30px;">
            <center><p class="dates"><b>START DATE: </b>15/03/2021</p></center>
        </div>

        <div class="col-md-6" style="margin-top:30px;">
            <center><p class="dates" ><b>END DATE: </b>15/04/2021</p></center>
        </div>
      </div>
      <center><p style="color:#fff;font-size:30px;"><?php echo $row["mess_name"]; echo " ($tiffin_type)"; ?></p></center>
      <center><div>
          <object data="assets/<?php echo "$pdf";?>" type="application/pdf" width="100%">
              <a href="assets/<?php echo "$pdf";?>">full.pdf</a>
          </object>
      </div></center>
      <center><button type="button" name="button" id="myBtn1" class="paymentbtn">Payment Details</button></center>

      </div>

  </div>
  <?php
    }
  }
  else
  {
      echo "DATA NOT FETCHED! CHECK THE SYSTEM OR DATABASE";
  }
  ?>

  <div class="footer">
    <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
    <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
  </div>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" style="text-align: right;"><b class="x">&times;</b></span>
        <div class="container reg">
          <div class="row">
            <div class="col-md-4">
              <p style="font-family:Oswald;font-size:20px;"><b>PAYMENT:</b> 1000 RS</p>
              <p style="font-family:Oswald;font-size:20px;"><b>BALANCE:</b> 2000 RS</p>
              <p style="font-family:Oswald;font-size:20px;"><b>TOTAL:</b> 3000 RS</p>
            </div>
            <div class="col-md-4">
              <center><img src="assets/gpay.png" width="50%"></center>
              <p style="text-align:center;">Make payment with Google-Pay</p>
            </div>
            <div class="col-md-4">
              <center><img src="assets/phonepay.png" width="50%"></center>
              <p style="text-align:center;">Make payment with Phone-Pay</p>
            </div>
          </div>



        </div>
  </div>
</div>


<script>
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];
    btn.onclick = function() {
      modal.style.display = "block";
    }
    span.onclick = function() {
      modal.style.display = "none";
    }
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>

    <script>
        var modal = document.getElementById('myModal');
        var btn1 = document.getElementById("myBtn1");
        var span = document.getElementsByClassName("close")[0];
        btn1.onclick = function() {
          modal.style.display = "block";
        }
        span.onclick = function() {
          modal.style.display = "none";
        }
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>

  </body>
</html>
