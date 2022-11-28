<?php
include('../condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user_id = $_POST["user_id"];
$sale_p_name = $_POST["sale_p_name"];
$sale_p_lname = $_POST["sale_p_lname"];
$item_type_id = $_POST["item_type_id"];
$sale_p_qtyitem = $_POST["sale_p_qtyitem"];
$datetime = date('Y-m-d H:i:s');
//เพิ่มเข้าไปในฐานข้อมูล
$sql = "INSERT INTO sales_person(user_id,sale_p_name,sale_p_lname,item_type_id,sale_p_qtyitem,datetime)
			 VALUES('$user_id','$sale_p_name','$sale_p_lname','$item_type_id','$sale_p_qtyitem','$datetime' )";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = './addsale_person.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ผิดพลาด ');";
	echo "</script>";
}
?>