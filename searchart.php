<?php
  include("includes/connection.php");
  include("includes/head.php"); 
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="css_files/search_art.css">
  </head>

  <body>
    <form action="searchart.php" method="POST">
      <select id="Category" name="Category">
        <option value="">CATEGORY</option>
        <option value="Painting">Paintings</option>
        <option value="Sculpture">Sculpture</option>
        <option value="Photography">Photography</option>
        <option value="Drawing">Drawings</option>
      </select>

      <select id="medium" name="Medium">
        <option value="">FOR PAINTIN MEDIUM </option>
        <option value="Airbrush">Airbrush</option>
      </select>

      <select id="Price" name="Price">
        <option value="">PRICE</option>
        <option value="5001">less than 5,000 tk</option>
        <option value="10001">less than 10,000 tk</option>
        <option value="50001">less than 50,000 tk</option>
        <option value="500001">less than 500,000 tk</option>
        <option value="1000001">less than 1,000,000 tk</option>
      </select>

      <input type="submit" name="submit" value="SEARCH">
    </form>

    <br>
    <a class="back" href="artworks.php"> &#10096;&#10096; Go Back </a>

    <?php
    $category = $_POST['Category'];
    $medium = $_POST['Medium'];
    $price = $_POST['Price'];

    $query = "SELECT 
                art_work.art_imagepath, art_work.art_id, art_work.art_title, art_work.art_price, 
                user.user_fname, user.user_mname, user.user_lname, art_work.art_description,
                art_work.art_imagepath, art_work.art_category
              FROM 
                art_work,user
              where 
                art_work.user_id = user.user_id AND (art_category = '$category') 
                OR (art_media = '$medium') 
                OR (art_price between 0 AND '$price') 
              GROUP BY 
                art_work.art_id 
              ORDER BY 
                art_work.art_title ASC";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <= 0) {
      echo '<br><br><br><br><br><br><br><br><br><h1 align="Center">No Results found </h1>';
    } else {
      while ($row = mysqli_fetch_array($result)) {
        echo
        ' 
          <div class="space">
            <table  class="pic-table">
              <tr>
                <td>
                  <img class="photo" src="pictures/arts/' . $row['art_imagepath'] . '" > <br>' . 
                  '<a  href=info_art.php?id=' . $row['art_id'] . ' class="desc-title"> ' . $row['art_title'] . ' </a>
                  
                  <p class="desc-content">' . $row['art_category'] . '</p>
                  <p class="desc-content" style="float: right;">P' . $row['art_price'] . '.00</p> <br>
                  <p class="desc-content2">' . $row['user_fname'] . ' ' . $row['user_mname'] . ' ' . $row['user_lname'] . '</p>
                </td>
              </tr>
            </table>
          </div>
        ';
      }
    }
  ?>
</body>
</html>