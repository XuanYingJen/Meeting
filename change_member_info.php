<?php 
    require_once("login.php");
    session_start();
    $ID = $_SESSION["ID"];
    $name = $_POST["name"];
    $sex = $_POST["sex"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $identity = $_SESSION["identity"];
    $qry="UPDATE `與會人員` SET `姓名`='$name',`性別`='$sex',`手機`='$phone',`Email`='$email' WHERE `身分證字號`='$ID';";
    mysqli_query($sql,$qry);
    if($_SESSION["identity"] == "系上老師"){
        $rank=$_POST["rank"];
        $tel=$_POST["tel"];

        $qry="UPDATE `系上老師` SET `職級`='$rank',`辦公室電話`='$tel' WHERE `身分證字號`='$ID';";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "系助理") {
        $tel=$_POST["tel"];

        $qry="UPDATE `系助理` SET `辦公室電話`='$tel' WHERE `身分證字號`='$ID';";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "校外老師") {
        $school=$_POST["school"];
        $department=$_POST["department"];
        $job_name=$_POST["job_name"];
        $tel=$_POST["tel"];
        $address=$_POST["address"];
        $bank_account=$_POST["bank_account"];

        $qry="UPDATE `校外老師` SET `任職學校`='$school',`系所`='$department',`職稱`='$job_name',`辦公室電話`='$tel',`聯絡地址`='$address',`銀行帳號`='$bank_account' WHERE `身分證字號`='$ID';";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "業界專家") {
        $company=$_POST["company"];
        $job_name=$_POST["job_name"];
        $tel=$_POST["tel"];
        $address=$_POST["address"];
        $bank_account=$_POST["bank_account"];

        $qry="UPDATE `業界專家` SET `任職公司`='$company',`職稱`='$job_name',`辦公室電話`='$tel',`聯絡地址`='$address',`銀行帳號`='$bank_account' WHERE `身分證字號`='$ID';";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "學生代表") {
        $student_ID=$_POST["student_ID"];
        $schoolSystem=$_POST["schoolSystem"];
        $degree=$_POST["degree"];

        $qry="UPDATE `學生代表` SET `學號`='$student_ID',`學制`='$schoolSystem',`年級`='$degree' WHERE `身分證字號`='$ID';";
        mysqli_query($sql,$qry);
    }
    header("Location: 人員資料.php");
?>