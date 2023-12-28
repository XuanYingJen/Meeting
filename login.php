<?php 
        $db_server = '127.0.0.1';
        $db_name='csie_meeting_db';
        $db_user = 'root';
        $db_password = '';    
        try {
            $sql = mysqli_connect($db_server,$db_user,$db_password,$db_name,3306);
        } catch (PDOException $e) {
            die ("資料庫連線失敗");
        }  
?>