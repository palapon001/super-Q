<meta charset="UTF-8">
<?php
include('../condb.php');  
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$item_type_id = $_POST["item_type_id"];
$item_type_name = $_POST["item_type_name"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE item_type SET  
				item_type_id='$item_type_id', 
				item_type_name ='$item_type_name'
			WHERE item_type_id='$item_type_id' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = 'additemtype.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สำเเร็จ!!!');";
	echo "window.location = '.index.php'; ";
	echo "</script>";
}
?>