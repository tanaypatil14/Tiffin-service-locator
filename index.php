<?php
include_once 'admin/includes/config.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess_Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>

    <div class="desktop">
      <div class="sticky">
        <div class="navi">
          <ul style="text-align:right;">
          <li><a href="cred.php" class="listelement" style="text-decoration:none;"><i class="fa fa-user-circle" aria-hidden="true"></i> LOGIN</a></li>
          </ul>
        </div>
      </div>

      <div class="back">
        <div class="container-fluid">


          <?php
          $sql = "SELECT * FROM mess_info";
          $result = $conn->query($sql);
          $i = 0;
              while ($row = mysqli_fetch_assoc($result))
              {
                if ($i%3 == 0)
                {
                  // echo '<div class="row">';
                }
            ?>
            <div class='col-md-4' style='padding-top:30px;padding-bottom:70px;'>
            <div class='box'>
            <div class='messname' style='font-size:25px;'><?php echo $row['mess_name'] ?></div>
            <div class='imagelogo'>
            <center><img src="assets/messlogo/<?php echo $row['mess_image']?>" width='50%' style='border:1px solid #000;margin-top:15px;'></center>
            </div>
            <div class='star'>
            <center><p>
            <?php
            for ($x = 1; $x <= $row['mess_rating']; $x++)
            {
              echo"&#9733;";
            }
            ?>
            </p></center>
            </div>
                <form action='detail.php' method='GET'>
                <input type='hidden' name='id' value='<?php echo $row['mess_id']?>'>
                <center><button type='submit' class='menubtn'>More</button></center>
                </form>
            </div>
            </div>
            <?php
            if ($i%3 == 2)
            {
              // echo "</div>";
            }
            $i++;
          }
        ?>
        </div>
      </div>
      <div class="footer">
        <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
        <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
      </div>
    </div>


    <div class="mobile">
      <div class="sticky">
        <div class="navi">
          <ul style="text-align:right;">
          <li><a href="cred.php" class="listelement" style="text-decoration:none;"><i class="fa fa-user-circle" aria-hidden="true"></i> LOGIN</a></li>
          </ul>
        </div>
      </div>

      <div class="back1">
        <div class="container-fluid">
          <form action="index.php" method="GET" style='padding-top:50px;padding-bottom:70px;'>
            <input id="search" name="keywords" type="text" placeholder="Enter Mess Name" style="font-family: Oswald;color:#000;background-color:#cfcfd1;width:250px;border:none;outline:none;padding:5px;">
            <input id="submit" style="background-color: #cfcfd1;border:none;outline:none;padding:5px;width:60px;font-family: Oswald;color:#000;" type="submit" value="Search">
            <a href="index.php"><button type="button" style="background-color: #cfcfd1;border:none;outline:none;padding:5px;width:60px;font-family: Oswald;color:#000;" name="button">All</button></a>
          </form>

          <?php
          $keywords = isset($_GET['keywords']) ? '%'.$_GET['keywords'].'%' : '';
          $result = mysqli_query($conn, "SELECT * FROM mess_info where mess_address1 like '$keywords';");
          if($result->num_rows > 0)
          {
            while($row = $result->fetch_assoc())
            {
              $searchid = $row["mess_id"];
            }
          }
          else{
            $searchid = '0';
          }

          ?>

          <?php
          if($searchid != '0'){
            $sql = "SELECT * FROM mess_info WHERE mess_id='$searchid'";
          }
          else{
            $sql = "SELECT * FROM mess_info";
          }

          $result = $conn->query($sql);
          if($result->num_rows > 0)
          {
          $i = 0;
              while ($row = $result->fetch_assoc())

              {
                if ($i%3 == 0)
                {
                  echo "<div class='row'>";
                }
            ?>
            <div class='col-md-4' style='padding-top:80px;padding-bottom:80px;'>
            <div class='box'>
            <div class='messname' style='font-size:25px;'><?php echo $row['mess_name'] ?></div>
            <div class='imagelogo'>
            <center><img src="assets/messlogo/<?php echo $row['mess_image']?>" width='50%' style='border:1px solid #000;margin-top:15px;'></center>
            </div>
            <div class='star'>
            <center><p>
            <?php
            for ($x = 1; $x <= $row['mess_rating']; $x++)
            {
              echo"&#9733;";
            }
            ?>
            </p></center>
            </div>
                <form action='detail.php' method='GET'>
                <input type='hidden' name='id' value='<?php echo $row['mess_id']?>'>
                <center><button type='submit' class='menubtn'>More</button></center>
                </form>
            </div>
            </div>
            <?php
            if ($i%3 == 2)
            {
              echo "</div>";
            }
            $i++;
          }
        }
        else{
          echo "Mess not found.";
        }
        ?>
        </div>
      </div>
      <div class="footer">
        <p style="font-size:30px;color:#fff;margin-top:20px;"><i class="fa fa-facebook-square listelement" aria-hidden="true"></i> <i class="fa fa-twitter-square listelement" aria-hidden="true"></i> <i class="fa fa-instagram listelement" aria-hidden="true"></i></p>
        <p style="font-size:15px;color:#fff;">&copy; 2021 | MessSystems | All rights Reserved. |</p>
      </div>
    </div>











  </body>
  </html>
