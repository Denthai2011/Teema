<?php
require_once 'mysql/connect.php';
require_once 'pdf/fpdf.php';
$roomId = $_GET['roomId'];
$Date_cack = $_GET['Date_cack'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('sarabun', '', 'THSarabunNew.php');
$pdf->AddFont('sarabun', 'B', 'THSarabunNew Bold.php');
$pdf->AddFont('sarabun', 'I', 'THSarabunNew Italic.php');
$pdf->Image('img/logo.png', 92, 10, 30);
$pdf->SetY(45);
$pdf->SetFont('sarabun', 'B', '20');
$pdf->Cell(0, 10, iconv('utf-8', 'cp874', 'หลักฐานการชำระจ่าย/เดือน'), 0, 1, 'C');
$pdf->SetFont('sarabun', '', '16');
$pdf->SetX(20);
$pdf->SetY(60);
$sql2 = "SELECT month.roomId,month.Date_cack,month.S_EL,month.S_WA,month.Dps,month.total,month.MC_sta,imges.Date_up,imges.file_name,imges.type_img FROM month LEFT JOIN imges ON imges.roomId=month.roomId AND imges.Date_up = month.Date_cack WHERE month.roomId =:roomId AND month.Date_cack =:Date_cack";
$pdf->Cell(30, 10, iconv('utf-8', 'cp874', "ห้อง: $roomId"), 'B', 0, '');
$pdf->SetX(150);
$pdf->Cell(50, 10, iconv('utf-8', 'cp874', "ใบเสร็จวันที่: $Date_cack"),'B', 1, '');
$pdf-> SetY(65);
$pdf->Cell(30, 10, iconv('utf-8', 'cp874', "ชื่อ: $"), 'B', 0, '');
$pdf->SetY(80);
$pdf->Setx(40);
$pdf->Cell(30, 10, iconv('utf-8', 'cp874', "ค่าน้ำ"), 'L||B||T', 0, 'C');
$pdf->Cell(30, 10, iconv('utf-8', 'cp874', "ค่าไฟ"), 'B||T', 0, 'C');
$pdf->Cell(30, 10, iconv('utf-8', 'cp874', "ค่าห้อง"), 'B||T', 0, 'C');
$pdf->Cell(50, 10, iconv('utf-8', 'cp874', "รวม"), 'R||B||T', 1, 'C');
$stmt2 = $conn->prepare($sql2);
$stmt2 -> bindParam(':roomId',$roomId);
$stmt2 -> bindParam(':Date_cack',$Date_cack);
$stmt2->execute();
$result2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
if ($result2) {
    foreach ($result2 as $row2) {
        $pdf->Setx(40);
        $pdf->Cell(30, 10, iconv('utf-8', 'cp874', $row2["S_EL"]), 'R||L', 0, 'C');
        $pdf->Cell(30, 10, iconv('utf-8', 'cp874', $row2["S_WA"]), 'R||L', 0, 'C');
        $pdf->Cell(30, 10, iconv('utf-8', 'cp874', $row2["Dps"]), 'R||L', 0, 'C');
        $pdf->Cell(50, 10, iconv('utf-8', 'cp874', $row2["total"]), 'R||L', 1, 'C');
        $pdf->Setx(40);
        $pdf->Cell(30, 90, iconv('utf-8', 'cp874', ''), 'R||L||B', 0, 'C');
        $pdf->Cell(30, 90, iconv('utf-8', 'cp874', ''), 'R||L||B', 0, 'C');
        $pdf->Cell(30, 90, iconv('utf-8', 'cp874', ''), 'R||L||B', 0, 'C');
        $pdf->Cell(50, 90, iconv('utf-8', 'cp874', ''), 'R||L||B', 1, 'C');
    };
}
$pdf->SetY(200);
$pdf->SetX(70);
$pdf->Cell(80, 10, iconv('utf-8', 'cp874', "สถานะการตรวจสอบ: {$row2['MC_sta']}"), 0, 1, 'C');
$pdf->SetX(70);
$pdf->Cell(80, 50, iconv('utf-8', 'cp874', ""), 0, 1, 'C');

if (empty($row2['file_name'])){
    $pdf->Cell(30, 10, iconv('utf-8', 'cp874', 'ไม่มีรูป'), 'R||L', 0, 'C');
    }
    else{
    $path ="uploads/".$row2['file_name'];
    // Save current position
    $pdf->Image("uploads/" . $row2['file_name'], 84, 210, 50,45);
    }
$pdf->SetY(270);
$pdf->SetFont('sarabun', 'B', '10');
$pdf->Cell(0, 0, iconv('utf-8', 'cp874', 'หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'), 0, 1, 'C');
$pdf->Output();
