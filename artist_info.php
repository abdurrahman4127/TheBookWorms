<?php 
    include("includes/connection.php");
    include("includes/head.php"); 
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css_files/artist_info.css">
</head>

<body>
    <?php
    $user_id = $_GET['id'];

    // ------------ first query ------------
    $query1 = "SELECT user_imagepath, user_fname, user_lname, user_mname, user_gender, 
                    user_house_number, user_street, user_brgy, user_province, user_contact 
                    FROM 
                        user 
                    WHERE   
                        user_id = '$user_id'";
                        
    $result = mysqli_query($conn, $query1);

    while ($row = mysqli_fetch_array($result)) {
        echo 
            '<h2 class="headspace"> ' . $row['user_fname'] . '\'s Info <hr class="hr" style="border-bottom: 2px solid #2d70d5;"></h2>
            <p></p>
            <div class="backgd"><a  href= "pictures/profile/' . $row['user_imagepath'] . '"> <img class="photo1" src="pictures/profile/' . $row['user_imagepath'] . '"></a>
            <p class = "info-title">Full Name: <br>Gender: <br>City: <br>Country: <br>Contact Info: </p></div>
            <p class = "info-content">' . $row['user_fname'] . ' ' . $row['user_mname'] . '. ' . $row['user_lname'] . '<br>' . $row['user_gender'] . '<br> ' . $row['user_province'] . '<br>Bangladeshi<br>0' . $row['user_contact'] . '</p></div> '
            ;
    }

    // ------------ second query ------------
    $query2 = "SELECT user_fname FROM user WHERE user_id = '$user_id'";
    $result2 = mysqli_query($conn, $query2);
    
    while ($row2 = mysqli_fetch_array($result2)) {
        echo '<h2 class="headspace2"> ' . $row2['user_fname'] . '\'s Artworks <hr class="hr" style="border-bottom: 2px solid #2d70d5;"></h2>';
    }
    
    
    // ------------ third query ------------
    $query3 = "SELECT art_work.art_imagepath, art_work.art_id, art_work.art_title, art_work.art_price, 
            user.user_fname, user.user_mname, user.user_lname, art_work.art_description, art_work.art_imagepath,
            art_work.art_status, art_work.art_category 
            FROM 
                art_work, user 
            WHERE
                art_work.user_id = user.user_id 
                AND art_work.user_id = '$user_id' 
            ORDER BY art_work.art_title ASC";

    $result3 = mysqli_query($conn, $query3);

    if (mysqli_num_rows($result3) <= 0) {
        echo '<br><br><br><br><br><br><br><h1 align="Center">No Artworks Available </h1>';
    } 
    else {
        while ($row1 = mysqli_fetch_array($result3)) {
            echo
                '<div class="space" >
                    <table  class="pic-table">
                        <tr>
                            <td>
                                <img class="photo" src="pictures/arts/' . $row1['art_imagepath'] . '" > <br>' . 
                                '<a  href=info_art.php?id=' . $row1['art_id'] . ' class="desc-title"> ' . $row1['art_title'] . ' </a>
                                <p class="desc-content">' . $row1['art_category'] . '</p>
                                <p class="desc-content" style="float: right;">P' . $row1['art_price'] . '.00</p> <br>
                                <p class="desc-content2">' . $row1['user_fname'] . ' ' . $row1['user_mname'] . ' ' . $row1['user_lname'] . '</p>
                            </td>
                        </tr>
                    </table>
                </div>'
            ;
        }
    }

    ?>
    <br><br><br><br><br><br>
</body>

</html>