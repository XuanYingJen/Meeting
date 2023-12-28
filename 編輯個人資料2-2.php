<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"></meta>
        <title>高雄大學資訊工程系會議管理系統</title>
        <link rel="stylesheet" href="上方工具列及標題.css"/>
    </head>
    <body>
        <header class="home">
            <img src="CSIE.jpg" width="50" height="50" style="float: left;">
            <h1><a href="首頁2.php">&nbsp高雄大學資訊工程系會議管理系統</a></h1>
        </header>
        <nav>
            <ul class="flex-nav">
                <li><a href="會議資料2.php">會議資料</a></li>
                <li><a href="人員資料2.php">人員資料</a></li>
                <li><a href="編輯個人資料2-1.php">編輯個人資料</a></li>
            </ul>
        </nav>
        <form action="change_personality_2.php">
        <h2>二、身分相關資料</h2>
        <?php session_start();?>
        <?php if($_SESSION['identity']=="professor"):?>
        
            <!--系上老師-->
            <p>職級&nbsp&nbsp
                <input type=radio name = rank value=Professor>教授
                <input type=radio name = rank value=associateProfessor>副教授
                <input type=radio name = rank value=assistantProfessor>助理教授
            </p>
            <p>辦公室電話&nbsp<input type="tel"/></p>
        <?php elseif($_SESSION["identity"]=="assistent"):?>
            <!--系助理-->
            <p>辦公室電話&nbsp<input type="tel"/></p>
        <?php elseif($_SESSION["identity"]=="outsideTeacher"):?>
            <!--校外老師-->
            <p>任職學校&nbsp<input type="text"/></p>
            <p>系所&nbsp<input type="text"/></p>
            <p>職稱&nbsp<input type="text"/></p>
            <p>辦公室電話&nbsp<input type="tel"/></p>
            <p>聯絡地址&nbsp<input type="text" class="address"/></p>
            <p>銀行(郵局)帳號&nbsp<input type="text"/></p>
        <?php elseif($_SESSION["identity"]=="expert"):?>
            <!--業界專家-->
            <p>任職公司&nbsp<input type="text"/></p>
            <p>職稱&nbsp<input type="text"/></p>
            <p>辦公室電話&nbsp<input type="tel"/></p>
            <p>聯絡地址&nbsp<input type="text" class="address"/></p>
            <p>銀行(郵局)帳號&nbsp<input type="text"/></p>
        <?php elseif($_SESSION["identity"]=="student"):?>
            <!--學生代表-->
            <p>學號&nbsp<input type="text"/></p>
            <p>學制&nbsp
                <input type=radio name = schoolSystem value=university>大學部
                <input type=radio name = schoolSystem value=master>研究所
            </p>
            <p>年級&nbsp
                <select name="degree">
                    <option value=one>一</option>
                    <option value=two>二</option>
                    <option value=three>三</option>
                    <option value=four>四</option>
                    <option value=five>五</option>
                    <option value=six>六</option>
                </select>
            </p>       
            <?php endif; ?>
            <input type ="button" onclick="history.back()" value="上一頁"></input> 
            <button type ="submit">儲存</button>
        </form>
    </body>
</html>