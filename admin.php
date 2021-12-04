<?php
  session_start();
  if(isset($_SESSION['adm'])){
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
    <title>Admin panel</title>
  </head>
  <body>
    <div class="desktop">
      <div class="sticky">
        <div class="navi">
          <ul style="text-align:right;">
          <li style="color:white;float:left;margin-top:1px;font-weight:bold">Hi <?php echo $_SESSION["role"]; ?></li>
          <li><a href="index.php" target="_blank" class="listelement" style="text-decoration:none;"><i class="fa fa-home" aria-hidden="true"></i> GO TO SITE</a></li>
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
        <a href="admin.php"><button type="button" name="button" style="font-family: 'Oswald', sans-serif;font-family: 'Oswald', sans-serif;font-weight:bold;width:320px;margin-left:-230px;padding:10px;margin-bottom:10px;margin-top:40px;background-color:rgba(255, 255, 255, 0.7);outline:none;border:none;">Home</button></a><br/>
        <a href="adminuser.php"><button type="button" name="button" style="font-family: 'Oswald', sans-serif;font-family: 'Oswald', sans-serif;font-weight:bold;width:320px;margin-left:-230px;padding:10px;margin-bottom:10px;margin-top:3px;background-color:rgba(255, 255, 255, 0.7);outline:none;border:none;">Admin User</button></a><br/>
      </div>
      <div class="col-11">
      <div class="back1" style="padding-bottom:60px;">
      <br/><br/><br/><br/>

      <div class="adform" style="height:750px;">
      <center><form action="admin/includes/vendor_reg.php" id="reg" method="POST" enctype="multipart/form-data" onsubmit="validation()">
        <table>
          <tr>
            <td><label for="name"><b>MessName : </b></label></td>
            <td style="width:500px;"><input type="text" placeholder="Enter MessName" name="name" id="name" required></td>
          </tr>
          <tr>
            <td><label for="upload"><b>Select Mess-logo</b></label></td>
            <td><input type="file" id="myFile" name="logo"></td>
          </tr>
          <tr>
            <td><label for="rating"><b>Mess-Rating : </b></label></td>
            <td><input type="number" min="0" max="5" placeholder="Enter 0-5 Mess Rating" style="margin-top:7px;margin-bottom:10px;width:200px;padding:10px;border:none;" name="rating" id="rating" required></td>
          </tr>
          <tr>
            <td><label for="address_1"><b>Address Line 1 : </b></label></td>
            <td style="width:500px;"><input type="text" placeholder="Enter Address Line 1" name="address_1" id="address_1" required></td>
          </tr>
          <tr>
            <td><label for="address_2"><b>Address Line 2 : </b></label></td>
            <td style="width:500px;"><input type="text" placeholder="Enter Address Line 2" name="address_2" id="address_2" required></td>
          </tr>
          <tr>
            <tr>
              <td><label for="phone"><b>Mobile-Number : </b></label></td>
              <td><input type="tel" placeholder="Enter mobile number" name="phone" id="phone" required></td>
            </tr>
            <tr>
            <td><label for="upload"><b>Select file for half_meal</b></label></td>
            <td><input type="file" id="myFile" name="file_half"></td>
          </tr>
          <tr>
            <td><label for="upload"><b>Select file for full_meal</b></label></td>
            <td><input type="file" id="myFile" name="file_full"></td>
          </tr>
          <tr>
            <td><label for="half_price"><b>Enter price for half_meal : </b></label></td>
            <td><input type="number" placeholder="Enter price" name="half_price" id="half_price" style="margin-top:7px;margin-bottom:10px;width:200px;padding:10px;border:none;" required></td>
          </tr>
          <tr>
            <td><label for="full_price"><b>Enter price for full_meal : </b></label></td>
            <td><input type="number" placeholder="Enter price" name="full_price" id="full_price" style="margin-top:7px;margin-bottom:10px;width:200px;padding:10px;border:none;" required></td>
          </tr>

          <tr>
            <td><label for="pwd"><b>Password : </b></label></td>
            <td><input type="password" placeholder="Enter password" name="pwd" id="pwd" required></td>
          </tr>
          <tr>
            <td><label for="cpsw"><b>Confirm Password : </b></label></td>
            <td><input type="password" placeholder="Confirm Password" name="cpsw" id="cpsw" required></td>
          </tr>

          <tr>
            <td></td>
            <td><center><button type="submit" name="add" id="send" class="submitbtn" style="background-color:#cdf7f7">SUBMIT</button></center></td>
          </tr>
      </table>
    </form></center>
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


<script type="text/javascript">
  function  validation(){
    rate = document.getElementById('rating').value;
    conf = document.getElementById('cpsw').value;
    psw = document.getElementById('pwd').value;
    phone = document.getElementById('phone');
    name = document.getElementById('name').value;
    address_1 = document.getElementById('address_1').value;
    address_2 = document.getElementById('address_2').value;

    // if (!/^[a-zA-Z]+$/.test(name))
    if (/[^A-Za-z0-9\d]/.test(name))
    {
      alert("Special Characters is not accepted in Name..!");
      document.getElementById('name').value = "";
      document.getElementById("reg").action = "#";
      return (false);
    }
    // else if (/[^A-Za-z0-9\d]/.test(address_1)){
    //   alert("Special characters are not accepted in Address 1..!");
    //   document.getElementById('address_1').value = "";
    //   document.getElementById("reg").action = "#";
    //   return (false);
    // }
    // else if (/[^A-Za-z0-9\d]/.test(address_2)){
    //   alert("Special characters are not accepted in Address 2..!");
    //   document.getElementById('address_2').value = "";
    //   document.getElementById("reg").action = "#";
    //   return (false);
    // }
    else if(phone.value.length!=10){
        alert('Enter correct 10 digit mobile no.');
        document.getElementById("reg").action = "#";
    }
    else if(conf != psw){
      alert('Password Does not Match');
      document.getElementById("reg").action = "#";
    }
    else{
      document.getElementById("reg").action = "admin/includes/vendor_reg.php";
    }
  }
</script>

    <!-- <script>
    function confirmation(mess_id){
      if(confirm("Are You Sure Want To Delete?")){
        document.getElementById(mess_id).action = "admin/includes/Deleteadmin.php";
        return true;
      }
      else{
        return false;
      }
    }
    </script> -->
  </body>
</html>
