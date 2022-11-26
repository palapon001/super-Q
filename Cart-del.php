<?php
include('condb.php'); 
$Cartno = $_REQUEST["Cartno"];

$sql = "DELETE FROM cart WHERE Cartno='$Cartno' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบ เสร็จสิ้น');";
  echo "window.location = 'page.php'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>
