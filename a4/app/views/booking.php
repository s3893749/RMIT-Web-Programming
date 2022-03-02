<?php require_once VIEWS . "components/head.php" ?>
<body>

<div id="background"></div>

<!-- Header & Navbar container -->
<div class="header-nav-container" id="header-nav-container">
    <!-- Header -->
    <?php require_once VIEWS . "components/header.php" ?>
    <!-- Navbar -->
    <?php require_once VIEWS . "components/navbar.php" ?>

</div>

<main id="booking-container">
    <section>
        <h2>Booking Wizard: <?php echo $film->getTitle()?></h2>
        <iframe width="560" height="315" src="<?php echo $film->getTrailer()?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </section>
    <p id="discount-banner" style="display: none; text-align: center; background-color: red; color: white; max-width: 50%; margin: auto; padding: 1rem">Discount time chosen! enjoy the reduced price!</p>
    <section>
        <form action="./booking-validation" method="post" id="booking">
            <div style="display: none">
                <h3>Movie Details</h3>
                <label for="movie">Movie:</label><br>
                <input type="text" id="movie" name="movie" value="<?php echo $film->getTitle()?>" readonly><br>
                <input type="text" id="movie_code" name="movie_code" value="<?php echo $film->getCode()?>" hidden><br>
            </div>
            <div>
                <h3>Your Details</h3>
                <label for="full_name">Fullname:</label><br>
                <input type="text" id="name" name="name" required placeholder="john smith"><br>
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" required placeholder="me@example.com"><br>
                <label for="mobile_number">Mobile Number:</label><br>
                <input type="text" id="mobile-number" name="mobile_number" required placeholder="0421 123 123"><br>
            </div>
            <div>
                <h3>Date & Time</h3>
                <?php
                $times = $film->getTimes();
                $time_ids = $film->getTime24();

                foreach ($time_ids as $day => $time){
                    echo "<input type='radio' id='".$day."' name='date' value='".json_encode(["day" => $day, "time" => $time])."' class='radio-button'>";
                    echo "<lable for='".$day."'>".$day."</lable><br>";

                }
                ?>
            </div>
            <div>
                <h3>Seating</h3>
                <?php
                //I have decided to use radio buttons instead of a 1-5 number input as its more user-friendly to the user and can be easily implemented with my json setup
                $i = 0;
                while($i < count($GLOBALS["seating"])){
                    echo "<input type='radio' id='".$GLOBALS["seating"][$i]->getCode()."' name='seat-code' value='".json_encode([
                            "seat_code" =>$GLOBALS["seating"][$i]->getCode(),
                            "standard_price" =>$GLOBALS["seating"][$i]->getPrice(),
                            "discounted_price" =>$GLOBALS["seating"][$i]->getDiscountedPrice(),
                            "discount_times" =>$GLOBALS["seating"][$i]->getDiscountTimes()])
                        ." '>";
                    echo "<lable for='".$GLOBALS["seating"][$i]->getCode()."'>".$GLOBALS["seating"][$i]->getName()."</lable><br>";
                    $i ++;
                }
                ?>
            </div>
            <div style="min-width: 229px">
                <h3>Quantity</h3>
                <label for="quantity">Quantity</label><br>
                <input type="number" id="quantity" name="quantity" min="1" step="1" value="1" hidden>
                <br>
                <button onclick="event.preventDefault(); decreaseQuanity()" class="quanity-button"><</button>
                <div id="quanity-display">1</div>
                <button onclick="event.preventDefault(); increaseQuanity()" >></button>
            </div>
            <div>
                <h3>Total</h3>
                <p id="total">$0</p>
                <p id="discount-active" style="display: none;">Discount Active</p>
            </div>
            <div>
                <button onclick="event.preventDefault(); updateRememberMe();" id="remember-me">Remember me!</button>
                <button type="submit" id="submit" onclick="processForm()">Create Booking</button>
            </div>


        </form>
    </section>
</main>

<script src="./resources_js?file=booking"></script>


</body>

<?php require_once  VIEWS."components/footer.php"?>