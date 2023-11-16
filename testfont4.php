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
$pdf -> Cell(40,10,iconv('utf-8','cp874','วันที่เเจ้ง'),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874','ห้องที่เเจ้ง'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','ประเภทของปัญหา'),1,0,'C');
$pdf -> Cell(60,10,iconv('utf-8','cp874','ข้อมูลการเเจ้ง'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','สถานะเเจ้ง/ซ๋อม'),1,1,'C');
if (isset($_POST['research'])){
    $home = $_POST['search'];
$sql = "SELECT * FROM report WHERE roomId LIKE :search || Retype LIKE :search || Resta LIKE :search";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':search', "%$home%", PDO::PARAM_STR);
$stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $ReId = $row['ReId'];
$pdf -> SetX(5);
$pdf -> Cell(40,20,iconv('utf-8','cp874',$row["Datere"]),'R||L',0,'C');
$pdf -> Cell(20,20,iconv('utf-8','cp874',$row["roomId"]),'R||L',0,'C');
$pdf -> Cell(40,20,iconv('utf-8','cp874',$row["Retype"]),'R||L',0,'C');
$pdf -> Cell(60,20,iconv('utf-8','cp874',$row["Redata"]),'R||L',0,'C');
$pdf -> Cell(40,20,iconv('utf-8','cp874',$row["Resta"]),'R||L',1,'C');


};}}
$pdf -> SetX(5);
$pdf -> Cell(200,10,iconv('utf-8','cp874',"ข้อมูลทั้งหมด ".count($result)),1,0,'C');

$pdf -> SetY(275);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');
$pdf -> Output();
?>