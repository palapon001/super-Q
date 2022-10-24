<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    echo '<a href="../logout.php">Log out</a>';
}
include '../condb.php';
mysqli_query($con, "SET NAMES UTF8");
?>

<form neme="form" method="post" action="additemtype-add.php">
    <label>เพิ่ม itemtype : </label>
    <input type="text" name="itemtypename"  placeholder="name" />
    <input type="submit" neme="save" value="save" />
</form>

<?php include './additemtype-showtable.php' ?>