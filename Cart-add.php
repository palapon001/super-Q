<?php
include('../condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$user_id = $_POST["user_id"];
$hname = $_POST["hname"];
$name = $_POST["name"];
$lname = $_POST["lname"];
$tel = $_POST["tel"];
// เช็คว่ามีข้อมูลนี้อยู่หรือไม่
$check = "select * from user  where user_id = '$user_id' ";
$result1 = mysqli_query($con,$check) or die("$check");
  $num=mysqli_num_rows($result1); 
  if($num > 0)   		
  {
//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
	   echo "<script>";
	   echo "alert(' มีแล้ว  !');";
	   echo "window.location='adduser.php';";
		 echo "</script>";

  }else{
//เพิ่มเข้าไปในฐานข้อมูล
$sql = "INSERT INTO user(user_id,hname, name, lname,tel)
			 VALUES('$user_id','$hname','$name', '$lname','$tel')";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );
  }
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = './adduser.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ผิดพลาด ');";
	echo "</script>";
}
?>