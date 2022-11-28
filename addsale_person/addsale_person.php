<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    echo '<a href="../logout.php">Log out</a>';
}
include '../condb.php';
mysqli_query($con, "SET NAMES UTF8");
?>

<form neme="form" method="post" action="addsale_person-add.php">
    <label>เพิ่ม การรับซื้อ: </label>
    <input type="text" name="user_id"  placeholder="user_id" />
    <input type="text" name="sale_p_name"  placeholder="sale_p_name" />
    <input type="text" name="sale_p_lname"  placeholder="sale_p_lname" />
    <input type="text" name="item_type_id"  placeholder="item_type_id" />
    <input type="text" name="sale_p_qtyitem"  placeholder="sale_p_qtyitem" />
    <input type="submit" neme="save" value="save" />
</form>
<?php include './addsale_person-showtable.php'; ?>