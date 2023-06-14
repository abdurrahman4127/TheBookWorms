<?php 
    include("includes/head.php"); 
    include("includes/connection.php"); 
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css_files/artist.css">
    <!-- typing effect for input field -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="javascript_code/search_artist.js"></script>
    <!-- typing effect for input field -->
    <title>Artists</title>
</head>
<form action="searchartist.php" method="POST">
    <body>

        <p class="name">
            <input class="searchbar typing-effect" type="text" id="artistname" name="artistname">
            <input class="searchbtn" type="submit" name="search" value="Search">
        </p>
</form>

<?php
    $sql = "SELECT user_imagepath, user_fname, user_lname,user_id FROM user where user_type = 'Artist'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) <= 0) {
        echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No Artist Available </h1>';
    }
    else {
        $row_count = 0;

        while ($row = mysqli_fetch_array($result)) {
            
            // keep at most 3 artists' info on a horizontal line 
            if ($row_count % 3 == 0) {
                echo '<div class="row">';
            }

            echo '
                <div class="space">
                    <table class="pic-table">
                        <tr>
                            <td>
                                <a href="pictures/profile/' . $row['user_imagepath'] . '">
                                    <img class="photo" src="pictures/profile/' . $row['user_imagepath'] . '">
                                </a><br>
                                
                                <a class="desc-title" href="artist_info.php?id=' . $row['user_id'] . '">
                                    ' . $row['user_fname'] . ' ' . $row['user_lname'] . '
                                </a><br>
                                
                                <a class="desc-content2" href="artist_info.php?id=' . $row['user_id'] . '">
                                    see more...
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>';

            if ($row_count % 3 == 2 || $row_count == mysqli_num_rows($result) - 1) {
                echo '</div>';
            }

            $row_count++;
        }
    }
?>
</body>
</html>