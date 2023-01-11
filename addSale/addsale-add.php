<?php
include('../condb.php');
date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d");
$time = date("H:i:s");
$saleNo = " SELECT * FROM sale ";
$no = 0;
$qsaleNo = mysqli_query($con, $saleNo);
while ($f = mysqli_fetch_assoc($qsaleNo)) {
    $no++;
}
echo 'saleNo = ' . $no;
$totalsum = 0;
$sql1 = "INSERT INTO `sale` (`saleno`, `saledate`, `totalsum`) 
            VALUES ('ORDER-$no', '$date-$time', '$totalsum ')";
$result = mysqli_query($con, $sql1) or die("Error in query: $sql1 ");
echo 'totalsum = ' . $totalsum;

$tcart = " SELECT * FROM cart ORDER BY Cartno ASC ";
$qcart = mysqli_query($con, $tcart);
while ($fcart = mysqli_fetch_assoc($qcart)) {
    $sItemName = $fcart['ItemName'];
    $sQTY = $fcart['QTY'];
    $sTotalPrice = $fcart['TotalPrice'];

    $qsale = mysqli_query($con, " SELECT * FROM item where ItemName = $sItemName  ");
    while ($fqsale = mysqli_fetch_assoc($qsale)) {
        $ItemID = $fqsale['ItemID'];
    }

    echo 'Cartno = ' . $fcart['Cartno'];
    echo 'ItemName = ' . $fcart['ItemName'];
    echo 'QTY = ' . $fcart['QTY'];
    echo 'TotalPrice = ' . $fcart['TotalPrice'] . '<br>';
    $totalsum += $fcart['TotalPrice'];

    $sql = "INSERT INTO `saledetail` (`SaleDetailNo`, `SaleNo`,`ItemID`, `ItemName`, `QTY`,`oldPrice`, `TotalPrice`) 
            VALUES (NULL, 'ORDER-$no','$ItemID','$sItemName', '$sQTY','0', '$sTotalPrice')";
    $result = mysqli_query($con, $sql) or die("Error in query: $sql ");
}
$usale_person = "UPDATE sale SET  
				totalsum = $totalsum
			WHERE saleno ='ORDER-$no' ";
$result1= mysqli_query($con, $usale_person) or die("Error in query: $usale_person " );

$sql2 = "DELETE FROM cart ";
$result = mysqli_query($con, $sql2) or die("Error in query: $sql2 ");

//}
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('สำเร็จ');";
   // echo "window.location = 'addsale.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ผิดพลาด ');";
    echo "</script>";
}
