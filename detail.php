<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
  header('Location: index.php');
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
</head>
  <body>
    <div class="desktop">
      <?php
      include_once 'admin/includes/config.php';
      $sql = "SELECT * FROM mess_info WHERE mess_id='$id'";
      $result = $conn->query($sql);
      while ($row = mysqli_fetch_assoc($result))
      {
      ?>
    <div class="sticky">
      <div class="navi">
        <ul style="text-align:right;">
        <li><a href="cred.php" class="listelement" style="text-decoration:none;"><i class="fa fa-user-circle" aria-hidden="true"></i> LOGIN</a></li>
        </ul>
      </div>
    </div>
    <div class="back1">
        <h1 class="messname" style="font-size:50px;color:#fff;"><u><?php echo $row['mess_name'] ?></u></h1>
        <div class="container">
        <div class="row">
            <div class="col-md-6">
              <div class="row">
                <center><img src="assets/messlogo/<?php echo $row['mess_image'] ?>" style="border:1px solid #000;margin-top:15px;width:50%;float:left;background-color:rgba(255,255,255,0.3)"></center>
                <p class="star" style="margin-left:70px;font-size:25px;">
                  <?php
                  for ($x = 1; $x <= $row['mess_rating']; $x++)
                  {
                      echo"&#9733;";
                  }
                  ?>
                </p>
              </div>
            </div>
            <div class="col-md-6 address">
              <p style="margin-top:30px;text-align:center;font-size:40px;color:rgba(255, 255, 255, 0.5);font-family: 'Lobster', cursive;"><b>Address:</b></p>
              <p><?php echo $row['mess_address1'] ?></p>
              <p><?php echo $row['mess_address2'] ?></p>
              <p><i class="fa fa-mobile" aria-hidden="true" style="font-size:30px;"></i> :<?php echo $row['mess_contact'] ?></p>
              <div class="row" style="margin-top:30px;">
                <div class="col-6">
                  <center><a href="assets/<?php echo $row['mess_half_meal'] ?>" target="blank" ><button type="button" name="button" style="padding:7px 10px 7px 10px;outline:none;border:none;background-color:#cdf7f7;margin-left:100px;border-radius:20px;">HALF MEAL</button></a></center>
                </div>
                <div class="col-6">
                  <center><a href="assets/<?php echo $row['mess_full_meal'] ?>" target="blank" ><button type="button" name="button" style="padding:7px 10px 7px 10px;outline:none;border:none;background-color:#cdf7f7;margin-left:40px;border-radius:20px;">FULL MEAL</button></a></center>
                </div>
              </div>
            </div>
          </div>
          <center><button type="button" name="button" id="myBtn" class="joinbtn">Join Now</button></center>
        </div>
    </div>

        <div class="footer">
          <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
          <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
        </div>
    </div>

<?php
}
?>


<div class="mobile">
  <?php
  $id = $_GET['id'];
  include_once 'admin/includes/config.php';
  $sql = "SELECT * FROM mess_info WHERE mess_id='$id'";
  $result = $conn->query($sql);
  while ($row = mysqli_fetch_assoc($result))
  {
  ?>
  <div class="sticky">
    <div class="navi">
      <ul style="text-align:right;">
      <li><a href="cred.php" class="listelement" style="text-decoration:none;"><i class="fa fa-user-circle" aria-hidden="true"></i> LOGIN</a></li>
      </ul>
    </div>
  </div>
  <div class="back1">
      <h1 class="messname" style="font-size:30px;color:#fff;"><u><?php echo $row['mess_name'] ?></u></h1>
      <div class="container">
      <div class="row">
          <div class="col-md-6">
            <div class="row" style="margin-left:auto;margin-right:auto;">
              <center><img src="assets/messlogo/<?php echo $row['mess_image'] ?>" style="border:1px solid #000;margin-top:15px;width:50%;background-color:rgba(255,255,255,0.3)"></center>
              <p class="star" style="margin-left:140px;font-size:25px;text-align:center;">
                <?php
                for ($x = 1; $x <= $row['mess_rating']; $x++)
                {
                    echo"&#9733;";
                }
                ?>
              </p>
            </div>
          </div>
          <div class="col-md-6 address">
            <p style="margin-top:30px;text-align:center;font-size:40px;color:rgba(255, 255, 255, 0.5);font-family: 'Lobster', cursive;"><b>Address:</b></p>
            <p><?php echo $row['mess_address1'] ?></p>
            <p><?php echo $row['mess_address2'] ?></p>
            <p><i class="fa fa-mobile" aria-hidden="true" style="font-size:30px;"></i> :<?php echo $row['mess_contact'] ?></p>
            <div class="row" style="margin-top:30px;">
              <div class="col-6">
                <center><a href="assets/<?php echo $row['mess_half_meal'] ?>" target="blank" ><button type="button" name="button" style="padding:10px 10px 10px 10px;width:150px;outline:none;border:none;background-color:#cdf7f7;border-radius:20px;">HALF MEAL</button></a></center>
              </div>
              <div class="col-6">
                <center><a href="assets/<?php echo $row['mess_full_meal'] ?>" target="blank" ><button type="button" name="button" style="padding:10px 10px 10px 10px;width:150px;outline:none;border:none;background-color:#cdf7f7;border-radius:20px;">FULL MEAL</button></a></center>
              </div>
            </div>
          </div>
        </div>
        <center><button type="button" name="button" id="myBtn1" class="joinbtn" style="margin-bottom:30px;width:70%;">Join Now</button></center>
      </div>
  </div>

  <div class="footer">
    <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
    <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
  </div>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" style="text-align: right;"><b class="x">&times;</b></span>
    <h2 style="font-size: 30px;">REGISTRATION</h2>
    <form action="admin/includes/reg.php" id="reg" method="post" enctype="multipart/form-data" onsubmit="validation()">

        <div class="container reg">
          <label for="name"><b>UserName : </b></label>
          <input type="text" placeholder="Enter Name" name="name" id="name" required><br/>

          <label for="address"><b>Address : </b></label>
          <input type="text" placeholder="Enter Address" name="address" id="address" required><br/>


          <label for="phone"><b>Mobile-Number : </b></label>
          <input type="number" placeholder="Enter mobile number" name="phone" id="phone" required><br/>

          <label for="tiffin"><b>Select tiffin-type : </b></label><br/>

          <input type="radio" id="hmeal" name="meal" value="H" required>
          <label for="">Half-Meal</label><br/>

          <input type="radio" id="fmeal" name="meal" value="F" required>
          <label for="">Full-Meal</label><br/>

          <label for="del_time"><b>Delivery Time : </b></label>
          <input type="time" name="del_time" style="width:100%;" required><br/>

          <label for="upload"><b>Upload Document</b></label>
          <input type="file" id="myFile" name="file" style="outline:none;" required><br/><br/>

          <label for="psw"><b>Password : </b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

          <label for="psw"><b>Confirm Password : </b></label>
          <input type="password" placeholder="Enter Password" name="cpsw" id="cpsw" required>

          <input type="hidden" name="mess_id" value="<?php echo $row['mess_id']; ?>">

          <center><button type="submit" name="add" style="padding:5px 10px 5px 10px;outline:none;border:none;background-color:#cdf7f7;border-radius:20px;">SUBMIT</button></center>
        </div>
      </form>
  </div>
</div>
<?php
}
$conn->close();
?>


<script type="text/javascript">
  function  validation(){
    conf = document.getElementById('cpsw').value;
    psw = document.getElementById('psw').value;
    phone = document.getElementById('phone');
    name = document.getElementById('name').value;
    address = document.getElementById('address').value;

    if (!/^[a-zA-Z]+$/.test(name))
    {
      alert("Only alphabet is accepted in Name..!");
      document.getElementById('name').value = "";
      document.getElementById("reg").action = "#";
      return (false);
    }
    // else if (!/^[a-zA-Z]+$/.test(address)){
    //   alert("Only alphabet is accepted in Address..!");
    //   document.getElementById('address').value = "";
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
      document.getElementById("reg").action = "admin/includes/reg.php";
    }
  }
</script>

    <!-- 1).MODAL join -->
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
