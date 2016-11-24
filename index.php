<? include "/scripts/protect.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <title>გვერდის დაცვა პაროლით</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    </head>
    <body>
        <h1>{ &lt;DIRECTED ByABGEO /&gt; }</h1>
        <div class="content">
            <div class="glava">მაგ.3: გვერდის დაცვა პაროლით</div> <hr>
            <center>
                <div class="successAuth">
                    თქვენ წარმატებით გაიარეთ ავტორიზაცია </br>
                    შემდეგი ლოგინით: <? echo $adminLogin; ?>  და პაროლით: <? echo $adminPass; ?> </br></br>
                    <a href="?logout">გასვლა</a>
                </div>
           </center>
        </div>
        <div class="footer">
            <p>{ TTProductions &copy; 2016-<?php echo date(Y); ?>. All Rights Reserved. }</p>
        </div>
    </body>
</html>