<?php

mysql_connect('localhost','root','');
mysql_select_db('test');

$toExport = "<table>";
$toExport .= "<tr><th>NO</th><th>NAMA</th><th>NO.TELPON</th>";

// START DATA
$sqlData = mysql_query("SELECT * FROM sql_to_xls");
while ($rows = mysql_fetch_array($sqlData)) {
	$toExport .= "<tr>";
    $toExport .= "<td>".$rows['id']."</td>";
    $toExport .= "<td>".$rows['nama']."</td>";
    $toExport .= "<td>".$rows['telpon']."</td>";
    $toExport .= "<tr>";
}
// END DATA

$toExport .= "</table>";

$nama_file_nya = 'Export_Data_'.date('YmdHis').'.xls';

file_put_contents($nama_file_nya, $toExport);

// header("Content-type: application/octet-stream");
// header("Content-Disposition: attachment; filename=".$nama_file_nya);
// header("Pragma: no-cache");
// header("Expires: 0");
// echo $header . "\n" . $exportData . "\n";
?>