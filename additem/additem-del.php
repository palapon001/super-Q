<?php
include('../condb.php'); 
$ItemID = $_POST["ItemID"];

$sql = "DELETE FROM ItemID WHERE ItemID='$ItemID' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบ เสร็จสิ้น');";
  echo "window.location = './additem.php'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>
