<?php
session_start();

include '../condb.php';

$user_id = mysqli_real_escape_string($con, $_GET['user_id']);

//2. query ข้อมูลจากตาราง  : 
$sql = "SELECT * FROM user WHERE user_id='$user_id' ";
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
    <div class="card ">
        <div class="card-body">
            <h3 class="card-title">แก้ไขข้อมูล <?php echo $user_id; ?> </h3>
            <p class="card-text">

            <form method="post" action="adduser-edit-db.php">

                <input class="mt-3 form-control" name="member_id" value="<?php echo $user_id; ?>" type="text">

                <select class="mt-3 form-control" name="hname">
                    <option value="<?php echo $hname; ?>" selected> <?php echo $hname; ?> </option>
                    <option value="นาย">นาย</option>
                    <option value="นางสาว">นางสาว</option>
                    <option value="นาง">นาง</option>
                </select>

                <input class="mt-3 form-control" type="text" name="name" value="<?php echo $name; ?>" />

                <input class="mt-3 form-control" name="lname" value="<?php echo $lname; ?>" type="text">

                <input class="mt-3 form-control" name="tel" value="<?php echo $tel; ?>" type="text">

                <button type="button" class='mt-3 btn btn-danger' onclick="history.back() "> ยกเลิก </button>
                <input type="submit" class='mt-3 btn btn-warning' value="แก้ไข">
            </form>

            </p>
        </div>
    </div>

</body>

</html>