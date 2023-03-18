<?php


?>


<link rel="stylesheet" type="text/css" href="../css/a1.css">
<link rel="favicon" type="image/png" href="../imgs/favicon.png">
</head>
<body>
<header>
        <!---marquee con asdasdasd que vaya con el hover del span-->
        <span>
            <?php
            $pagina = pathinfo(basename($_SERVER['PHP_SELF']), PATHINFO_FILENAME);
            if($pagina!="index")
                echo $pagina;
            else
                echo "asd";
            ?>
        </span>
    </header>
    <div id="todo">
    <div id="barra_lateral">
        <div id="item">
            <a href="index.php">Home
				<ul id="subitems">
					<li><a href="">mrds</a></li>
					<li><a href="">asd</a></li>
					<li><a href="">xdf</a></li>
				</ul>
            </a>
	</div>
    
    <div id="item">
            <a href="">mrds
				<ul id="subitems">
					<li><a href="">mrds</a></li>
					<li><a href="">asd</a></li>
					<li><a href="">xdf</a></li>
				</ul>
            </a>
	</div>
    
    
    <div id="item">
            <a href="braindump.php">
                Brain dump
				<ul id="subitems">
					<li><a href="">mrds</a></li>
					<li><a href="">asd</a></li>
					<li><a href="">xdf</a></li>
				</ul>
            </a>
	</div>
    
    <div id="item">
            <a href="../pags/todolist.php">
                To-do list
            </a>
	</div>

    
    <div id="item">
            <a href="">
                Typing game
				<ul id="subitems">
					<li><a href="">mrds</a></li>
					<li><a href="">asd</a></li>
					<li><a href="">xdf</a></li>
				</ul>
            </a>
	</div>

     
    <div id="item">
            <a href="">
                Code
				<ul id="subitems">
					<li><a href="">mrds</a></li>
					<li><a href="">asd</a></li>
					<li><a href="">xdf</a></li>
				</ul>
            </li> </a>
	</div>

    <div id="item">
            <a href="">
                Tally counters
				<ul id="subitems">
					<li><a href="">mrds</a></li>
					<li><a href="">asd</a></li>
					<li><a href="">xdf</a></li>
				</ul>
            </div>
        </a>
    </div>

</html>