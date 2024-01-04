<link rel="stylesheet" type="text/css" href="../css/a1.css">
<link rel="icon" type="image/png" href="../imgs/favicon.png">
<meta charset="utf-8">
</head>

<body>
    <header>
        <span id="egg">
            <!---marquee con asdasdasd que vaya con el hover del span-->
            <!--- asd randoms que aparecen con dif posiciones, tamaños y º de rotacion al hacer click en el span--->
        </span>
        <span>
            <?php
            $pageName = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
            if ($pageName != "index")
                echo $pageName;
            else
                echo "<a href='https://github.com/ignxrxnt0330/asd/' target='_blank'> asd </a>";
            ?>
        </span>
    </header>
    <div id="todo">
        <div id="barra_lateral">
            <div id="item">
                <a href="/pags/index.php">Home
                    <ul id="subitems">
                    </ul>
                </a>
            </div>

            <div id="item">
                <a href="/pags/urbanDic.php">urbanDic
                    <ul id="subitems">
                    </ul>
                </a>
            </div>

            <div id="item">
                <a href="/pags/todolist.php">
                    To-do list
                </a>
            </div>


            <div id="item">
                <a href="../typing_game/typing_game.php">
                    Typing game
                    <ul id="subitems">
                    </ul>
                </a>
            </div>

            <div id="item">
                <a href="">
                    Code
                    <ul id="subitems">
                    </ul>
                </a>
            </div>

            <div id="item">
                <a href="">
                    mrds
                    <ul id="subitems">
                        <li><a href="">mrds</a></li>
                        <li><a href="">asd</a></li>
                        <li><a href="">xdf</a></li>
                    </ul>
                </a>
            </div>
        </div>