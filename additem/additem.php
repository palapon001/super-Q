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
    <link rel="stylesheet" href="../menu.css">
    <script src="../menu.js"></script>
</head>

<body>

    <!-- Top Navigation Menu -->
    <div class="topnav">
        <a href="../page.php" class="active">System </a>
        <div id="myLinks">
            <a href="../adduser/adduser.php">จัดการ สมาชิก</a>
            <a href="../additem/additem.php">จัดการ สินค้า</a>
            <a href="../additemtype/additemtype.php">จัดการ ประเภทสินค้า</a>
            <a href="../addsale_person/addsale_person.php">จัดการ รับซื้อข้าว</a>
            <a href="../logout.php" class="btn btn-danger">ออกจากระบบ</a>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <form neme="form" method="post" action="additem-add.php">
                <label class="form-label">เพิ่ม item : </label>
                <input class="mt-3 form-control" type="text" name="ItemID" placeholder="ItemID" />
                <input class="mt-3 form-control" type="text" name="ItemName" placeholder="ItemName" />
                <input class="mt-3 form-control" type="number" name="Amount" placeholder="Amount" />
                <input class="mt-3 form-control" type="number" name="Price" placeholder="price" />
                <input class="mt-3 form-control" type="text" name="imageFileName" placeholder="imageFileName" />
                <input class="mt-3 form-control" type="text" name="ItemTypeID" placeholder="itemtypeid" />
                <input class="mt-3 form-control btn btn-primary" type="submit" neme="save" value="save" />
            </form>
            <p>
                <p><h2>ตารางสินค้า</h2></p>
            <div class="table-responsive">
                <?php include './additem-showtable.php' ?>
            </div>
            </p>
        </div>
    </div>
</body>

</html>