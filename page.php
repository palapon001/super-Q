<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    echo '<div class="d-flex justify-content-end">';
    echo '<a href="logout.php" class="btn btn-danger">X</a>';
    echo '</div>';
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Admin page</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
    include 'bootstrap.php';
    ?>

    <!-- Simulate a smartphone / tablet -->
    <div class="container">

        <!-- Top Navigation Menu -->
        <div class="topnav">
            <a href="#home" class="active">System</a>
            <div id="myLinks">
                <a href="./adduser/adduser.php">จัดการ สมาชิก</a>
                <a href="./additemtype/additemtype.php">จัดการ ประเภทสินค้า</a>
                <a href="./addsale_person/addsale_person.php">จัดการ รับซื้อข้าว</a>
            </div>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <h1>You are Administrator </h1>
                <p><strong>hi</strong> :&nbsp;<?php print_r($_SESSION); ?> //show detail login
            </div>
        </div>

        <!-- End smartphone / tablet look -->
    </div>

</body>
<script src="./menu.js"></script>

</html>