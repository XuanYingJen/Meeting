<?php
    require_once 'login.php';
    // 先用變數存前端傳來的輸入。
    // 用$_POST接收對應name的input內容。
    $account=$_POST["account"];
    $password=$_POST["password"];
    $qry="SELECT * FROM `與會人員` WHERE `帳號`='$account' AND `密碼` = '$password'";
    $result = mysqli_query($sql,$qry);
    session_start();
    $_SESSION['account']=$account;
    if($result)
    {
        if (mysqli_num_rows($result)>0) {
            $value=mysqli_fetch_assoc($result);
            if($value["身分"]=="系助理")
             {   header("Location: 首頁.php");}
            else
            {
                header("Location: 首頁2.php");
            }
        }
        else{
            echo"帳號密碼錯誤";
        }
    }   
    else
    {
        echo"登入失敗";
    }
   
  
?>
