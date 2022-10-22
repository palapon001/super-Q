<meta charset="UTF-8">
<?php
include('condb.php');  
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$user_id = $_POST["user_id"];
$name = $_POST["name"];
$lname = $_POST["lname"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE user SET  
				user_id='$user_id', 
				name ='$name',
				lname='$lname'
			WHERE user_id='$user_id' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = 'adduser.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สำเเร็จ!!!');";
	echo "window.location = '.index.php'; ";
	echo "</script>";
}
?>