<?php
session_start();
include("includes/head.php");
include("includes/connection.php");
include("functions.php");
?>

<?php
if (!isset($_SESSION['USER_ID'])) {
  redirect_to("login_form.php");
}

$user_id = $_SESSION['USER_ID'];
$art_id = $_SESSION['art_id'];

$query = "SELECT art_work.user_id
        FROM 
          art_work,user
        where 
          art_work.user_id = user.user_id AND art_id = '$art_id'";

$result = mysqli_query($conn, $query);

while ($row11 = mysqli_fetch_array($result)) {
  if ($user_id == $row11['user_id']) {
    echo "<script type=\"text/javascript\">window.alert('You cant buy your own ArtWork');
    window.location.href = 'info_art.php?id=$art_id';</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css_files/shipping.css">
  <title>Shipping</title>
</head>

<body>
  <div id="content">
    <form action="order-summary.php" method="POST"><br><br><br><br>
      <p>
        <h2 class="head-shipping">Shipping </h2>
        <h2 class="head-address">Address</h2><br>
        <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
      </p>

      <!--Values from Database -->
      <p class="fsize">Full Name: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="" required name="name"> <br></p>
      <p class="fsize">House number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="" required name="house_num"> <br></p>
      <p class="fsize">Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" required name="street"> <br></p>
      <p class="fsize">Barangay: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" required name="brgy"> <br></p>
      <p class="fsize">City/Municipality: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" required name="municipal"> <br></p>
      <p class="fsize">Province: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" required name="province"> <br></p>
      <p class="fsize">Zip Code:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="textbox" type="text" id="" name="zipcode"> <br></p>
      <p class="fsize">Mobile Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="" required name="contact"> <br></p>
      
      <p class="fsize">Area:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select id="area" name="area" class="textbox">
          <option value="dhaka">Dhaka</option>
          <option value="khulna">Khulna</option>
          <option value="chittagong">Chittagong</option>
        </select>
      </p>

      <?php
      if ($_SESSION['cat'] == 'Sculpture') {
        echo '<p class="fsize" >Quantity: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="textbox" type="text" id="" required name="items"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Max Amount:  ' . $_SESSION['art_stock'] . ' <br><br><br>  </p>';
      }

      ?>
      <input class="inputbar" type="submit" name="next" value="Next  &#10097;&#10097;">

    </form>
  </div>
</body>
</html>