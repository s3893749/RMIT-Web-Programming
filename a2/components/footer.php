<footer>
        <section id="email">
            Need help booking? contact us at <a href="mailto:info@luncardocinemas.com">info@luncardocinemas.com</a>
        </section>

        <section id="footer-main-content">
            <div id="company-section">
                <div>
                    <img src="../../media/svg/logo.svg" alt="Luncardo Cinema Logo">
                    <h1>Luncardo Cinemas</h1>
                </div>
                <p>ABN: 40 123 456 789</p>
                <p>123 Town Street, Victoria, Australia</p>
                <p>Ph: 5976 123 123</p>
            </div>
            <div id="links">
                <p class="bold">Links:</p>
                <a href="./#about-us">About Us</a>
                <a href="./#seats-and-prices">Seats and Prices</a>
                <a href="./#now-showing">Now Showing</a>
                <a href="booking.php">Bookings</a>
            </div>
            <div id="improvement">
                <a href="mailto:s3893749@student.rmit.edu.au">
                <img src="../../media/svg/chat_icon.svg" alt="Chat Icon SVG">
                <p>Tell us how we could <br> improve our site!</p>
                </a>
            </div>
        </section>

        <section id="rmit">
            <div>
                <p>  &copy;<script> document.write(new Date().getFullYear());</script> Jack Harris, s3893749 Last modified <?= date ("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?></p>
                <p>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web Programming course at RMIT University in Melbourne, Australia.</p>
                <button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button>
            </div>
        </section>

</footer>

<?php
//code snipped created by https://www.phpjabbers.com/measuring-php-page-load-time-php17.html
$time = microtime();
$time = explode(' ', $time);
$time = $time[1] . $time[0];
$finish = $time;
$total_time = round(($finish - $start), 4);
?>

