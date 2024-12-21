<?php
include("connect.php");
include("classes.php");

$islands = array();
$islandsQuery = "SELECT * FROM islandsofpersonality";
$islandsResult = executeQuery($islandsQuery);

$group1 = [];
$group2 = [];

while ($islandsRow = mysqli_fetch_assoc($islandsResult)) {
    $i = new Islands($islandsRow['islandOfPersonalityID'], $islandsRow['name'], $islandsRow['image']);
    array_push($islands, $i);
}

$group1 = array_slice($islands, 0, 4);
$group2 = array_slice($islands, 4, 4);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Robert's Core Memories</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Lato", sans-serif;
        }

        body,
        html {
            height: 100%;
            color: violet;
            line-height: 1.8;
            background-color: purple;
        }

        /* Create a Parallax Effect */
        .bgimg-1,
        .bgimg-2,
        .bgimg-3 {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* First image (Logo. Full height) */
        .bgimg-1 {
            margin-top: 3rem;
            background-image: url('images/room.png');
            min-height: 100%;
        }

        /* Second image (Portfolio) */
        .bgimg-2 {
            background-image: url("images/island.png");
            min-height: 400px;
        }

        /* Third image (Contact) */
        .bgimg-3 {
            background-image: url("images/sadness.png");
            min-height: 400px;
        }

        .w3-wide {
            letter-spacing: 10px;
        }

        .w3-hover-opacity {
            cursor: pointer;
        }

        /* Turn off parallax scrolling for tablets and phones */
        @media only screen and (max-device-width: 1600px) {

            .bgimg-1,
            .bgimg-2,
            .bgimg-3 {
                background-attachment: scroll;
                min-height: 400px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar" id="myNavbar">
            <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right"
                href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
                <i class="fa fa-bars"></i>
            </a>
            <a href="#home" class="w3-bar-item w3-button">HOME</a>
            <a href="#about" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-user"></i> ABOUT</a>
            <a href="#portfolio" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-th"></i> PORTFOLIO</a>
            <a href="#contact" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-envelope"></i> CONTACT</a>
        </div>

        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
            <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">ABOUT</a>
            <a href="#portfolio" class="w3-bar-item w3-button" onclick="toggleFunction()">PORTFOLIO</a>
            <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">CONTACT</a>
        </div>
    </div>

    <!-- First Parallax Image with Logo Text -->
    <div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
        <div class="w3-display-middle" style="white-space:nowrap;">
            <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">MY <span
                    class="w3-hide-small">CORE</span> MEMORIES</span>
        </div>
    </div>

    <!-- Container (About Section) -->
    <div class="w3-content w3-container w3-padding-64" id="about">
        <h3 class="w3-center">ABOUT ME</h3>
        <p class="w3-center"><em>Im a Programmer</em></p>
        <p>I’m a passionate software developer with experience in [languages or technologies]. I thrive on building
            efficient, scalable applications and solving complex problems. My expertise includes [list of core skills],
            and I am always looking for new challenges to grow and improve my craft..</p>
        <div class="w3-row">
            <div class="w3-col m6 w3-center w3-padding-large" style="text-align: center;">
                <p><b><i class="fa fa-user w3-margin-right"></i>Robert Einstien G. Magbanua</b></p><br>
                <img src="images/robert.png" class="w3-round w3-image w3-opacity w3-hover-opacity-off" alt="Photo of Me"
                    width="500" height="333">
            </div>

            <!-- Hide this text on small devices -->
            <div class="w3-col m6 w3-hide-small w3-padding-large" style="margin-top: 6rem;">
                <p>Welcome to my website. I’m a passionate and results-driven software developer with [X] years of
                    experience in building and maintaining efficient, scalable applications. I specialize in [languages
                    or technologies, e.g., JavaScript, Python, React, etc.], and I have a strong focus on writing clean,
                    maintainable code that scales well as systems grow. My approach to programming is centered around
                    problem-solving and continuously improving my skills to deliver high-quality, user-centered
                    solutions. I thrive in collaborative environments and enjoy tackling complex challenges that require
                    creative and strategic thinking. Whether it’s optimizing backend performance, building dynamic
                    front-end interfaces, or architecting end-to-end solutions, I am dedicated to delivering great user
                    experiences. In my downtime, I enjoy exploring new tools, contributing to open-source projects, and
                    staying up-to-date with emerging trends in software development..</p>
            </div>
        </div>
    </div>


    <!-- Second Parallax Image with Portfolio Text -->
    <div class="bgimg-2 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
            <span class="w3-xxlarge w3-text-white w3-wide">PORTFOLIO</span>
        </div>
    </div>

    <!-- Container (Portfolio Section) -->
    <div class="w3-content w3-container w3-padding-64" id="portfolio">
        <h3 class="w3-center">Island of Memories</h3>
        <p class="w3-center"><em>Here are the island of my memories.</em></p><br>

        <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
        <div class="w3-row-padding w3-center">
            <?php
            foreach ($group1 as $island) {
                echo $island->generateCard();
            }
            ?>
        </div>
    </div>

    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
        <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i
                class="fa fa-remove"></i></span>
        <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
            <img id="img01" class="w3-image">
            <p id="caption" class="w3-opacity w3-large"></p>
        </div>
    </div>

    <!-- Third Parallax Image with Portfolio Text -->
    <div class="bgimg-3 w3-display-container w3-opacity-min">
        <div class="w3-display-middle">
            <span class="w3-xxlarge w3-text-white w3-wide">CONTACT</span>
        </div>
    </div>

    <!-- Container (Contact Section) -->
    <div class="w3-content w3-container w3-padding-64" id="contact">
        <h3 class="w3-center">WHERE I WORK</h3>
        <p class="w3-center"><em>I'd love your feedback!</em></p>

        <div class="w3-row w3-padding-32 w3-section">
            <div class="w3-col m4 w3-container">
                <img src="images/map.png" class="w3-image w3-round" style="width:100%">
            </div>
            <div class="w3-col m8 w3-panel">
                <div class="w3-large w3-margin-bottom">
                    <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Manila, Philippines<br>
                    <i class="fa fa-phone fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Phone: 09485516032<br>
                    <i class="fa fa-envelope fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i> Email: robertmagbanua@gmail.com<br>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w3-center w3-black w3-padding-64 w3-opacity w3-hover-opacity-off">
        <a href="#home" class="w3-button w3-light-grey"><i class="fa fa-arrow-up w3-margin-right"></i>To the top</a>
        <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank"
                class="w3-hover-text-green">w3.css</a></p>
    </footer>

    <script>

        // Change style of navbar on scroll
        window.onscroll = function () { myFunction() };
        function myFunction() {
            var navbar = document.getElementById("myNavbar");
            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
            } else {
                navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
            }
        }

        // Used to toggle the menu on small screens when clicking on the menu button
        function toggleFunction() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>