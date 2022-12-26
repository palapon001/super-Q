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
            <form neme="form" method="post" action="additem-add.php">
                <label class="form-label">เพิ่ม item : </label>
                <input class="mt-3 form-control" type="text" name="ItemID" placeholder="ItemID" />
                <input class="mt-3 form-control" type="text" name="ItemName" placeholder="ItemName" />
                <input class="mt-3 form-control" type="number" name="Amount" placeholder="Amount" />
                <input class="mt-3 form-control" type="number" name="Price" placeholder="price" />
                <input class="mt-3 form-control" type="text" name="imageFileName"/>
                <input class="mt-3 form-control" type="text" name="ItemTypeID" placeholder="itemtypeid" />
                <input class="mt-3 form-control btn btn-primary" type="submit" neme="save" value="save" />

            </form>
            <p>
            <p>
            <h2>ตารางสินค้า</h2>
            </p>
            <div class="table-responsive">
                <?php include './additem-showtable.php' ?>
            </div>
            </p>
        </div>
    </div>
</body>

</html>