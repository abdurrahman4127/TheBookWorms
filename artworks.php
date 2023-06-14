<?php
include("includes/connection.php");
include("includes/head.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Artworks</title>
    <link rel="stylesheet" type="text/css" href="css_files/artworks.css">
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
            <option value="Enamel">Enamel</option>
            <option value="Gouache">Gouache</option>
            <option value="Acrylic">Acrylic</option>
            <option value="Oil">Oil</option>
            <option value="Spray Paint">Spray Paint</option>
            <option value="Tempera">Tempera</option>
            <option value="Watercolor">Watercolor</option>
            <option value="Ink">Ink</option>
            <option value="Gesso">Gesso</option>

            <option value="">FOR SCULPTURE MEDIUM </option>
            <option value="Ceramic">Ceramic</option>
            <option value="Clay">Clay</option>
            <option value="Digital">Digital</option>
            <option value="Fiberglass">Fiberglass</option>
            <option value="Pottery">Pottery</option>
            <option value="Fabric">Fabric</option>
            <option value="Neon">Neon</option>
            <option value="Glass">Glass</option>
            <option value="Interactive">Interactive</option>
            <option value="Latex">Latex</option>
            <option value="Leather">Leather</option>
            <option value="LED">LED</option>
            <option value="Metal">Metal</option>
            <option value="Mosaic">Mosaic</option>
            <option value="Paint">Paint</option>
            <option value="Paper">Paper</option>
            <option value="Paper Mache">Paper Mache</option>
            <option value="Plastic">Plastic</option>
            <option value="Rubber">Rubber</option>
            <option value="Stone">Stone</option>
            <option value="Wax">Wax</option>
            <option value="Wood">Wood</option>
            <option value="Steel">Steel</option>
            <option value="Bronze">Bronze</option>
            <option value="Granite">Granite</option>
            <option value="Marble">Marble</option>

            <option> FOR DRAWING MEDIUM</option>
            <option value="Ballpoint Pen">Ballpoint Pen</option>
            <option value="Chalk">Chalk</option>
            <option value="Charcoal">Charcoal</option>
            <option value="Digital">Digital</option>
            <option value="Graphite">Graphite</option>
            <option value="Ink">Ink</option>
            <option value="Marker">Marker</option>
            <option value="Pastel">Pastel</option>
            <option value="Pencil">Pencil</option>

            <option value="">FOR PHOTOGRAPHY MEDIUM</option>
            <option value="Polaroid">Polaroid</option>
            <option value="Color">Color</option>
            <option value="Digital">Digital</option>
            <option value="C-type">C-type</option>
            <option value="Black & White">Black & White</option>
            <option value="Photogram">Photogram</option>
            <option value="Platinum">Platinum</option>
            <option value="Gelatin">Gelatin</option>
            <option value="Manipulated">Manipulated</option>
        </select>

        <select id="Price" name="Price">
            <option value="">PRICE</option>
            <option value="1001">less than 1000 taka</option>
            <option value="2501">less than 2500 taka</option>
            <option value="5001">less than 5000 taka</option>
            <option value="10001">less than 10000 taka</option>
            <option value="50001">less than 50000 taka</option>
        </select>

        <input type="submit" name="submit" value="SEARCH">
    </form>


    <?php

    $query = "SELECT 
        art_work.art_imagepath, art_work.art_id, art_work.art_title,
        art_work.art_price, user.user_id, user.user_fname, user.user_mname, user.user_lname,
        art_work.art_description, art_work.art_imagepath, art_work.art_status,
        art_work.art_category 
        FROM art_work, user
        WHERE 
        art_work.user_id = user.user_id 
        AND art_work.art_status = 'Available' 
        ORDER BY art_work.art_title ASC";


    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <= 0) {
        echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No Artworks Available </h1>';
    } else {
        while ($row = mysqli_fetch_array($result)) {
            echo
            ' <div class="space" >
                <table  class="pic-table">
                    <tr>
                    <td>
                        <div class="art-details">
                            <img class="photo" src="pictures/arts/' . $row['art_imagepath'] . '"> <br>
                            <a href="info_art.php?id=' . $row['art_id'] . '" class="desc-title">' . '[' .  $row['art_title'] . ']' . '</a>
                            <p class="desc-content">' . 'category: ' . $row['art_category'] . '</p>
                            <div class="price">
                                <a href="artist_info.php?id=' . $row['user_id'] . '" class="desc-content">' . 'author: ' . $row['user_fname'] . ' ' . $row['user_mname'] . ' ' . $row['user_lname'] . '</a>
                                <p class="desc-content">' . 'price: ' . $row['art_price'] . '.00 BDT</p>
                            </div>
                        </div>
                    </td>
                    </tr>
                </table>
            </div>';
        }
    }
    echo "<br><br>";
    ?>
    <p class="title"></p>
</body>


<?php
include("includes/footer.php");
?>