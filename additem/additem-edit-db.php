<meta charset="UTF-8">
<?php
include('../condb.php');
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$ItemID = $_POST["ItemID"];
$ItemName = $_POST["ItemName"];
$Amount = $_POST["Amount"];
$Price = $_POST["Price"];
$imageFileName = $_POST["imageFileName"];
$ItemTypeID = $_POST["ItemTypeID"];
$Member = $_POST["Member"];
$seller = $_POST["seller"];
$Moisture = $_POST["Moisture"];
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE `item` 
SET 
`ItemID`= '$ItemID',
`ItemName`='$ItemName'
,`Amount`='$Amount',
`Price`='$Price',
`imageFileName`='$imageFileName',
`ItemTypeID`='$ItemTypeID',
`Member`='$Member' ,
`seller`='$seller' ,
`Moisture`='$Moisture' 

WHERE ItemID = '$ItemID' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql ");

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = 'additem.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สำเเร็จ!!!');";
	echo "window.location = '.index.php'; ";
	echo "</script>";
}
?>