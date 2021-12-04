<?php
  session_start();
  if(isset($_SESSION['ven']))
  {
      include_once 'admin/includes/config.php';
      if(isset($_GET['edit'])) {
          $edit_id = $_GET['edit'];
      }
      else{
        header('Location: vendor.php');
        exit();
      }

  }
  else{
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
    $vendor = "SELECT * FROM mess_info WHERE mess_id ='$edit_id' ";
    $result = $conn->query($vendor);

    if($result->num_rows > 0)
    {
      while($row = $result->fetch_assoc())
      {
         $mess_id = $row["mess_id"];
         $_SESSION['mess_id']= $mess_id;
    ?>
    <div class="desktop">
    <div class="sticky">
      <div class="navi">
        <ul style="text-align:right;">
          <ul style="text-align:right;">
          <li style="color:white;">LOGIN_ID: <?php echo $_SESSION["ven"]; ?></li>
        </ul>
      </div>
    </div>
    <div class="back1" style="padding-top:50px;padding-bottom:50px;">
      <form action="admin/includes/updatevendor.php" id="reg" method="post" enctype="multipart/form-data" style="color:#fff;" onsubmit="validation()">
          <div class="container edit">
            <label for="name"><b>Mess Name : </b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" value="<?php echo $row["mess_name"]; ?>" required><br/>

            <label for="address"><b>Half_Price : </b></label>
            <input type="number" placeholder="Half_Price" name="half_price" id="Half_Price" style="width:100%;padding:5px;margin: 2px 0 2px 0;display: inline-block;border-bottom: 1px solid #000;border-top: none;border-left: none;border-right: none;background: transparent;outline: none;" value="<?php echo $row["half_price"]; ?>" required><br/>

            <label for="address"><b>Full_Price : </b></label>
            <input type="number" placeholder="Full_Price" name="full_price" id="Full_Price" style="width:100%;padding:5px;margin: 2px 0 2px 0;display: inline-block;border-bottom: 1px solid #000;border-top: none;border-left: none;border-right: none;background: transparent;outline: none;" value="<?php echo $row["full_price"]; ?>" required><br/>

            <label for="upload"><b>Mess Logo:</b></label>
            <input type="file" id="myFile" name="file" required><br/>

            <label for="upload"><b>Half_PDF:</b></label>
            <input type="file" id="myFile1" name="halfpdf" required><br/>

            <label for="upload"><b>Full_PDF:</b></label>
            <input type="file" id="myFile2" name="fullpdf" required><br/>

            <center><button type="submit" name="add" style="padding:5px 10px 5px 10px;outline:none;border:none;background-color:#cdf7f7;border-radius:20px;">SUBMIT</button></center>
          </div>
        </form>
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
    <script type="text/javascript">
      function validation(){
        name = document.getElementById('name').value;
        hpr = document.getElementById('Half_Price').value;
        fpr = document.getElementById('Full_Price').value;

        if (/[^A-Za-z\d]/.test(name))
        {
          alert("Special Characters is not accepted in Name..!");
          document.getElementById('name').value = "";
          document.getElementById("reg").action = "#";
          return (false);
        }
      }
    </script>
  </body>
</html>
