<?php session_start();
if (!$_SESSION["id"]) {  //check session
    Header("Location: ../index.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 
} else {
    echo '<a href="../logout.php">Log out</a>';
}
include '../condb.php';
mysqli_query($con, "SET NAMES UTF8");
?>

<form neme="form" method="post" action="adduser-add.php">
    <label>เพิ่ม user : </label>
    <input type="text" name="user_id" placeholder="user_id" />
    <select name="hname">
        <option value="" selected disabled hidden ></option>
        <option value="นาย">นาย</option>
        <option value="นางสาว">นางสาว</option>
        <option value="นาง">นาง</option>
    </select>
    <input type="text" name="name" placeholder="name" />
    <input type="text" name="lname" placeholder="lname">
    <input type="number" name="tel" placeholder="tel">
    <input type="submit" neme="save" value="save" />
</form>

<?php include './adduser-showtable.php'; ?>