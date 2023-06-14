<?php
session_start();
include("includes/connection.php");
?>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css_files/head_admin.css">
  <title>Home</title>
</head>

<body>

<!-- new code -->
  <h1 class="BOOK">BOOK</h1>
  <h1 class="WORM">WORM</h1>
<!-- new code -->

  <div class="dpdown">
    <button class="dpbtn">Explore </button>
    <div class="dpdown-content" style="left:0;">
      <a href="artworks.php">Artworks</a>
      <a href="artist.php">Artists</a>
      <a href="artists_guide.php">Art Guide</a>
      ------------------------------------<br>
      <a href="about_us.php"> About ART+BAY</a>
    </div>
  </div>

  <ul>
    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li><a href="admin_user.php">USERS</a></li>
    </li>
    <li>
      <a href="admin_artworks.php">ARTWORKS</a>
    </li>
    <li>
      <a href="admin_orders.php">ORDERS</a>
    </li>
    <li>
      <a href="admin_comment.php">COMMENTS</a>
    </li>
    <li>

      <a href="admin_rating.php">RATINGS</a>
    </li>

    <?php 
      if (isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        
        $sql = "SELECT user_fname,user_mname,user_lname FROM user WHERE user_id = '$id'";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_array($result)) {
          //<a href= "pictures/arts/'.$row[0].'">
          echo
          '<div class="dropdown3">' .
            '<button onclick="myFunction()" class="dropbtn3">' . $row['user_fname'] . ' ' . $row['user_mname'] . ' ' . $row['user_lname'] . '' . '' . '&#9660;' . '</button>' . '
                        <div id="myDropdown" class="dropdown-content3">
                          <a href="account_home.php">Admin Home</a>
                          <a href="admin_editprofile.php">Account Profile</a>
                              <a href="logout.php">Log Out</a>

                        </div>
                    </div>';
        }
      } else {
        include("portal.php");
      }

    ?>

  </ul>
  <script>
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn3')) {
        var dropdowns = document.getElementsByClassName("dropdown-content3");

        for (var i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];

          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }

  </script>

</body>
</html>