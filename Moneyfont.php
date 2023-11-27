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
$pdf -> SetX(25);
$pdf -> Cell(40,10,iconv('utf-8','cp874','วันที่'),1,0,'C');
$pdf -> Cell(20,10,iconv('utf-8','cp874','ห้องที่เเจ้ง'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','จำนวนเงิน'),1,0,'C');
$pdf -> Cell(60,10,iconv('utf-8','cp874','ประเภทการจ่าย'),1,1,'C');
if (empty($_POST['search'])) {
    $searchtype = "";
}
if (empty($_POST['searchroom'])) {
    $searchid = "";
}
if (isset($_POST['see'])) {
    $searchtype = $_POST['searchtype'];
    $searchid = $_POST['searchid'];
}
    if (isset($_POST['search'])){
        $home = $_POST['search'];}  // ไม่ต้องใส่ + หรือ ''
        $sql = "SELECT * FROM money WHERE typepay LIKE :searchtype AND roomId LIKE :searchid";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':searchtype', "%$searchtype%", PDO::PARAM_STR);
        $stmt->bindValue(':searchid', "%$searchid%", PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        $totalprice =0;
        foreach ($result as $row) {
            $M_id = $row['M_id'];
            $totalprice += $row['price'];
$pdf -> SetX(25);
$pdf -> Cell(40,20,iconv('utf-8','cp874',$row["Datepay"]),'R||L',0,'C');
$pdf -> Cell(20,20,iconv('utf-8','cp874',$row["roomId"]),'R||L',0,'C');
$pdf -> Cell(40,20,iconv('utf-8','cp874',$row["price"]),'R||L',0,'C');
$pdf -> Cell(60,20,iconv('utf-8','cp874',$row["typepay"]),'R||L',1,'C');
};}
$pdf -> SetX(25);
$pdf -> Cell(160,10,iconv('utf-8','cp874',"รายได้ทั้งหมด ".$totalprice),1,0,'C');

$pdf -> SetY(275);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');
$pdf -> Output();
?>