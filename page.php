<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
?>

<!doctype html>
<html>

<head>
    <?php
    include 'HeadDetail.php';
    ?>
</head>

<body>
    <?php
    include 'bootstrap.php';
    include 'Nav.php';
    ?>
 <div class="card ">
        <div class="card-body">
        <?php
            include 'Dashboard.php';
            ?>
        </div>
 </div>
    <div class="card container text-center">
        <div class="card-body">
            <?php
            include 'tabbar.php';
            ?>
        </div>
    </div>
</body>

</html>