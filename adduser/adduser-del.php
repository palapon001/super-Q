<?php
include('../condb.php'); 
$user_id = $_REQUEST["user_id"];

$sql = "DELETE FROM user WHERE user_id='$user_id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบ เสร็จสิ้น');";
  echo "window.location = './adduser.php'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>
