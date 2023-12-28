<?php
    require_once("login.php");
    $ID=$_GET["ID"];
    $qry="DELETE FROM `與會人員` WHERE `身分證字號`='$ID';";
    mysqli_query($sql,$qry);

    header("Location: 人員資料.php");
?>