<?php
include('../condb.php');
date_default_timezone_set('Asia/Bangkok');
$date = date("Y-m-d");
$time = date("H:i:s");
$saleNo = " SELECT * FROM Sale ";
$no = 0;
$qsaleNo = mysqli_query($con, $saleNo);
while ($f = mysqli_fetch_assoc($qsaleNo)) {
    $no++;
}
echo 'saleNo = ' . $no;
$totalsum = 0;
$tcart = " SELECT * FROM cart ORDER BY Cartno ASC ";
$qcart = mysqli_query($con, $tcart);
while ($f = mysqli_fetch_assoc($qcart)) {
    $sItemName = $f['ItemName'];
    $sQTY = $f['QTY'];
    $sTotalPrice = $f['TotalPrice'];

    echo 'Cartno = ' . $f['Cartno'];
    echo 'ItemName = ' . $f['ItemName'];
    echo 'QTY = ' . $f['QTY'];
    echo 'TotalPrice = ' . $f['TotalPrice'] . '<br>';
    $totalsum += $f['TotalPrice'];

    $sql = "INSERT INTO `saledetail` (`SaleDetailNo`, `SaleNo`, `ItemName`, `QTY`, `TotalPrice`) 
            VALUES (NULL, 'ORDER-$no', '$sItemName', '$sQTY', '$sTotalPrice')";
    $result = mysqli_query($con, $sql) or die("Error in query: $sql ");
}
$sql1 = "INSERT INTO `sale` (`saleno`, `saledate`, `totalsum`) 
            VALUES ('ORDER-$no', '$date-$time', '$totalsum ')";
$result = mysqli_query($con, $sql1) or die("Error in query: $sql1 ");
echo 'totalsum = ' . $totalsum;

$sql2 = "DELETE FROM Cart ";
$result = mysqli_query($con, $sql2) or die("Error in query: $sql2 ");

//}
//ปิดการเชื่อมต่อ database
mysqli_close($con);
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม

if ($result) {
    echo "<script type='text/javascript'>";
    echo "alert('สำเร็จ');";
    echo "window.location = 'addsale.php'; ";
    echo "</script>";
} else {
    echo "<script type='text/javascript'>";
    echo "alert('ผิดพลาด ');";
    echo "</script>";
}
