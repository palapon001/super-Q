<meta charset="UTF-8">
<?php
include('../condb.php');  
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$member_id = $_POST["member_id"];
$hname = $_POST["hname"];
$name = $_POST["name"];
$lname = $_POST["lname"];
$tel = $_POST["tel"];

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE user SET  
				member_id='$member_id', 
				hname='$hname',
				name ='$name',
				lname='$lname',
				tel='$tel'
			WHERE member_id='$member_id' ";

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