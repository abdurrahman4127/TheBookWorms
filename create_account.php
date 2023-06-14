<?php
    include("includes/connection.php");
    include("includes/head.php");
    include("functions.php");

if (isset($_POST['submit'])) {
    // process the form data
    $tmp_file = $_FILES['file_upload']['tmp_name'];
    $target_file = basename($_FILES['file_upload']['name']);

    // directory to move to
    $upload_dir = "pictures/profile";

    /*
    You will probably want to first use file_exists() to make sure
    there isn't already a file by the same name.

    move_uploaded_file will return false if $tmp_file is not a valid upload file
    or if it cannot be moved for any other reason
    */

    if (move_uploaded_file($tmp_file, $upload_dir . "/" . $target_file)) {
        $message = "File uploaded successfully.";
    } 
    else {
        $error = $_FILES['file_upload']['error'];
        $message = $upload_errors[$error];
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $USER_FNAME = $_POST['Fname'];
    $USER_MNAME = $_POST['Mname'];
    $USER_LNAME = $_POST['Lname'];
    $USER_GENDER = $_POST['gender'];
    $USER_AGE = $_POST['age'];
    $USER_BDAY = $_POST['bday'];
    $USER_CONTACT = $_POST['contact'];
    $USER_EMAIL = $_POST['email'];
    $USER_MUNICIPAL = $_POST['municipal'];
    $USER_PROVINCE = $_POST['province'];
    $USER_ZIPCODE = $_POST['zipcode'];
    $USER_BRGY = $_POST['Brgy'];
    $USER_STREET = $_POST['Street'];
    $USER_HOUSE_NUMBER = $_POST['House_num'];
    $user_type = $_POST['type'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username= '" . $username . "' ") or
        die("Failed to query database " . mysqli_error($conn));

    $count = mysqli_fetch_row($query);

    if ($count > 0) {
        echo "
            <script type=\"text/javascript\">
            window.alert('Username Already Exists!');
            window.location.href = 'create_account.php';
            </script>";
    } else {
        $sql = "INSERT INTO user (username, password, USER_FNAME, USER_MNAME, USER_LNAME, 
        USER_GENDER, USER_AGE, USER_BDAY, USER_CONTACT, USER_MUNICIPAL, USER_PROVINCE, USER_ZIPCODE, 
        USER_BRGY, USER_STREET, USER_HOUSE_NUMBER, USER_IMAGEPATH, USER_TYPE, USER_EMAIL) 
        VALUES ('$username', '$password', '$USER_FNAME',  '$USER_MNAME', '$USER_LNAME', '$USER_GENDER',  
        '$USER_AGE',  '$USER_BDAY',  '$USER_CONTACT',  '$USER_MUNICIPAL', 
        '$USER_PROVINCE', '$USER_ZIPCODE', '$USER_BRGY', '$USER_STREET', 
        '$USER_HOUSE_NUMBER', '$target_file', '$user_type', '$USER_EMAIL')";

    if (mysqli_query($conn, $sql)) {
        echo "
            <script type=\"text/javascript\">
                window.alert('You have successfully created an account! Click OK to Login now!');
                window.location.href = 'login_form.php';
            </script>";
        } 
        else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="css_files/create_account.css">
</head>
<body>
    <div class="border">
        <h2 class="signup"> Sign Up </h2>
    </div>

    <!-- uggh!! there goes the input form -->
    <form action="create_account.php" enctype="multipart/form-data" method="POST">
        <h2 class="headspace font infospace"> Account Information
            <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
        </h2>

        <!-- <p class="fsize-title"> -->
        <p class="fsize-text">
            I'm a/an &nbsp;&nbsp;&nbsp;
        </p>

        <select class="select" name="type">
            <option value="Artist" selected>Artist</option>
            <option value="Customer">Customer</option> <!-- by default, it'll be of a customer-type account --> 
        </select></br></br>

        <p class="fsize-text">
            Picture: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </p>

        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <input type="file" class="file" name="file_upload" />
                    </td>
                </tr>
            </tbody>
        </table><br>

        <p class="fsize-text">
            Username: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <!-- <input class="textbox" type="text" required name="username"><br><br> -->
            <input class="user_textbox" type="text" placeholder="(required)*" required name="username"><br><br>

            Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="password" placeholder="(required)*" required name="password">
        </p>
        
        <br>

        <h2 class="font infospace"> Personal Information
            <hr class="hr" style="border-bottom: 2px solid #2d70d5;">
        </h2>

        <p class="fsize-text">

            First name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="Fname" placeholder="(required)*" required name="Fname"><br><br>

            Middle name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="Mname" placeholder="(optional)" name="Mname"><br><br>

            Last name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="Lname" placeholder="(required)*" required name="Lname"><br><br>

            Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <select class="Gender" name="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>

            Birthdate:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="bday" placeholder="(optional)" name="bday"><br><br>

            Contact Number:&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="contact" placeholder="(required)*" required name="contact"><br><br>

            Email address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="Street" placeholder="(required)*" required name="email"><br><br>

            House Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="House_num" placeholder="(optional)" name="House_num"><br><br>

            Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="Street" placeholder="(optional)" name="Street"><br><br>

            Brgy:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="Brgy" placeholder="(optional)" name="Brgy"><br><br>

            City/Municipal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="municipal" placeholder="(optional)" name="municipal"><br><br>

            Province:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="province" placeholder="(optional)" name="province"><br><br>

            Zipcode:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="textbox" type="text" id="zipcode" placeholder="(optional)" name="zipcode"><br><br>
        </p>

        <input class="inputbar" type="submit" name="submit" value="&#10093;&#10093; Create"><br><br><br><br>

    </div>
    </form>

</body>
</html>