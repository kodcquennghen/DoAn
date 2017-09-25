<?php
include('database.php');
class M_index extends database{
	function getlistsachmoi($start,$limit){
		$sql = "SELECT * from sach where Moi =1 limit $start,$limit";
		return $this->get_list($sql);
	}
	function getlistchude()
	{
		$sql = "SELECT * from chude";
		return $this->get_list($sql);
	}
	function getlisttacgia()
	{
		$sql = "SELECT * from tacgia";
		return $this->get_list($sql);
	}
	function getlistnhaxuatban()
	{
		$sql = "SELECT * from nhaxuatban";
		return $this->get_list($sql);
	}
	function getTotalRecordSach(){
		$sql = "SELECT count(*)as Totalrecord from Sach where Moi=1";
		return $this->get_row($sql);
	}
	function getSachByChuDe($machude,$start,$limit)
	{
		$sql = "SELECT * from sach where MaChuDe =$machude limit $start,$limit";
		return $this->get_list($sql);
	}
	function getChudeByID($machude)
	{
		$sql ="SELECT * from chude where machude = $machude";
		return $this->get_row($sql);

	}
	function getTotalRecordSachByChude($machude)
	{
		$sql = "SELECT count(*) as Totalrecord from sach where MachuDe = $machude";
		return $this->get_row($sql);
	}
	function getSachByID($masach)
	{
		$sql = "SELECT * from sach where MaSach = $masach";
		return $this->get_row($sql);
	}
	function getNXBByID($manxb)
	{
		$sql = "SELECT * from nhaxuatban where MaNXB=$manxb";
		return $this->get_row($sql);
	}
	function getTacGiafromThamGia($masach)
	{
		$sql ="SELECT TenTG FROM `tacgia` WHERE MaTacGia in (select MaTacGia from thamgia tg INNER JOIN sach s on s.MaSach = tg.MaSach WHERE s.MaSach=$masach)";
		return $this->get_list($sql);
	}
	function getSachByNXB($manxb,$start,$limit)
	{
		$sql = "SELECT * from sach where MaNXB = $manxb limit $start,$limit";
		return $this->get_list($sql);
	}
	function getTotalRecordSachByNXB($manxb)
	{
		$sql = "SELECT count(*) as Totalrecord from sach where MaNXB = $manxb";
		return $this->get_row($sql);
	}
	
}