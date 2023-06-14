<?php
    include("admin.php");
    include("includes/footer.php");
?>
<?php 
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pwd = '';

    $database = 'online_art_gallery_database_final';
    $table = 'user';
    $conn = mysqli_connect($db_host, $db_user, $db_pwd, $database);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>

<?php
    if (isset($_POST['submit'])) {
        $id = $_POST['deleteuser'];
        $delete = "DELETE FROM user WHERE user_id = '$id' ";
        if (mysqli_query($conn, $delete)) {
            echo "Record deleted successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } 
?>

<html>
<head>
    <title>MySQL Table Viewer</title>
    <link rel="stylesheet" href="css_files/admin_user.css">
</head>

<body class="bodymargin">
    <script>
        function YNconfirm() {
            if (window.confirm('Are you sure you want to delete This Account?  (WARNING ALL THE DATA IN THIS ACCOUNT WILL BE DELETED INCLUDING ORDERS, ARTWORKS, RATINGS OF THIS USER AND COMMENTS)')) {
                return true;
            } else
                return false;
        };
    </script>

    <form action="admin_user.php" method="POST">
        <?php

        // sending query
        $query = "SELECT USER_ID, USERNAME, PASSWORD, USER_FNAME, 
                USER_MNAME, USER_LNAME, USER_GENDER, USER_BDAY, USER_CONTACT 
                FROM user WHERE user_type = 'Artist' OR user_type = 'Customer'";
        
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) <= 0) {
            echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No User Accounts Created</h1>';
        } 
        else {
            $fields_num = mysqli_num_fields($result);

            echo 
                '<p>  
                    <h1 class="head-table" >TABLE: </h1>
                    <h1 class="head-user" >User</h1><br>
                    <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
                </p>';

            echo '<table style="position: absolute; top:180px;left:70px;border-collapse: collapse; width: 50px;"><tr class="table-head" >';
            // printing table headers
            for ($i = 0; $i<$fields_num; $i++) {
                $field = mysqli_fetch_field($result);
                echo '<td class="table-data" style="background-color:#308f3f; color:white;">' . $field->name . '</td>';
            }
            echo '<td class="table-data" style="background-color:#308f3f; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;ACTION&nbsp;&nbsp;&nbsp;&nbsp;</td>';
            echo "</tr>\n";

            // printing table rows
            while ($row = mysqli_fetch_array($result)) {
                echo '<tr class="rowdesign table-head">';

                echo 
                    '<td class="table-data">' . $row[0] . '</td>
                    <td class="table-data">' . $row[1] . '</td>
                    <td class="table-data">' . $row[2] . '</td>
                    <td class="table-data">' . $row[3] . '</td>
                    <td class="table-data">' . $row[4] . '</td>
                    <td class="table-data">' . $row[5] . '</td>
                    <td class="table-data">' . $row[6] . '</td>
                    <td class="table-data">' . $row[7] . '</td>
                    <td class="table-data">0' . $row[8] . '</td>';

                // echo '<td><a class="editbtn" href =edituser.php?id=' . $row[0] . '> Modify</a>  <a class="delbutton" href="admin_deleteuser.php?id=' . $row[0] . '" onclick="return(YNconfirm());">Delete</a></td>';
                echo '<td><a class="delbutton" href="admin_deleteuser.php?id=' . $row[0] . '" onclick="return(YNconfirm());">Delete</a></td>';
                echo "</tr>\n";
            }
        }

        mysqli_free_result($result);

        ?>
    </form>
</body>
</html>