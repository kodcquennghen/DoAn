<?php
class database {
	private $__conn;
     
    // Hàm Kết Nối
    function connect(){
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
        // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'database') or die ('Lỗi kết nối');

        // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }

    }
     
    // Hàm Ngắt Kết Nối
    function dis_connect(){
      // Nếu đang kết nối thì ngắt
        if ($this->__conn){
            mysqli_close($this->__conn);
        }
    }
     
   
     
    // Hàm lấy danh sách
    function get_list($sql){
         // Kết nối
        $this->connect();
        
        $result = mysqli_query($this->__conn, $sql);
        
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        
        $return = array();
        
    // Lặp qua kết quả để đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
        
    // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        
        return $return;
    }
     
    // Hàm lấy 1 record dùng trong trường hợp lấy chi tiết tin
    function get_row($sql){
         // Kết nối
        $this->connect();
        
        $result = mysqli_query($this->__conn, $sql);
        
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        
        $row = mysqli_fetch_assoc($result);
        
    // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        
        if ($row){
            return $row;
        }
        
        return false;
    }
}
?>