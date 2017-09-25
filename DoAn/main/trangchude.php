<?php

$chude = $c_index->getlistchude();
$tacgia = $c_index->getlisttacgia();
$nhaxuatban = $c_index->getlistnhaxuatban();
$chitietsach = $c_index->getSachByChuDe($machude,$current_page);
$chitietchude = $c_index->getChudeByID($machude);

?>