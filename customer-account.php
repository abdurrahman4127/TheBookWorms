<?php
  session_start();
  include("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css_files/customer_account.css">
  <title>My Account</title>
</head>
<body>
  <div class="dpdown">
    <button class="dpbtn">Explore </button>
    <div class="dpdown-content" style="left:0;">
      <a href="artworks.php">Artworks</a>
      <a href="artist.php">Artists</a>
      <a href="customers_guide.php">Art Guide</a>
      ------------------------------------<br>
      <a href="about_us.php"> About Rainbow</a>
    </div>
  </div>

  <?php
  $id = $_SESSION['USER_ID'];
  $query_category = "SELECT user_fname,user_mname,user_lname FROM user WHERE user_id = '$id'";
  $result_category = mysqli_query($conn, $query_category);

  while ($row = mysqli_fetch_array($result_category)) {
    //<a href= "pictures/arts/'.$row[0].'">
    echo
      '<div class="dropdown">' . '<button onclick="myFunction()" class="dropbtn">' . 
      $row['user_fname'] . ' ' . $row['user_mname'] . ' ' . $row['user_lname'] . '' . 
      '' . '&#9660;' . '</button>' . '
        <div id="myDropdown" class="dropdown-content">
          <a href="customer-account.php">Rainbow</a>
          <a href="profile.php">Account Profile</a>
          <a href="logout.php">Log Out</a>
        </div>
      </div>';
  } 
  ?>

  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");

        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];

          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
  </script>
  <ul class="ul">
    <p class="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <li class="li"><a class="a2" href="orders(planb).php">MY ORDERS</a></li>
      <li class="li"> <a class="a2" href="my_collection.php">MY COLLECTIONS</a></li>
    </p>
  </ul>

  <h1 class="RAIN">Book </h1>
  <h1 class="BOW"> Worm </h1>
</body>
</html>