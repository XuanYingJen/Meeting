<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"></meta>
    <title>高雄大學資訊工程系會議管理系統</title>  
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" href="登入畫面.css"/>
</head>
<body>
    <!--<div style="position: absolute;padding: 100px;margin: 150px 400px 150px 400px; background-color: #CFCFCF;">-->
    <form action="check_account.php" class="login" method="post">
        <h2>高雄大學資工系會議管理系統</h2>
        <i class="fa fa-user-circle-o"></i>
        <br/>
        <br/>
        <input type="text" placeholder="請輸入帳號" name="account"/>
        <br/>
        <input type="password" placeholder="請輸入密碼" name="password"/>
        <br/>
        <br/>
        <button type="submit">登入</button>
    </form>
</body>
</html>