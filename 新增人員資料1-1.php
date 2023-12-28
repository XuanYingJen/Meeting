<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <title>高雄大學資訊工程系會議管理系統</title>
        <link rel="stylesheet" href="上方工具列及標題.css"/>
    </head>
    <body>
    <?php session_start();
        $account = $_SESSION['account'];?>
        <header class="home">
            <img src="CSIE.jpg" width="50" height="50" style="float: left;">
            <h1><a href="首頁.php">&nbsp高雄大學資訊工程系會議管理系統</a><?php for($i=0;$i<90;$i++){echo "&nbsp;";}echo $account?> <a href="登入畫面.php">登出</a></h1>
        </header>
        <nav>
            <ul class="flex-nav">
                <li><a href="新增會議.php">新增會議</a></li>
                <li><a href="會議資料.php">會議資料</a></li>
                <li><a href="新增人員資料1-1.php">新增人員資料</a></li>
                <li><a href="人員資料.php">人員資料</a></li>
            </ul>
        </nav>
        <form action="add_member_1.php" method="post">
        <h2>一、基本資料</h2>
            <p>身分證字號&nbsp&nbsp<input type="text" name="ID"/></p>
            <p>帳號&nbsp&nbsp<input type="text" name="add_account"/></p>
            <p>姓名&nbsp&nbsp<input type="text" name="name"/></p>
            <p>性別&nbsp&nbsp
                <input type=radio name = sex value=男>男
                <input type=radio name = sex value=女>女
            </p>
            <p>手機&nbsp&nbsp<input type="text" name="phone"/></p>
            <p>Email&nbsp<input type="text" name="email"></p>
            <p>身分&nbsp
                <select name="identity">
                    <option value="系上老師" >系上老師</option>
                    <option value="系助理" >系助理</option>
                    <option value="校外老師" >校外老師</option>
                    <option value="業界專家" >業界專家</option>
                    <option value="學生代表" >學生代表</option>
                </select>
            </p>
           <button type="submit">下一頁</button>
        </form>      
    </body>
</html>