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
            <h1><a href="首頁2.php">&nbsp高雄大學資訊工程系會議管理系統</a><?php for($i=0;$i<90;$i++){echo "&nbsp;";}echo $account?> <a href="登入畫面.php">登出</a></h1>
        </header>
        <nav>
            <ul class="flex-nav">
                <li><a href="新增會議.php">新增會議</a></li>
                <li><a href="會議資料.php">會議資料</a></li>
                <li><a href="新增人員資料1-1.php">新增人員資料</a></li>
                <li><a href="人員資料.php">人員資料</a></li>
            </ul>
        </nav>
        <form action="add_member_2.php" method="post">
        <h2>二、身分相關資料</h2>
        <?php if($_SESSION['identity']=='系上老師'): ?>
            <!--系上老師-->
            <p>職級&nbsp&nbsp
                <input type=radio name = rank value=教授>教授
                <input type=radio name = rank value=副教授>副教授
                <input type=radio name = rank value=助理教授>助理教授
            </p>
            <p>辦公室電話&nbsp<input type="tel" name="tel"/></p>
        <?php elseif($_SESSION['identity']=='系助理'): ?>    
            <!--系助理-->
            <p>辦公室電話&nbsp<input type="tel" name="tel"/></p>
        <?php elseif($_SESSION['identity']=='校外老師'): ?>
            <!--校外老師-->
            <p>任職學校&nbsp<input type="text" name="school"/></p>
            <p>系所&nbsp<input type="text" name="department"/></p>
            <p>職稱&nbsp<input type="text" name="job_name"/></p>
            <p>辦公室電話&nbsp<input type="tel" name="tel"/></p>
            <p>聯絡地址&nbsp<input type="text" class="address" name="address"/></p>
            <p>銀行(郵局)帳號&nbsp<input type="text" name="bank_account"/></p>
        <?php elseif($_SESSION['identity']=='業界專家'): ?>
            <!--業界專家-->
            <p>任職公司&nbsp<input type="text" name="company"/></p>
            <p>職稱&nbsp<input type="text" name="job_name"/></p>
            <p>辦公室電話&nbsp<input type="tel" name=tel/></p>
            <p>聯絡地址&nbsp<input type="text" class="address" name="address"/></p>
            <p>銀行(郵局)帳號&nbsp<input type="text" name="bank_account"/></p>
        <?php elseif($_SESSION['identity']=='學生代表'): ?>
            <!--學生代表-->
            <p>學號&nbsp<input type="text" name="student_ID"/></p>
            <p>學制&nbsp
                <input type=radio name = schoolSystem value=大學部>大學部
                <input type=radio name = schoolSystem value=研究所>研究所
            </p>
            <p>年級&nbsp
                <select name="degree">
                    <option value=一>一</option>
                    <option value=二>二</option>
                    <option value=三>三</option>
                    <option value=四>四</option>
                    <option value=五>五</option>
                    <option value=六>六</option>
                </select>
            </p> 
        <?php endif;?>      
            <input type ="button" onclick="history.back()" value="上一頁"></input> 
            <button type ="submit">儲存</button>
        </form>
    </body>
</html>