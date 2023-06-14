<?php 
    include("admin.php"); 
?>

<?php 
    if (isset($_POST['submit'])) {
        $id = $_POST['deleteuser'];
        $delete = "DELETE FROM rating WHERE rating_id = '$id' ";
        if (mysqli_query($conn, $delete)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
    }
?>


<html>
<head>
    <link rel="stylesheet" href="css_files/admin_comment_rating.css">
</head>

<body class="bodymargin">
    <script>
        function YNconfirm() {
            if (window.confirm('Are you sure you want to delete this rating?')) {
                return true;
            } else
                return false;
        };
    </script>
    <form action="admin_rating.php" method="POST">

        <?php

        $result1 = mysqli_query($conn, "SELECT * FROM rating");

        if (!$result1) {
            die("Query to show fields from table failed");
        }

        if (mysqli_num_rows($result1) <= 0) {
            echo '<h1 align="Center"><br><br><br><br><br><br><br>No Ratings Available </h1>';
        } else {
            $fields_num1 = mysqli_num_fields($result1);

            echo 
                '<p>
                    <h1 class="head-table" >TABLE: </h1>
                    <h1 class="head-user" >Rating</h1><br> 
                    <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
                </p>';

            echo 
                '<table style="position: absolute; top:180px;left:70px;border-collapse: collapse; width: 1050px;">
                <tr class="table-head">';
            // printing table headers

            for ($i = 0; $i < $fields_num1; $i++) {
                $field1 = mysqli_fetch_field($result1);
                echo '<td class="table-data" style="background-color:#308f3f; color:white;" >' . $field1->name . '</td>';
            }
            echo '<td class="table-data" style="background-color:#308f3f; color:white;">&nbsp;&nbsp;&nbsp;&nbsp;ACTION&nbsp;&nbsp;&nbsp;&nbsp;</td>';
            echo "</tr>\n";

            // printing table rows
            while ($row1 = mysqli_fetch_row($result1)) {
                echo '<tr class="rowdesign table-head">';
                echo '<td  class="table-data">' . $row1[0] . '</td>';
                echo '<td  class="table-data">' . $row1[1] . '</td>';
                echo '<td  class="table-data">' . $row1[2] . '</td>';
                echo '<td  class="table-data">' . $row1[3] . '</td>';

                echo '<td> <a  class="delbutton" href="admin_deleterating.php?id=' . $row1[0] . '"onclick="return(YNconfirm());">Delete</a></td>';
                echo "</tr>\n";
            }

            mysqli_free_result($result1);
        }
        ?>
    </form>

</body>

</html>