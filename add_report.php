<?php
    require_once("login.php");
    session_start();
    $meeting_name=$_SESSION["meeting_name"];
    $report_no=$_POST["report_no"];
    $report_content=$_POST["report_content"];
    $qry="SELECT * FROM `報告事項` WHERE `會議名稱`='$meeting_name' AND `事項編號`='$report_no';";
    $result=mysqli_query($sql,$qry);

    if (mysqli_num_rows($result)>0){
        $qry="UPDATE `報告事項` SET `報告內容`='$report_content' WHERE `會議名稱`='$meeting_name' AND `事項編號`='$report_no';";
        $result=mysqli_query($sql,$qry);
    }
    else{
        $qry="INSERT INTO `報告事項` VALUE('$meeting_name','$report_no','$report_content');";
        $result=mysqli_query($sql,$qry);
    }
    header("Location: 新增報告事項.php");
?>