<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
}
include '../condb.php';
mysqli_query($con, "SET NAMES UTF8");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include '../HeadDetail.php';
    include '../bootstrap.php';
    ?>
</head>

<body>
    <div class="card">
        <a href="../page.php" class="btn btn-dark "> หน้าหลัก </a>
        <div class="card-body">
            <form neme="form" method="post" action="./additemtype-add.php">
                <label>เพิ่ม itemtype : </label>
                <input class="mt-3 form-control" type="text" name="itemtypename" placeholder="name" />
                <input class="mt-3 form-control" type="submit" neme="save" value="save" />
            </form>
            <p>
            <p>
            <h2>ตาราง ประเภท </h2>
            </p>
            <div class="table-responsive">
                <?php include './additemtype-showtable.php' ?>
            </div>
            </p>
        </div>
    </div>
</body>
</html>