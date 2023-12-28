<?php
    require_once("login.php");
    $meeting_name = $_POST["name"];
    $meeting_type = $_POST["category"];
    $meeting_datetime = $_POST["date"]." ".$_POST["time"].":00";
    $meeting_location = $_POST["location"];

    $number=$_POST["num"];
    $reason=$_POST["reason"];
    $explain=$_POST["explain"];

    $meeting_member=$_POST["member"];

    try{
        $qry = "INSERT INTO `會議記錄`(`會議名稱`,`會議種類`,`開會時間`,`開會地點`) VALUE ('$meeting_name','$meeting_type','$meeting_datetime','$meeting_location')";
        $result = mysqli_query($sql,$qry);
        $qry = "INSERT INTO `討論事項`(`會議名稱`,`提案編號`,`案由`,`說明`) VALUE ('$meeting_name','$number','$reason','$explain')";
        $result = mysqli_query($sql,$qry);
        
        foreach($meeting_member as $value)
        {
            $qry="SELECT `身分證字號` FROM `與會人員` WHERE `姓名`='$value';";
            $result = mysqli_query($sql,$qry);
            $row = mysqli_fetch_assoc($result);
            $ID=$row['身分證字號'];
            
            $qry="INSERT INTO `參與人員`(`會議名稱`,`身分證字號`) VALUE('$meeting_name','$ID')";
            mysqli_free_result($result);  
            $result = mysqli_query($sql,$qry);
                   
        }
        header("Location: 會議資料.php");
    }
    catch (PDOException $e){
        die("新增失敗");
    }
    
?>