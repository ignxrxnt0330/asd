<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=icon type="image/png" href="../imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/urbanDic.css">
    <title>asd</title>
 
    <?php
        include("../include/asd.php");
    ?>

    <div id="asd">
    <div class="container">
    <div class=tag>Word of the Day</div>
        <div class="api" id="urbanDic">
            <script src="../apis/urbanDic.js"></script>
        </div>
    </div>
        
    <div class="container">
    <div class=tag id="reload_btn"><a href="">Random word</a> </div>
        <div class="api" id="urbanDicRandom">
            <script src="../apis/urbanDicRandom.js"></script>
        </div>
    <div>

    </div>

</body>
</html>