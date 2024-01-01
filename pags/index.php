<script defer>
    function randomSplash() {
        fetch('http://localhost/php/splashes.php')
            //browsers restrict fetching from local files for security reasons, so it has to be accessed this way
            .then(response => {
                if (!response.ok) {
                    throw new Error('response is not ok');
                }
                return response.json(); // parse the response as JSON to a JS object, as this is what the ajax request returns
            })
            .then(data => {
                const splash = data.splash;
                if (splash.trim() !== "") {// not empty
                    document.querySelector('.splash').textContent = splash;
                    document.title = splash;
                    console.log(splash);
                } else {                    // empty
                    console.error("empty splash");
                }
            })
            .catch(error => {
                console.error(error);
            });
    }

    randomSplash();
</script>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel=icon type="image/png" href="../imgs/favicon.png">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <?php
    include("../include/asd.php");
    ?>

    <div id="asd">

        <a class="splash"></a>

        <div class="new_splash">
            <form>
                <input tpe="text" class="new_splash_input" name="splash" placeholder="new_splash"
                    autocomplete="off"></input>
            </form>
        </div>

        <script defer>
            let input = document.querySelector(".new_splash_input");
            input.addEventListener("keydown", function (event) {
                if (event.key == "Enter") {
                    event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: 'http://localhost/php/newSplash.php',
                        data: { splash: input.value },
                        success: function (response) {
                            console.log(response);
                            console.log("Splash added correctly");
                        },
                        error: function (error) {
                            console.error("Error adding splash: " + error);
                        }
                    });
                    input.value = "";
                }
            });
        </script>

        <div class=lineCount></div>

        <script defer>
                fetch('http://localhost/php/lineCount.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('response is not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        const lc = data.lc;
                        if (lc.trim() !== "") {
                            document.querySelector('.lineCount').textContent = lc;
                            console.log(lc+" lines of code");
                        } else {                    // empty
                            console.error("error getting line count");
                        }
                    })
                    .catch(error => {
                        console.error(error);
                    });
        </script>

    </div>
    <script defer>
        document.querySelector('.splash').addEventListener("click", function () {
            randomSplash();
        });
    </script>
    </body>

</html>