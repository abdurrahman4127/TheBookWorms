<!DOCTYPE html>
<html>

<head>
    <title>Log In</title>
    <style type="text/css">
        .error {
            position: absolute;
            top: 100px;
            left: 470px;
            font-family: "Yu Gothic UI Light";
            color: white;
            text-align: center;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid none;
            padding: 10px 10px 10px 10px;
            background-color: #d61717;
            opacity: 0.7;
            z-index: 50;
        }
    </style>
</head>

<body>

    <?php
        include("session.php");
        $servername = "localhost";
        $uname = "root";
        $password1 = "";
        $dbname = "online_art_gallery_database_final";

        // Create connection
        $conn = mysqli_connect($servername, $uname, $password1, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        require_once("form_functions.php");
        require_once("functions.php");

        // START FORM PROCESSING
        if (isset($_POST['submit'])) {
            $errors = array();

            // perform validations on the form data
            $required_fields = array('username', 'password');
            $errors = array_merge($errors, check_required_fields($required_fields, $_POST));

            $fields_with_lengths = array('username' => 50, 'password' => 50);
            $errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

            $username = trim(mysql_prep($conn, $_POST['username']));
            $password = trim(mysql_prep($conn, $_POST['password']));
            $hashed_password = sha1($password);

            if (empty($errors)) {
                $sql = "SELECT username ,password, USER_ID, user_type 
                    FROM user WHERE username = '$username' AND password = '$password'";

                $result_set = mysqli_query($conn, $sql);
                confirm_query($result_set, $conn);

                if (mysqli_num_rows($result_set) == 1) {
                    // username/password authenticated and only 1 match
                    $found_user = mysqli_fetch_array($result_set);
                    $_SESSION['USER_ID'] = $found_user['USER_ID'];
                    $_SESSION['username'] = $found_user['username'];
                    $_SESSION['user_type'] = $found_user['user_type'];   

                    // user type detection
                    if ($_SESSION['user_type'] == "Admin") {
                        redirect_to("account_home.php");
                    } else if ($_SESSION['user_type'] == "Customer" | $_SESSION['user_type'] == "Artist") {
                        // redirect_to("home.php");
                        redirect_to("account_home.php");
                    }
                } 
                
                else { // username/password combo was not found in the database
                    include("login_form.php");
                    echo '<p class="error">Username/password combination incorrect.<br />
                        Please make sure your caps lock key is off and try again.</p>';
                }
            } 
            else {
                if (count($errors)) {
                    echo "There were " . count($errors) . " errors in the form.";
                }
            }
        } 
        
        else { // Form has not been submitted.
            if (isset($_GET['logout']) && $_GET['logout'] == 1) {
                $message = "You are now logged out.";
            }
            $username = "";
            $password = "";
        }

    ?>
</body>

</html>