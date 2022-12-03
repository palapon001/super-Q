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
                <input class="mt-3 form-control" type="text" name="user_id" placeholder="user_id" />
                <select class="mt-3 form-control" name="hname">
                    <option value="" selected disabled hidden></option>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                </select>
                <input class="mt-3 form-control" type="text" name="name" placeholder="name" />
                <input class="mt-3 form-control" type="text" name="lname" placeholder="lname">
                <input class="mt-3 form-control" type="number" name="tel" placeholder="tel">
                <input class="mt-3 form-control" type="submit" neme="save" value="save" />
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