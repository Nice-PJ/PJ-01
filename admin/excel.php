<?php
session_start();
include('../config/server.php');

function filterData($str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

$filename = "repair_export_data-" . date('Ymd') . ".xlsx";

$fields = array('ไอดี', 'ชื่อ-นามสกุล', 'เบอร์โทรศัพท์', 'ประเภทการแจ้งซ่อม', 'อาคาร', 'ห้อง', 'วันที่', 'ข้อมูลเพิ่มเติม', 'สถานะ');

$excelData = implode("\t", array_values($fields)) . "\n";

$query = $connection->query("SELECT * FROM repair ORDER BY name DESC");

if ($query->num_rows > 0) {
    $i = 0;
    while ($row = $query->fetch_assoc()) {
        $i++;
        $rowData = array($i, $row['name'], $row['phone'], $row['devicetype'], $row['building'], $row['room'], $row['date'], $row['message'], $row['status']);
        array_walk($rowData, 'filterData');
        $excelData .= implode("\t", array_values($rowData)) . "\n";
    }
} else {
    $excelData .= 'No records found...' . "\n";
}

header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");

echo $excelData;

exit;
