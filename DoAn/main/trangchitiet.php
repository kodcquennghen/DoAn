<?php 
$chitietsach = $c_index->getSachByID($masach);
$chitietchude = $c_index->getChudeByID($chitietsach['MaChuDe']);
$chitietnhaxuatban = $c_index->getNXBByID($chitietsach['MaNXB']);
$chitiettacgia = $c_index->getTacGiafromThamGia($masach);
$chude = $c_index->getlistchude();
$tacgia = $c_index->getlisttacgia();
$nhaxuatban = $c_index->getlistnhaxuatban();
 ?>