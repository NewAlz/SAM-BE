<?php
include("connect.php");
include("classes.php");
session_start();
if (isset($_POST['islandName']) && isset($_POST['islandImage']) && isset($_POST['islandID'])) {
    $_SESSION['islandName'] = $_POST['islandName'];
    $_SESSION['islandImage'] = $_POST['islandImage'];
    $_SESSION['islandID'] = $_POST['islandID'];
}
$islandID = isset($_SESSION['islandID']) ? $_SESSION['islandID'] : null;

$contents = array();
$contentsQuery = "SELECT * FROM islandcontents WHERE islandOfPersonalityID = $islandID";
$contentsResult = executeQuery($contentsQuery);

while ($contentsRow = mysqli_fetch_assoc($contentsResult)) {
    $c = new Contents($contentsRow['image'], $contentsRow['content']);
    array_push($contents, $c);
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo "".$_SESSION['islandName'].""; ?></title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,
        h1,
        h5 {
            font-family: "Raleway", sans-serif;
        }

        p,
        h1,
        h5 {
            color: transparent;
            text-transform: uppercase;
            background: linear-gradient(to right,
                    #fc72ff, #8f68ff, aqua,
                    #8f68ff, #fc72ff);
            background-size: 200%;
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-stroke: 1px transparent;
            animation:
                gradient 2.5s linear infinite;
        }

        @keyframes gradient {
            to {
                background-position: 200%;
            }
        }

        body,
        html {
            height: 100%;
        }

        .bgimg {
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>

    <div class="bgimg w3-display-container w3-text-white" style="background-image: url('images/<?php echo "".$_SESSION['islandImage'].""; ?>.png');">
        <div class="w3-display-middle w3-jumbo">
            <p><?php echo "".$_SESSION['islandName'].""; ?></p>
        </div>
        <div class="w3-display-topleft w3-container w3-xlarge" style="margin-top: 1rem;">
            <p><button onclick="document.getElementById('menu').style.display='block'"
                    class="w3-button w3-black">Contents</button></p>
        </div>
        <div class="w3-display-bottomleft w3-container">
            <p>powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
        </div>
    </div>

    <!-- Menu Modal -->
    <div id="menu" class="w3-modal">
        <div class="w3-modal-content w3-animate-zoom">
            <div class="w3-container w3-black w3-display-container">
                <span onclick="document.getElementById('menu').style.display='none'"
                    class="w3-button w3-display-topright w3-large">x</span>
                <h1>Contents</h1>
            </div>
            <?php
            foreach ($contents as $content) {
                echo $content->generateSecondCard();
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>