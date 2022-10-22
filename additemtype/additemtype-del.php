<?php
include('condb.php'); 
$item_type_id = $_REQUEST["item_type_id"];

$sql = "DELETE FROM item_type WHERE item_type_id='$item_type_id' ";
$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
  echo "<script type='text/javascript'>";
  echo "alert('ลบ เสร็จสิ้น');";
  echo "window.location = './additemtype.php'; ";
  echo "</script>";
} else {
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>
