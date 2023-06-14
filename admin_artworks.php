<?php 
    session_start();
    include("admin.php");
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css_files/admin_artworks.css">
</head>
<body>
    <script>
        function YNconfirm() {
            if (window.confirm('Are you sure you want to delete this artwork?')) {
                return true;
            } else {
                return false;
            }
        };
    </script>

    <p>
        <h1 class="head-table">TABLE: </h1>
        <h1 class="head-user">Artworks</h1><br>
        <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
    </p>

    <form action="delete_artwork.php" method="POST">
        <?php

        $query = "SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, 
                user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath, 
                art_work.art_category
                FROM 
                    art_work,user
                where 
                    art_work.user_id = user.user_id 
                    AND art_work.art_status = 'Available' 
                    ORDER BY ART_WORK.ART_DATE ASC";

        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) <= 0) {
            echo '<h1 align="Center"><br><br><br><br><br><br><br>No Available Artworks </h1>';
        } else {
            while ($row = mysqli_fetch_array($result)) 
            {
                echo 
                    '<div class="space" >
                        <table  class="pic-table">
                            <tr>
                                <td>
                                    <img class="photo" src="pictures/arts/' . $row['art_imagepath'] . '" > <br>' . 
                                    '<a  href=info_art.php?id=' . $row['art_id'] . ' class="desc-title"> ' . $row['art_title'] . ' </a>
                                    
                                    <p class="desc-content">' . $row['art_category'] . '</p>
                                    <p class="desc-content" style="float: right;">' . $row['art_price'] . '.00 BDT</p> <br>
                                    <p class="desc-content2">' . $row['user_fname'] . ' ' . $row['user_mname'] . ' ' . $row['user_lname'] . '</p>
                                    
                                    <p><a class="deletebutton" href =admin_artworks_action.php?delete=' . $row['art_id'] . '&pic=' . $row['art_imagepath'] . ' onclick="return(YNconfirm());"  > Delete </a></p>
                                </td>
                            </tr>
                        </table>
                    </div>'
                ;
            }
        }

        echo "<br><br>";
        ?>
        
        </div>
    </form>
</body>
</html>