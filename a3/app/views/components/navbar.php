<nav>
    <a href="javascript:showMobileMenu();" id="mobile-toggle"><img src="../../media/svg/mobile-toggle.svg" alt="Mobile Menu Icon Light" class="icon-light"></a>
    <ol>
        <li><a href="./#about-us" class="flex-core" id="about-us">About Us</a></li>
        <li><a href="./#seats-and-prices" class="flex-core" id="seats-and-prices">Seats & Prices</a></li>
        <li><a href="./#now-showing" class="flex-core" id="now-showing" style="margin-top: 0">Now Showing</a></li>
        <li class="nav-spacer"></li>
        <li><a href="./booking" class="flex-core bold flex-attribute-align-center flex-attribute-spaced-around" <?php if($GLOBALS["endpoint"] == "/booking"){echo "style='text-decoration: underline;'";}?>><img src="../../media/svg/ticket.svg" alt="Ticket Icon Dark" class="icon-dark"><img src="../../media/svg/ticket-light.svg" alt="Ticket Icon Light" class="icon-light"> Bookings</a></li>
    </ol>
</nav>

<div class="mobile-menu" id="mobile-menu">
        <a href="..#about-us">About Us</a>
        <a href="..#seats-and-prices">Seats & Prices</a>
        <a href="..#now-showing">Now Showing</a>
        <a href="../booking"><img src="../../media/svg/user.svg" alt="Ticket Icon"><p class="bold">Bookings</p></a>
</div>

<?php if($GLOBALS["endpoint"] == "/"){
    echo '<script src="./resources_js/?file=navbarProgramming"></script>
';
}?>


<!-- Sticky Navbar script by W3 schools https://www.w3schools.com/howto/howto_js_navbar_sticky.asp -->
<script src="./resources_js/?file=navbar"></script>

