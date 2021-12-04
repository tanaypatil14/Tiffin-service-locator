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
      <a href="vendor.php"><button type="button" name="button" style="font-family: 'Oswald', sans-serif;font-weight:bold;width:320px;margin-left:-230px;padding:10px;margin-bottom:10px;margin-top:40px;background-color:rgba(255, 255, 255, 0.7);outline:none;border:none;">Home</button></a><br/>
      <a href="vendoruser.php"><button type="button" name="button" style="font-family: 'Oswald', sans-serif;font-weight:bold;width:320px;margin-left:-230px;padding:10px;margin-bottom:10px;margin-top:3px;background-color:rgba(255, 255, 255, 0.7);outline:none;border:none;">Service User</button></a><br/>
    </div>
    <div class="col-11">
    <div class="back1">
    <div class="messname" style="font-size:40px;color:#fff;"><?php echo $row["mess_name"]; ?></div>
      <?php
        }
      }
      else
      {
          echo "DATA NOT FETCHED! CHECK THE SYSTEM OR DATABASE";
      }
      ?>

      <div class="container-fluid">
      <div class="adj" style="overflow:auto;height:500px;margin-top:100px;">

      <table class="table table-striped" style="background-color:rgba(255, 255, 255, 0.7);font-family: 'Oswald', sans-serif;">
        <thead>
          <tr >
            <th scope="col">NAME OF USER</th>
            <th scope="col">TIFFINE TYPE</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">DELIVERY TIME</th>
            <th scope="col">TOTAL COST</th>
            <th scope="col">TOTAL PAY</th>
            <th scope="col">DELETE ENTRY</th>
          </tr>
        </thead>
        <div class="tabl">
        <tbody>
          <?php
          include_once 'admin/includes/config.php';
          $userinfo = "SELECT * FROM user_info WHERE mess_id='$mess_id'";
          $result = $conn->query($userinfo);

          if($result->num_rows > 0)
          {
           while($row = $result->fetch_assoc())
            {
          ?>
          <tr>
            <td><?php echo $row["u_name"]; ?></td>
            <td><?php echo $row["u_tiffin_type"]; ?></td>
            <td><?php echo $row["u_address"]; ?></td>
            <td><?php echo $row["u_delivery_time"]; ?></td>
            <td>STATIC DATA</td>
            <td>STATIC DATA</td>
            <td>
              <form action="" id="<?php echo $row["u_id"]; ?>" method="post" onsubmit="confirmation(<?php echo $row["u_id"]; ?>)">
                <input type="hidden" name="u_id" value="<?php echo $row["u_id"]; ?>">
                <input type="hidden" name="u_contact" value="<?php echo $row["u_contact"]; ?>">
                <button type="submit" style="background:transparent;border:hidden;"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
            </td>
          </tr>
          <?php
            }
          }
          else
          {
              echo "0 result";
          }
           ?>
        </tbody>
        </div>
      </table>
      </div>
    </div>
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
