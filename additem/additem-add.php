<?php
include('../condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
$ItemName = $_POST["ItemName"];
$Amount = $_POST["Amount"];
$Price = $_POST["Price"];
$imageFileName = $_POST["imageFileName"];
$ItemTypeID = $_POST["ItemTypeID"];
$Member = $_POST["Member"];
$seller = $_POST["seller"];
$Moisture = $_POST["Moisture"];

// เช็คว่ามีข้อมูลนี้อยู่หรือไม่
$check = "select * from item  where ItemName = '$ItemName' ";
$result1 = mysqli_query($con,$check) or die("$check");
  $num=mysqli_num_rows($result1); 
  if($num > 0)   		
  {
//ถ้ามี username นี้อยู่ในระบบแล้วให้แจ้งเตือน
	   echo "<script>";
	   echo "alert(' มีแล้ว  !');";
	   echo "window.location='additem.php';";
		 echo "</script>";

  }else{
	if($imageFileName == ""){
		$imageFileName = "https://s10q.herokuapp.com/Logo.png" ;
	}
//เพิ่มเข้าไปในฐานข้อมูล
if ($imageFileName == "") {
	$imageFileName = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTVq_1AdQgj9JVocJh8SPhVPDoQxugEO0kB-g&usqp=CAU&fbclid=IwAR1hDAjhrx60gq3dvi1Y_JdKpMkQYVMDp4u2iw78aydVSumURZux_qRObeQ" ;
}
$sql = "INSERT INTO item(ItemName,Amount,Price,imageFileName,ItemTypeID,Member,seller,Moisture)
			 VALUES('$ItemName','$Amount','$Price','$imageFileName','$ItemTypeID','$Member','$seller','$Price*$Moisture')";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );
  }
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = './additem.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ผิดพลาด ');";
	echo "</script>";
}
?>