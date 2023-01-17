<?php
session_start();
require ('condb.php');
require ('module/fpdf.php');


date_default_timezone_set('Asia/Bangkok');
$date = date("d-m-Y H:i:s");

$saleno = mysqli_real_escape_string($con, $_GET['saleno']);

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->AddFont('sarabun','B','Sarabun-Bold.php');
$pdf->AddFont('sarabun','','Sarabun-Thin.php');

//set font to arial, bold, 14pt
$pdf->SetFont('sarabun','B',14);
$pdf->Cell(0,10,iconv('utf-8','cp874','ใบเสร็จรับเงิน '.$saleno),0,1,'C');


$pdf->Cell(190	,5,'',0,1);

$pdf->SetFont('sarabun','',10);

$pdf->Cell(120	,5,iconv('utf-8','cp874','โรงสีขาวชุมชนบ้านห้วยข้อง'),0,0);
 $pdf->Cell(25	,5,iconv('utf-8','cp874',''),0,0);
$pdf->Cell(34	,5,iconv('utf-8','cp874','วัน-เวลา '.$date),0,1);
// $pdf->Cell(180,7,iconv('utf-8','cp874',''),0,0,'C');
$pdf->Cell(140	,5,iconv('utf-8','cp874','ที่อยู่'),0,1);
$pdf->Cell(140	,5,iconv('utf-8','cp874','เบอร์โทรศัพท์ 077xxxxxx'),0,0);


$pdf->Cell(190	,20,'',0,1);


$pdf->SetFont('sarabun','',10);
$pdf->Cell(20,7,iconv('utf-8','cp874','ลำดับ'),1,0,'C');
$pdf->Cell(90,7,iconv('utf-8','cp874','รายการสินค้า'),1,0,'C');
$pdf->Cell(40,7,iconv('utf-8','cp874','จำนวน'),1,0,'C');
$pdf->Cell(40,7,iconv('utf-8','cp874','ราคา'),1,1,'C');


$pdf->SetFont('sarabun','',10);


                            
// $qsale = mysqli_query($con, " SELECT * FROM saledetail ");
$qsale = mysqli_query($con,"SELECT * FROM sale INNER JOIN saledetail ON sale.saleno = saledetail.SaleNo where saledetail.SaleNo = '$saleno' ") ;
    $no = 1;
    while ($f = mysqli_fetch_assoc($qsale)) {
     
$pdf->Cell(20,7,iconv('utf-8','cp874',$no),1,0,'C');
$pdf->Cell(90,7,iconv('utf-8','cp874',$f['ItemName']),1,0,'C');
$pdf->Cell(40,7,iconv('utf-8','cp874',$f['QTY']),1,0,'C');
$pdf->Cell(40,7,iconv('utf-8','cp874',$f['TotalPrice']),1,1,'C');
$totalsum = $f['totalsum'];
$no++;                     
 }
                            
                 



$pdf->SetFont('sarabun','',10);
$pdf->Cell(150,7,iconv('utf-8','cp874','รวม'),1,0,'C');
$pdf->Cell(40,7,iconv('utf-8','cp874',$totalsum),1,1,'C');

$pdf->Cell(190,60,'',0,1);


$pdf->Cell(110,7,iconv('utf-8','cp874',''),0,0,'C');
$pdf->Cell(25 ,7,iconv('utf-8','cp874','ลงชื่่อ _____________________________________________ ผู้รับเงิน'),0,0);



$pdf->Output();

?>

