<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
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
            <form neme="form" method="post" action="adduser-add.php">
                <label>เพิ่ม สมาชิก : </label>
                <input class="mt-3 form-control" type="text" name="member_id" placeholder="เลขบัตรประชาชน" />
                <select class="mt-3 form-control" name="hname">
                    <option value="" selected disabled hidden>คำนำหน้าชื่อ</option>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                </select>
                <input class="mt-3 form-control" type="text" name="name" placeholder="ชื่อ" />
                <input class="mt-3 form-control" type="text" name="lname" placeholder="นามสกุล">
                <input class="mt-3 form-control" type="number" name="tel" placeholder="เบอร์">
                <input class="mt-3 form-control btn btn-primary" type="submit" neme="save" value="save" />
            </form>
            <p>
            <p>
            <h2>ตาราง User </h2>
            <a href="adduser-export-xls.php" class="btn btn-success" >EXPORT EXCEL</a>
            </p>
            <div class="table-responsive">
                <?php include './adduser-showtable.php'; ?>
            </div>
            </p>
        </div>
    </div>
</body>

</html>