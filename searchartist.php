<?php include("includes/connection.php");
include("includes/head.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css_files/searchartist.css">
</head>

<body>
    <a class="back" href="artworks.php"> Go back </a>
    <p>
    <h2 class="head-my">Result: </h2>
    <hr class="hr">
    </p>


    <?php
    $name = $_POST['artistname'];

    $query_category = "SELECT user_id,  user_imagepath,user_fname, user_lname FROM user where user_type = 'Artist' AND user_fname LIKE  '%$name%' OR  user_lname LIKE  '%$name%' ";
    $result_category = mysqli_query($conn, $query_category);

    if (mysqli_num_rows($result_category) <= 0) {
        echo '<br><br><br><br><br><br><br><br><h1 align="Center">No Result found </h1>';
    } else {
        while ($row = mysqli_fetch_array($result_category)) {

            echo ' <div class="space">
                            <table class="pic-table">
                                <tr>
                                    <td>
                                        <a  href= "pictures/profile/' . $row['user_imagepath'] . '"> <img class="photo" src="pictures/profile/' . $row['user_imagepath'] . '"> </a>' .

                '<br><a class="desc-title" href="artist_info.php?id=' . $row['user_id'] . '">  ' . $row['user_fname'] . ' ' . $row['user_lname'] . ' </a> <br>

                                        <a class="desc-content2" href="artist_info.php?id=' . $row['user_id'] . '">  See More. . . </a>
                                    </td>
                                </tr>
                            </table>
                        </div>';
        }
    }
    ?>

    </div>
</body>

</html>