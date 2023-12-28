<?php 
    require_once("login.php");
    $meeting_name=$_GET["meet_name"];
    $qry="DELETE FROM `會議記錄` WHERE `會議名稱`='$meeting_name';";
    mysqli_query($sql,$qry);

    header("Location: 會議資料.php");
?>