<?php 
require_once 'mysql/connect.php';
require_once 'pdf/fpdf.php';

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> AddFont('sarabun','','THSarabunNew.php');
$pdf -> AddFont('sarabun','B','THSarabunNew Bold.php');
$pdf -> AddFont('sarabun','I','THSarabunNew Italic.php');

$pdf -> Image('img/logo.png',92,10,30);
$pdf -> SetY(45);
$pdf -> SetFont('sarabun','B','20');
$pdf -> Cell(0,10,iconv('utf-8','cp874','รายงานผู้ใช้ระบบ'),0,1,'C');
$pdf -> SetFont('sarabun','B','12');
$pdf -> SetX(45);
$pdf -> Cell(20,10,iconv('utf-8','cp874','วันเข้า'),1,0,'C');
$pdf -> Cell(30,10,iconv('utf-8','cp874','ชื่อ'),'L||B||T',0,'C');
$pdf -> Cell(30,10,iconv('utf-8','cp874','นามสกุล'),'R||B||T',0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874','เลขห้อง'),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874','ค่ามัดจำ'),1,1,'C');
if (isset($_POST['research'])) {
    $datest = $_POST['datest'];
    $dateed = $_POST['dateed'];
}
    $sql = "SELECT * FROM renting WHERE Datein BETWEEN :datest AND :dateed";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':datest', $datest, PDO::PARAM_STR);
    $stmt->bindValue(':dateed', $dateed, PDO::PARAM_STR);
    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $renId = $row['renId'];
$pdf -> SetX(45);
$pdf -> Cell(20,10,iconv('utf-8','cp874',$row["Datein"]),'R||L',0,'C');
$pdf -> Cell(30,10,iconv('utf-8','cp874',$row["Name"]),'L',0,'C');
$pdf -> Cell(30,10,iconv('utf-8','cp874',$row["Lname"]),'R',0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874',$row["roomId"]),'R||L',0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874',$row["Deposit"]),'R||L',1,'C');

};}
$pdf -> SetX(45);
$pdf -> Cell(120,10,iconv('utf-8','cp874',"ข้อมูลทั้งหมด ".count($result)),1,0,'C');


$pdf -> SetY(200);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');
$pdf -> Output();
