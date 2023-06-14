<?php
  session_start();
  include("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_files/head.css">
  <title>Home</title>
</head>

<script>
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  window.onclick = function(event) {

    if (!event.target.matches('.dropbtn')) {

      var dropdowns = document.getElementsByClassName("dropdown-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {

        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {

          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>

<body>
  <h1 class="BOOK">BOOK</h1>
  <h1 class="WORM">WORM</h1>

  <ul id="ul">
    <li id="li">
      &nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <li id="li">
      <a id="a2" href="home.php">HOME</a>
    </li>
    </li>

    <li id="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li id="li"> <br>
      <div class="dpdown2">
        <span>ARTWORKS</span>
        <div class="dpdown-content2">
          <a href="artworks.php">Available Artworks</a>
          <a href="artworks(sold).php">Sold Artworks</a>
        </div>
      </div>
    </li>
    </li>

    <li id="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li id="li"><a id="a2" href="artist.php">ARTISTS </a></li>
    </li>

    <li id="li"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li id="li"><br>
      <div class="dpdown">
        <span>ART GUIDE</span>
        <div class="dpdown-content">
          <a href="artists_guide.php">Artists' Guide</a>
          <a href="customers_guide.php">Customers' Guide</a>
        </div>
      </div>
    </li>
    </li>

    <li id="li">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <li id="li"><a id="a2" href="about_us.php">ABOUT US</a></li>
    </li>


    <?php 
      if (isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $query_category = "SELECT user_fname, user_mname, user_lname FROM user WHERE user_id = '$id'";
        $result_category = mysqli_query($conn, $query_category);

        while ($row = mysqli_fetch_array($result_category)) {
          // <a href= "pictures/arts/'.$row[0].'">
          echo
          // '<a href= "pictures/profile/'.$row['User_imagepath'].'">' .
          '<div class="dropdown">' .
            '<button onclick="myFunction()" class="dropbtn">' . $row['user_fname'] . ' ' . $row['user_lname'] . '' . '' . '&#9660;' . '</button>' . '
                        <div id="myDropdown" class="dropdown-content">
                          <a href="account_home.php">Rainbow</a>
                          <a href="profile.php">Account Profile</a>
                              <a href="logout.php">Log Out</a>

                        </div>
                    </div>';
        }
      } else {
        include("portal.php");
      }
    ?>

  </ul>

</body>

<?php
  include("includes/footer.php");
?>