<?php 
    $name=$_POST["name"];
    $tel=$_POST["tel"];
    $sex=$_POST["sex"];
    $email=$_POST["email"];
    $identity=$_POST["identity"];
    $password=$_POST["password"];
    session_start();
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['tel']);
    unset($_SESSION['sex']);
    unset($_SESSION['password']);
    unset($_SESSION['identity']);
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['identity']=$identity;
    $_SESSION['tel']=$tel;
    $_SESSION['sex']=$sex;
    $_SESSION['password']=$password;
    header("Location: 編輯個人資料2-2.php");
    //echo $_SESSION['identity'];
?>