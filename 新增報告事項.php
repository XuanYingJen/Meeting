<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <link rel="stylesheet" href="上方工具列及標題.css" href="會議資料編輯.css"/>
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
        <?php 
            $meet_name=$_SESSION["meeting_name"];
        ?>
        <form action="add_report.php" method="post">
           
            <p>報告事項編號&nbsp&nbsp<input type="text" style="width:50px;" name=report_no></p>
            <p>報告內容</p>
            <textarea style="width:600px;height:200px;" name=report_content></textarea>
            <input type ="button" onclick="location.href='會議資料編輯.php?meet_name=<?php echo $meet_name ?>'" value="回到會議資料編輯"></input> 
           <button type ="submit"><a href="會議資料編輯.php?meet_name=<?php echo $meet_name; ?>"></a>儲存</button>
        </form>

        
    </body>
</html>