<script>
    function randomSplash(){
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

    <?php
    include("../templates/asd.php");
    ?>

    <div id="asd">

        <a class="splash"></a>

        <?php
        include("C:/xampp/htdocs/asd/php/lineCount.php");
        ?>
    </div>
    <script defer>
        document.querySelector('.splash').addEventListener("click", function () {
            randomSplash();
        });
    </script>
    </body>

</html>