<?php 
require_once 'mysql/connect.php';
require_once 'pdf/fpdf.php';

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> AddFont('sarabun','','THSarabunNew.php');
$pdf -> AddFont('sarabun','B','THSarabunNew Bold.php');
$pdf -> AddFont('sarabun','I','THSarabunNew Italic.php');

$pdf -> Image('img/logo.png',92,10,30);
$pdf -> SetY(40);
$pdf -> SetFont('sarabun','B','20');
$pdf -> Cell(0,10,iconv('utf-8','cp874','รายงานมิเตอร์น้ำ'),0,1,'C');
$pdf -> SetFont('sarabun','B','12');
$pdf -> SetX(25);
$pdf -> Cell(40,10,iconv('utf-8','cp874','ห้อง'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','วันที่จด'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','ค่าน้ำเดือนก่อน'),1,0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874','ค่าน้ำเดือนนี้'),1,1,'C');
if (isset($_POST['search'])){
    $home = $_POST['search']; }
$sql = "SELECT * FROM water WHERE W_id LIKE :search";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':search', "%$home%", PDO::PARAM_STR);
                    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
                            $W_id = $row['W_id'];
$pdf -> SetX(25);
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["W_id"]),'R||L',0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["W_dsave"]),'R||L',0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["W_bef"]),'R||L',0,'C');
$pdf -> Cell(40,10,iconv('utf-8','cp874',$row["W_af"]),'R||L',1,'C');

};}
$pdf -> SetX(25);
$pdf -> Cell(160,10,iconv('utf-8','cp874',"ข้อมูลทั้งหมด ".count($result)),1,0,'C');

$pdf -> SetY(275);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');
$pdf -> Output();
?>