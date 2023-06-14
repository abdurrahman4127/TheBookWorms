<?php
session_start();
include("includes/connection.php");

$user_type = $_SESSION['user_type'];
if ($user_type == 'Artist') {
    include("account.php");
} else {
    include("customer-account.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css_files/orders_planB.css">
</head>
<body>
    <script>
        function YNconfirm() {
            if (window.confirm('Are you sure you want to cancel this order?')) {
                return true;
            } else return false;
        };
    </script>

    <p>
    <h2 class="head-my">My </h2>
    <h2 class="head-orders">Orders</h2>
    <hr class="hr">
    </p>

    <?php
    $user_id = $_SESSION['USER_ID'];
    $query_category1 = "SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness,buy_transaction.transaction_id,buy_transaction.delivery_date,buy_transaction.ordered_no,buy_transaction.ordered_date,buy_transaction.total_price,buy_transaction.shipping_status,user.user_email
                         FROM art_work,user,buy_transaction
                        where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id AND
                            buy_transaction.user_id = '$user_id'";
    $result_category1 = mysqli_query($conn, $query_category1);
    while ($row1 = mysqli_fetch_array($result_category1)) {
        $today = date("Y-m-d");
        $del = $today;
        if ($row1['delivery_date'] == $del) {
            $sqll = "UPDATE buy_transaction SET shipping_status = 'Delivered' WHERE user_id = '$user_id'";
            $result = mysqli_query($conn, $sqll);
        } else {
        }
    }
    ?>

    <?php
    // query displaying orders from a customer
    $query_category = "SELECT art_work.art_id, art_work.art_title,art_work.art_price, user.user_fname, user.user_mname,user.user_lname,art_work.art_description,art_work.art_imagepath,art_work.art_width,art_work.art_height,art_work.art_media,art_work.art_category,user.user_contact,art_work.art_thickness,buy_transaction.transaction_id,buy_transaction.delivery_date,buy_transaction.ordered_no,buy_transaction.ordered_date,buy_transaction.total_price,buy_transaction.shipping_status,user.user_email
                         FROM art_work,user,buy_transaction
                        where buy_transaction.art_id = art_work.art_id AND buy_transaction.user_id = user.user_id AND
                            buy_transaction.user_id = '$user_id'";
    $result_category = mysqli_query($conn, $query_category);
    if (mysqli_num_rows($result_category) <= 0) {
        echo '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><h1 align="Center">No orders </h1>';
    } else {
        while ($row = mysqli_fetch_array($result_category)) {
            if ($row['shipping_status'] == 'Processing') {
                echo '

    <div class="align">

        <button class="accordion">
                <li class="h1">Order # ' . $row['transaction_id'] . ' </li>
                <li class="h1">Total</li>
                <li class="h1">Payment</li>

                <li class="h2">Placed on ' . $row['ordered_date'] . '</li>
                <li class="h2">Taka ' . $row['total_price'] . '</li>
                <li class="h3">Cash On Delivery</li>

                <li class="h4"> ' . $row['shipping_status'] . '</li>
        </button>

        <div class="panel">
                <img class="picture" src="pictures/arts/' . $row['art_imagepath'] . '"><br><br><br>
                <h1 class="item"> ' . $row['art_title'] . '</h1>
                <h2 class="qty">Qty. ' . $row['ordered_no'] . '</h2>

                <h3 class="delivery">[Estimated Date of Arrival: ' . $row['delivery_date'] . ']' .  '</h3>

                <a class="cancel" href="cancel_order.php?id=' . $row['transaction_id'] . '&art_id=
                ' . $row['art_id'] . '&item_num=' . $row['ordered_no'] . '"onclick="return(YNconfirm());"> CANCEL ITEMS</a>

                  <br> <a class = "seemore" href="orders_continue.php?id=' . $row['transaction_id'] . '"> See Info </a>
        </div>
    </div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
</script>
';
            } else {
                echo '

    <div class="align">

        <button class="accordion">
                <li class="h1">Order # ' . $row['transaction_id'] . ' </li>
                <li class="h1">Total</li>
                <li class="h1">Payment</li>

                <li class="h2">Placed on ' . $row['ordered_date'] . '</li>
                <li class="h2">Taka ' . $row['total_price'] . '</li>
                <li class="h3">Cash On Delivery</li>

                <li class="h4"> ' . $row['shipping_status'] . '</li>
        </button>

        <div class="panel">
                <img class="picture" src="pictures/arts/' . $row['art_imagepath'] . '"><br><br><br>
                <h1 class="item"> ' . $row['art_title'] . '</h1>
                <h2 class="qty">Qty. ' . $row['ordered_no'] . '</h2>

                <h3 class="delivery">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Delivered:  ' . $row['delivery_date'] . '</h3>
 <br> <a class = "seemore" href="orders_continue.php?id=' . $row['transaction_id'] . '"> See Info </a>

        </div>


    </div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
</script>
';
            }
        }
    }
    ?>
</body>

</html>