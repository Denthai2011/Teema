<?php 
require_once 'mysql/connect.php';
require_once 'pdf/fpdf.php';

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> AddFont('sarabun','','THSarabunNew.php');
$pdf -> AddFont('sarabun','B','THSarabunNew Bold.php');
$pdf -> AddFont('sarabun','I','THSarabunNew Italic.php');

$pdf -> Image('img/logo.png',92,10,30);
$pdf -> SetY(50);
$pdf -> SetFont('sarabun','B','20');
$pdf -> Cell(0,10,iconv('utf-8','cp874','รายงานผู้ใช้ระบบ'),0,1,'C');
$pdf -> SetFont('sarabun','B','12');
$pdf -> SetX(5);
$pdf -> Cell(20,10,iconv('utf-8','cp874','ชื่อ'),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874','นามสกุล'),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874','เบอร์โทร'),1,0,'C');
$pdf -> Cell(60,10,iconv('utf-8','cp874','ที่อยู่บ้าน'),1,0,'C');
$pdf -> Cell(60,10,iconv('utf-8','cp874','ที่อยุ่ทำงาน'),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874','วันเข้า'),1,1,'C');
$sql = "SELECT * FROM user WHERE urold = 'ผู้เช่า'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $id = $row['id'];
$pdf -> SetX(5);
$pdf -> Cell(20,10,iconv('utf-8','cp874',$row["Name"]),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874',$row["Lname"]),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874',$row["Tel"]),1,0,'C');
$pdf -> Cell(60,10,iconv('utf-8','cp874',$row["Address"]),1,0,'L');
$pdf -> Cell(60,10,iconv('utf-8','cp874',$row["Weddress"]),1,0,'L');
$pdf -> Cell(20,10,iconv('utf-8','cp874',$row["Datein"]),1,1,'C');


};}
$pdf -> SetY(200);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');
$pdf -> Output();
?>