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
                <label>เพิ่ม user : </label>
                <input type="text" name="user_id" placeholder="user_id" />
                <select name="hname">
                    <option value="" selected disabled hidden></option>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                </select>
                <input type="text" name="name" placeholder="name" />
                <input type="text" name="lname" placeholder="lname">
                <input type="number" name="tel" placeholder="tel">
                <input type="submit" neme="save" value="save" />
            </form>
            <p>
            <p>
            <h2>ตาราง User </h2>
            </p>
            <div class="table-responsive">
                <?php include './adduser-showtable.php'; ?>
            </div>
            </p>
        </div>
    </div>
</body>
</html>