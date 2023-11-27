<?php
require_once 'mysql/connect.php';
require_once 'pdf/fpdf.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('sarabun', '', 'THSarabunNew.php');
$pdf->AddFont('sarabun', 'B', 'THSarabunNew Bold.php');
$pdf->AddFont('sarabun', 'I', 'THSarabunNew Italic.php');

$pdf->Image('img/logo.png', 92, 10, 30);
$pdf->SetY(45);
$pdf->SetFont('sarabun', 'B', '20');
$pdf->Cell(0, 10, iconv('utf-8', 'cp874', 'รายงานรายจ่าย/เดือน'), 0, 1, 'C');
$pdf->SetFont('sarabun', 'B', '12');
$pdf->SetX(40);
$pdf->Cell(20, 10, iconv('utf-8', 'cp874', 'ห้อง'), 1, 0, 'C');
$pdf->Cell(30, 10, iconv('utf-8', 'cp874', 'กำหนดจ่าย'), 'L||B||T', 0, 'C');
$pdf->Cell(30, 10, iconv('utf-8', 'cp874', 'ค่าไฟ'), 'R||B||T', 0, 'C');
$pdf->Cell(20, 10, iconv('utf-8', 'cp874', 'ค่าน้ำ'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('utf-8', 'cp874', 'ค่ามัดจำ'), 1, 0, 'C');
$pdf->Cell(20, 10, iconv('utf-8', 'cp874', 'รวม'), 1, 1, 'C');
if (empty($_POST['searchtype'])) {
    $searchtype = "";
}
if (empty($_POST['searchroom'])) {
    $searchid = "";
}
if (empty($_POST['searchdate'])) {
    $searchdate = "";
}
if (isset($_POST['see'])) {
    $searchtype = $_POST['searchtype'];
    $searchid = $_POST['searchid'];
    $searchdate = $_POST['searchdate'];
}
$sql2 = "SELECT month.roomId,month.Date_cack,month.S_EL,month.S_WA,month.Dps,month.total,month.MC_sta,imges.Date_up,imges.file_name,imges.type_img FROM month LEFT JOIN imges ON imges.roomId=month.roomId  WHERE  month.roomId LIKE :searchid AND Date_cack LIKE :searchdate AND MC_sta LIKE :searchtype ORDER by roomId";
$stmt2 = $conn->prepare($sql2);
$stmt2->bindValue(':searchtype', "%$searchtype%", PDO::PARAM_STR);
$stmt2->bindValue(':searchid', "%$searchid%", PDO::PARAM_STR);
$stmt2->bindValue(':searchdate', "%$searchdate%", PDO::PARAM_STR);
$stmt2->execute();
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
if ($result2) {
    foreach ($result2 as $row2) {
        $pdf->SetX(40);
        $pdf->Cell(20, 10, iconv('utf-8', 'cp874', $row2["roomId"]), 'R||L', 0, 'C');
        $pdf->Cell(30, 10, iconv('utf-8', 'cp874', $row2["Date_cack"]), 'L', 0, 'C');
        $pdf->Cell(30, 10, iconv('utf-8', 'cp874', $row2["S_EL"]), 'R', 0, 'C');
        $pdf->Cell(20, 10, iconv('utf-8', 'cp874', $row2["S_WA"]), 'R||L', 0, 'C');
        $pdf->Cell(20, 10, iconv('utf-8', 'cp874', $row2["Dps"]), 'R||L', 0, 'C');
        $pdf->Cell(20, 10, iconv('utf-8', 'cp874', $row2["total"]), 'R||L', 1, 'C');
    };
}
$pdf->SetX(40);
$pdf->Cell(140, 10, iconv('utf-8', 'cp874', "ข้อมูลทั้งหมด " . count($result2)), 1, 0, 'C');


$pdf->SetY(200);
$pdf->SetFont('sarabun', 'B', '10');
$pdf->Cell(0, 0, iconv('utf-8', 'cp874', 'หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'), 0, 1, 'C');
$pdf->Output();
