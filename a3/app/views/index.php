<?php require_once VIEWS . "components/head.php" ?>
<body>

<script src="./resources_js/?file=seatingSlider"></script>

<div id="background"></div>
<div id="background-2"></div>

<!-- Header & Navbar container -->
<div class="header-nav-container" id="header-nav-container">
    <!-- Header -->
    <?php require_once VIEWS . "components/header.php" ?>
    <!-- Navbar -->
    <?php require_once VIEWS . "components/navbar.php" ?>

</div>

<!-- Main Page Content -->
<main>
    <section id="about-us">
        <h2>About Us</h2>
        <h3>After a hard year of covid19 lockdowns and renovations we are proud to welcome all our guests back to Luncardo Cinemas for our grand reopening!</h3>
        <h3>Introducing our....</h3>
        <ol>
            <li>Brand new state of the art seating and first class recliners</li>
            <li>Unified Dolby Vision projection and atoms sound providing the best in viewing and audio experience!</li>
            <li>Community focuses and fantastic customer service guarantee!</li>
        </ol>
        <div class="image-container">
            <img src="../../media/png/dolby-atomos.png" alt="Dolby Atomos Logo" id="dolby-atomos">
            <img src="../../media/png/dolby-vision.png" alt="Dolby Vison Logo" id="dolby-vision">
        </div>
    </section>
    <section id="seats-and-prices">
        <h2>Seats and Prices ....</h2>
        <div class="container">
            <div>
                <div class="flex">
                    <div class="left">
                        <h4>Seats</h4>
                        <?php
                        foreach ($GLOBALS["seating"] as $seat){
                            $seat->renderType();
                        }
                        ?>
                    </div>
                    <div class="middle">
                        <h4>Price</h4>
                        <?php
                        foreach ($GLOBALS["seating"] as $seat){
                            $seat->renderPrice();
                        }
                        ?>
                    </div>
                    <div class="middle">
                        <h4>Discounted Price</h4>
                        <?php
                        foreach ($GLOBALS["seating"] as $seat){
                            $seat->renderDiscountedPrice();
                        }
                        ?>
                    </div>

                    <div class="middle">
                        <h4>Discount Times</h4>

                        <?php
                        foreach ($GLOBALS["seating"] as $seat){
                            echo "<p> Times <span data-tooltip='";
                            $seat->renderDiscountTimes();
                            echo " '><img src='../../media/svg/clock.svg' alt='Clock Icon'></span></p>";
                        }
                        ?>

                    </div>
                </div>

            </div>
            <div>
                <div id="imageSlider">
                    <?php
                    foreach ($GLOBALS["seating"] as $seat){
                        if($seat->hasImage()) {
                            echo "<div class='slide'>";
                            $seat->renderType("h3");
                            $seat->renderImage();
                            echo "</div>";

                        }
                    }
                    ?>
                </div>
            </div>

        </div>

    </section>
    <section id="now-showing">
        <h2>Now Showing ....</h2>
        <div id="movie-cards">
            <?php
            //render each movie in the now showing section
            foreach ($GLOBALS["movies"] as $movie){
                $movie->renderPreviewCard();
            }?>
        </div>
    </section>

</main>

<?php include VIEWS."components/footer.php"?>
