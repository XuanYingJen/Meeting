<?php
    require_once("login.php");
    session_start();
    $meeting_name=$_SESSION["meeting_name"];
    #會議記錄
    $chairman=$_POST["chairman"];
    $recoder=$_POST["recoder"];
    $chairman_speech=$_POST["chairman_speech"];
   
    #決議事項追蹤資料
    $resolutions=$_POST["resolutions"];
    $implementation=$_POST["implementation"];
    $p_motion=$_POST["p_motion"];

    #會議記錄
    $meeting_qry="UPDATE `會議記錄` SET `主席`='$chairman',`記錄人員`='$recoder',`主席致詞`='$chairman_speech' ,`臨時動議`='$p_motion' WHERE `會議名稱`='$meeting_name';";
    mysqli_query($sql,$meeting_qry);

    

    #決議事項追蹤資料
    $track_info_exist_qry="SELECT * FROM `決議事項追蹤資料` WHERE `會議名稱`='$meeting_name';";
    $track_info_exist=mysqli_query($sql,$track_info_exist_qry);
    if(mysqli_num_rows($track_info_exist)>0){
        $report_update_qry="UPDATE `決議事項追蹤資料` SET `決議事項`='$resolutions',`執行情況`='$implementation' WHERE `會議名稱`='$meeting_name';";
        mysqli_query($sql,$report_update_qry);
    }
    else{
        $report_insert_qry="INSERT INTO `決議事項追蹤資料` VALUE ('$meeting_name','$resolutions','$implementation');";
        mysqli_query($sql,$report_insert_qry);
    }

    header("Location: 會議資料.php");
?>