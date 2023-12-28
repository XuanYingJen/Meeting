<?php
    require_once("login.php");
    session_start();
    $meeting_name=$_SESSION["meeting_name"];
    $discussion_no=$_POST["no"];
    $reason=$_POST["reason"];
    $explain=$_POST["explain"];
    $resolution_content=$_POST["resolution_content"];
    $exist_qry="SELECT * FROM `討論事項` WHERE `提案編號`='$discussion_no';";
    $result=mysqli_query($sql,$exist_qry);
    if(mysqli_num_rows($result)>0){
        $update_qry="UPDATE `討論事項` SET `決議`='$resolution_content' WHERE `提案編號`='$discussion_no';";
        mysqli_query($sql,$update_qry);
    }
    else{
        $insert_qry="INSERT INTO `討論事項` VALUE ('$meeting_name','$discussion_no','$reason','$explain','$resolution_content');";
        mysqli_query($sql,$insert_qry);
    }
    header("Location: 新增討論事項.php");
?>