<meta charset="UTF-8">
<?php
include('../condb.php');  
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
$sale_p_id = $_POST["sale_p_id"];
$user_id = $_POST["user_id"];
$sale_p_name = $_POST["sale_p_name"];
$sale_p_lname = $_POST["sale_p_lname"];
$item_type_id = $_POST["item_type_id"];
$sale_p_qtyitem = $_POST["sale_p_qtyitem"];
$datetime = date('Y-m-d H:i:s');

//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 

$sql = "UPDATE sales_person SET  
				sale_p_id='$sale_p_id', 
				user_id='$user_id', 
				sale_p_name='$sale_p_name', 
				sale_p_lname='$sale_p_lname', 
				item_type_id='$item_type_id', 
				sale_p_qtyitem ='$sale_p_qtyitem',
				datetime ='$datetime'
			WHERE sale_p_id='$sale_p_id' ";

$result = mysqli_query($con, $sql) or die("Error in query: $sql " );

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
	echo "<script type='text/javascript'>";
	echo "alert('สำเร็จ');";
	echo "window.location = './addsale_person.php'; ";
	echo "</script>";
} else {
	echo "<script type='text/javascript'>";
	echo "alert('ไม่สำเเร็จ!!!');";
	echo "window.location = '.index.php'; ";
	echo "</script>";
}
?>