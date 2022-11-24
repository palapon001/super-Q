<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    echo '<a href="../logout.php">Log out</a>';
}
include '../condb.php';
mysqli_query($con, "SET NAMES UTF8");
?>

<form neme="form" method="post" action="additem-add.php">
    <label>เพิ่ม item : </label>
    <input type="text" name="ItemID"  placeholder="ItemID" />
    <input type="text" name="ItemName"  placeholder="ItemName" />
    <input type="number" name="Amount"  placeholder="Amount" />
    <input type="number" name="Price"  placeholder="price" />
    <input type="text" name="imageFileName"  placeholder="imageFileName" />
    <input type="text" name="ItemTypeID"  placeholder="itemtypeid" />
    <input type="submit" neme="save" value="save" />
</form>

<?php include './additem-showtable.php' ?>