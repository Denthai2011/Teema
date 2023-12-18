<?php 
require_once 'mysql/connect.php';
require_once 'pdf/fpdf.php';
    $renId = $_GET['renId'];

$pdf = new FPDF();
$pdf -> AddPage();
$pdf -> AddFont('sarabun','','THSarabunNew.php');
$pdf -> AddFont('sarabun','B','THSarabunNew Bold.php');
$pdf -> AddFont('sarabun','I','THSarabunNew Italic.php');
$pdf -> Ln(10);
$pdf -> Image('img/logo.png',92,10,30);
$pdf -> SetY(45);
$pdf -> SetFont('sarabun','B','20');
$pdf -> Cell(0,10,iconv('utf-8','cp874','สัญญาเช่า'),0,1,'C');
$pdf -> Ln(10);
$pdf -> SetFont('sarabun','','16');
$pdf -> SetX(45);


    $sql = "SELECT * FROM renting WHERE renId= :renId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':renId', $renId);
    $stmt->execute();
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if ($result) {
                        foreach ($result as $row) {
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','คุณ '.$row['Name'].' '.$row['Lname'].' ได้ทำสัญญาเช่าโดยได้ทำการเข้ามาทำในวันที่ '.$row['Datein'].' เเละได้ทำการทำชำเงิน'),0,1,'');
if($row['Deppay'] == 1500){
$pdf -> SetX(30);
$pdf -> Cell(0,10,iconv('utf-8','cp874','เป็นจำนวน '.$row['Deppay'].' บาทซึ่งอยู่ในสถานะของ การเช่า'),0,1,'');
$pdf->Ln(10);
$pdf -> Cell(0,10,iconv('utf-8','cp874','กฏการเช่า'),0,1,'C');
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ข้อ1. เมื่อเช่าครบ 3 เดือนหลังจากออกจะมีการคืนค่ามัดจำ 50% ในกรณีที่ผู้เช่าทำตามกฏการเช่า'),0,1,'L');
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ข้อ2. เมื่อมีคนนอกมาอาศัยควรเเจ้งเจ้าของหอพัก หรือ เจ้าหน้าที่ให้ทราบทุกกรณี'),0,1,'L');
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ข้อ3. ห้ามมีการทะเลาะวิวาท กรณีที่มีห้ามเกิน 3 ครั้ง มิฉะนั้นจะถูกฉีกสัญญาการเช่า'),0,1,'L');
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ข้อ4. หากมีการต่อเติมห้องเช่าในรู้เเบบ การเจาะ ทุบ ตัด กรุณาเเจ้งเจ้าของหอพัก หรือ เจ้าหน้าที่'),0,1,'L');
$pdf -> SetX(55);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ให้ทราบทุกกรณี'),0,1,'L');
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ข้อ5. หากพบว่าใช้สารเสพติดชนิดผิดกฏหมายจะถูกฉีกสัญญาทันที'),0,1,'L');
$pdf->Ln(10);
$pdf -> SetX(30);
$pdf -> Cell(0,10,iconv('utf-8','cp874','กฏทั้งหมดนั้นมิได้มีการกลั้นเเกล้งหรือเจตนาทำให้เสียหายเพียงเเต่ต้องการให้เกิดการอยุ่ร่วมกันอย่างสันติเท่านั้น'),0,1,'');

$pdf -> SetY(200);
$pdf -> SetX(150);
$pdf -> Cell(0,0,iconv('utf-8','cp874','ขอเเสดงความนับถือ'),0,1,'');
$pdf -> Image('img/sinatur-transformed.png',150,200,30,30);
$pdf -> SetY(230);
$pdf -> SetX(150);
$pdf -> Cell(0,0,iconv('utf-8','cp874','(นายปรเมษฐ์ ยิ่งนิยม)'),0,1,'');
$pdf -> SetY(260);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');
}
$date15 =  DATE("Y-m-d", strtotime($row['Datein'] . "+15day")) ;
if($row['Deppay'] >= 500 AND $row['Deppay']< 1500){
$pdf -> SetX(30);
$pdf -> Cell(0,10,iconv('utf-8','cp874','เป็นจำนวน '.$row['Deppay'].' บาทซึ่งอยู่ในสถานะของ การจอง'),0,1,'');
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ในสถานะการจองท่านสามารถจองได้ 15 วันหลังจากวันที่จ่าย คือวันที่ '.$date15.' หากเกินกำหนดเเละไม่มีการมาจ่ายครบ'),0,1,'L');
$pdf -> SetX(30);
$pdf -> Cell(0,10,iconv('utf-8','cp874','จะถือว่าท่านได้ยกเลิกการจองด้วยตัวเอง เเละทางหอพักจะหักเงินนั้นเป็นค่าจองให้เนื่องจากถือว่าทำให้ห้องนั้น'),0,1,'L');
$pdf -> SetX(30);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ไม่สามารถใช้งานได้รวมถึงค่าทำความสะอาดสำหรับเตียมห้องพักด้วย'),0,1,'L');
$pdf -> SetX(45);
$pdf -> Cell(0,10,iconv('utf-8','cp874','ทั้งนี้หากท่านชำระตรงกำหนดท่านก็สามารถเข้าเช่าได้ตามปกติเเละจะมีการชดเชยค่ามัดจำภายหลัง'),0,1,'L');


$pdf -> SetY(150);
$pdf -> SetX(150);
$pdf -> Cell(0,0,iconv('utf-8','cp874','ขอเเสดงความนับถือ'),0,1,'');
$pdf -> Image('img/sinatur-transformed.png',150,150,30,30);
$pdf -> SetY(180);
$pdf -> SetX(150);
$pdf -> Cell(0,0,iconv('utf-8','cp874','(นายปรเมษฐ์ ยิ่งนิยม)'),0,1,'');
$pdf -> SetY(200);
$pdf -> SetFont('sarabun','B','10');
$pdf -> Cell(0,0,iconv('utf-8','cp874','หอพักนางตีมะขำธานี 51/46 ม.4 ต.คลองหนึ่ง อ. คลองหลวง จ.ปทุมธานี้ ถนน พหลโยธิน โทร 025161320 โทรศัพท์ 0984610262   Gmail polamet.yingni@vru.ac.th Facebook  Nus’Den'),0,1,'C');}
};}
$pdf -> Output();
