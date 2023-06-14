<!-- This file is the place to store all basic functions -->
<?php
    function mysql_prep($connection, $value) {
        $magic_quotes_active = function_exists('mysqli_real_escape_string');
        if ($magic_quotes_active) {
            $value = stripslashes($value);
        }
        $value = mysqli_real_escape_string($connection, $value);
        return $value;
    }

    function redirect_to($location = NULL) {
        if ($location != NULL) {
            header("Location: {$location}");
            exit;
        }
    }

    function confirm_query($result_set, $connection) {
        if (!$result_set) {
            die("Database query failed: " . mysqli_error($connection));
        }
    }
?>

