<?php 
    require_once("login.php");
    session_start();
    $ID = $_SESSION["ID"];
    $add_account = $_SESSION["add_account"];
    $add_password = "123";
    $name = $_SESSION["name"];
    $sex = $_SESSION["sex"];
    $phone = $_SESSION["phone"];
    $email = $_SESSION["email"];
    $identity = $_SESSION["identity"];
    $qry="INSERT INTO `與會人員` VALUE('$ID','$name','$sex','$phone','$email','$add_account','$add_password','$identity');";
    mysqli_query($sql,$qry);
    if($_SESSION["identity"] == "系上老師"){
        $rank=$_POST["rank"];
        $tel=$_POST["tel"];

        $qry="INSERT INTO `系上老師` VALUE('$ID','$rank','$tel');";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "系助理") {
        $tel=$_POST["tel"];

        $qry="INSERT INTO `系助理` VALUE('$ID','$tel');";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "校外老師") {
        $school=$_POST["school"];
        $department=$_POST["department"];
        $job_name=$_POST["job_name"];
        $tel=$_POST["tel"];
        $address=$_POST["address"];
        $bank_account=$_POST["bank_account"];

        $qry="INSERT INTO `校外老師` VALUE('$ID','$school','$department','$job_name','$tel','$address','$bank_account');";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "業界專家") {
        $company=$_POST["company"];
        $job_name=$_POST["job_name"];
        $tel=$_POST["tel"];
        $address=$_POST["address"];
        $bank_account=$_POST["bank_account"];

        $qry="INSERT INTO `業界專家` VALUE('$ID','$company','$job_name','$tel','$address','$bank_account');";
        mysqli_query($sql,$qry);
    }
    elseif ($_SESSION["identity"] == "學生代表") {
        $student_ID=$_POST["student_ID"];
        $schoolSystem=$_POST["schoolSystem"];
        $degree=$_POST["degree"];

        $qry="INSERT INTO `學生代表` VALUE('$ID','$student_ID','$schoolSystem','$degree');";
        mysqli_query($sql,$qry);
    }
    header("Location: 人員資料.php");
?>