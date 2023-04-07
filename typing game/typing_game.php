<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=icon type="image/png" href="../imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="typing_game.css">
    <title>typing game</title>
    
    
    <?php
        include("../templates/asd.php");
    ?>

        <div id="asd" class="game">
            <div class="arriba">
                <div class="info">
                    <div class="time_left">
                        60s
                    </div>
                    <div class="wpm">
                        wpm
                    </div>
                    <div class="acc">
                        acc
                    </div>
                    <div class="ecount">
                        errors
                    </div>
                    <div class="gameMode">
                        <label for="gamemode">Gamemode:</label><br>
                        <select id="mode" name="mode">
                        <option value="enless">endless</option>
                        <option value="60s">60s</option>
                        </select>
                    </div>
                </div>
                <div class="quote">
                </div>
            </div>
            <div class="abajo">
                <textarea class="input_area" autofocus placeholder="asdadasd..." 
                oninput="processCurrentText()"
                onfocus="startGame()"></textarea>
            </div>
            <!--- hacer botones-->
        </div>
        
    <script src="typing_game.js" defer></script>
    </body>
</html>