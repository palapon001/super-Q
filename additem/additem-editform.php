<?php
session_start();

include '../condb.php';

$ItemID = mysqli_real_escape_string($con, $_GET['ItemID']);

//2. query ข้อมูลจากตาราง: 
$sql = "SELECT * FROM item WHERE ItemID='$ItemID' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");
$row = mysqli_fetch_array($result);
extract($row);
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
    <div class="card mt-3">
        <div class="card-body">
            <h3 class="card-title">แก้ไขข้อมูล <?php echo $ItemName; ?> </h3>
            <p class="card-text">
            <form method="post" action="additem-edit-db.php">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ชื่อสินค้า</span>
                    <input class="form-control" type="text" name="ItemName" value="<?php echo $ItemName; ?>" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">จำนวนสินค้า</span>
                    <input class="form-control" type="text" name="Amount" value="<?php echo $Amount; ?>" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ราคา</span>
                    <input class="form-control" type="text" name="Price" value="<?php echo $Price; ?>" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ความชื้น</span>
                    <input class="form-control" type="number" name="Moisture" value="<?php echo $Moisture; ?>" required />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">รูปภาพ</span>
                    <input class="form-control" type="text" name="imageFileName" value="<?php echo $imageFileName; ?>" />
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ประเภทสินค้า</span>
                    <?php include 'selectProductType.php'; ?>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">สมาชิก</span>
                    <?php include 'selectMember.php'; ?>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">สมาชิกใหม่</span>
                    <input class="form-control" type="text" name="seller" placeholder="กรอกชื่อ-นามสกุล" value="<?php echo $seller; ?>" />
                </div>
                    <input type="hidden" name="ItemID" value="<?php echo $ItemID; ?>" />
                    <button type="button" class='mt-3 btn btn-danger' onclick="history.back() "> ยกเลิก </button>
                    <input type="submit" class='mt-3 btn btn-warning' value="แก้ไข">
            </form>
            </p>
        </div>
    </div>
</body>

</html>