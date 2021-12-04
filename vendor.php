<?php
  session_start();
  if(isset($_SESSION['ven'])){
    include_once 'admin/includes/config.php';
  }
  else {
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
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <?php
    $user = $_SESSION["ven"];
    $vendor = "SELECT * FROM mess_info WHERE mess_contact ='$user' ";
    $result = $conn->query($vendor);

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
         $mess_id = $row["mess_id"];
    ?>
    <div class="desktop">
    <div class="sticky">
      <div class="navi">
          <ul style="text-align:right;">
          <li style="color:white;float:left;margin-top:1px;font-weight:bold">Hi <?php echo $_SESSION["role"]; ?></li>
          <li style="color:white;">LOGIN_ID: <?php echo $_SESSION["ven"]; ?></li>
          <li>
            <form action="edit.php" method="get" style="display:inline">
            <button type="submit" class="listelement" name="edit" value="<?php echo $mess_id; ?>" style="text-decoration:none;background-color:transparent;border:none;outline:none;">EDIT</button>
            </form>
          </li>

          <li>
            <form action="admin/includes/logout.php" method="post" style="display:inline">
              <button type="submit" class="listelement" name="logout" style="text-decoration:none;background-color:transparent;border:none;outline:none;"><i class="fa fa-sign-out" aria-hidden="true"></i>LOGOUT</button>

            </form>
          </li>

        </ul>
      </div>
    </div>
    <div class="container-fluid">
    <div class="row">
    <div class="col-1">
      <a href="vendor.php"><button type="button" name="button" style="font-family: 'Oswald', sans-serif;font-family: 'Oswald', sans-serif;font-weight:bold;width:320px;margin-left:-230px;padding:10px;margin-bottom:10px;margin-top:40px;background-color:rgba(255, 255, 255, 0.7);outline:none;border:none;">Home</button></a><br/>
      <a href="vendoruser.php"><button type="button" name="button" style="font-family: 'Oswald', sans-serif;font-family: 'Oswald', sans-serif;font-weight:bold;width:320px;margin-left:-230px;padding:10px;margin-bottom:10px;margin-top:3px;background-color:rgba(255, 255, 255, 0.7);outline:none;border:none;">Service User</button></a><br/>
    </div>
    <div class="col-11">
    <div class="back1">
      <div class="container-fluid">
        <div class="messname" style="font-size:40px;color:#fff;"><?php echo $row["mess_name"]; ?></div>
        <div class="row">
          <div class="col-md-4">
            <div class="credbox" style="margin-left:50px;margin-right:0px;height:300px;width:300px;padding-top:50px;font-family: 'Oswald', sans-serif;">
              <h4 style="text-align:center;margin-bottom:40px;">ADDRESS</h4>
              <p style="text-align:center;"><?php echo $row["mess_address1"]; ?></p>
              <p style="text-align:center;"><?php echo $row["mess_address2"]; ?></p>
              <p style="text-align:center;"><i class="fa fa-mobile" aria-hidden="true" style="font-size:30px;"></i> :<?php echo $row["mess_contact"]; ?></p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="credbox" style="margin-left:50px;margin-right:0px;height:300px;width:300px;padding-top:50px;font-family: 'Oswald', sans-serif;">
              <h4 style="text-align:center;margin-bottom:40px;">MEAL PLANS</h4>
              <center><a href="assets/<?php echo $row["mess_half_meal"]; ?>" target="blank" ><button type="button" name="button" style="padding:5px 10px 5px 10px;outline:none;border:none;background-color:#cdf7f7;margin-bottom:20px;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  HALF MEAL</button></a></center><br/>
              <center><a href="assets/<?php echo $row["mess_full_meal"]; ?>" target="blank" ><button type="button" name="button" style="padding:5px 10px 5px 10px;outline:none;border:none;background-color:#cdf7f7;"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  FULL MEAL</button></a></center>
            </div>
          </div>
          <div class="col-md-4">
            <div class="credbox" style="margin-left:50px;margin-right:0px;height:300px;width:300px;padding-top:50px;font-family: 'Oswald', sans-serif;">
              <h4 style="text-align:center;margin-bottom:40px;">MEAL PRICE LIST</h4>

              <p style="text-align:center;">HALF: <?php echo $row["half_price"]; ?>RS</p><br/>

              <p style="text-align:center;">FULL: <?php echo $row["full_price"]; ?>RS</p><br/>
            </div>
          </div>
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


    </div>
  </div>
</div>
</div>

    <div class="footer">
      <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
      <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
    </div>


    </div>  

    <script>
    function confirmation(u_id){
      if(confirm("Are You Sure Want To Delete?")){
        document.getElementById(u_id).action = "admin/includes/Deletevendor.php";
        return true;
      }
      else{
        return false;
      }
    }
    </script>
  </body>
</html>
