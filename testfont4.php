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
$pdf -> Cell(0,10,iconv('utf-8','cp874','รายงานมิเตอร์ไฟ'),0,1,'C');
$pdf -> SetFont('sarabun','B','12');
$pdf -> SetX(5);
$pdf -> Cell(40,10,iconv('utf-8','cp874','ลำดับ'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','ชื่อผู้เเจ้ง'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','ห้องที่เเจ้ง'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','ประเภทของปัญหา'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','สถานะเเจ้ง/ซ๋อม'),1,1,'C');
$sql = "SELECT * FROM report";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $ReId = $row['ReId'];
$pdf -> SetX(5);
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["ReId"]),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["Name"]),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["roomId"]),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["Retype"]),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["Resta"]),1,1,'C');

};}
$pdf -> SetY(275);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');
$pdf -> Output();
?>