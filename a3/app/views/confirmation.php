<?php require_once VIEWS . "components/head.php" ?>

<?php

$orderDate = $_SESSION["booking"]->getOrderDate();
$customer = $_SESSION["booking"]->getCustomer();
$movie =  $_SESSION["booking"]->getMovie();
$date = $_SESSION["booking"]->getDate();
$time = $_SESSION["booking"]->getTime();
$seat = $_SESSION["booking"]->getSeat();
$quantity = $_SESSION["booking"]->getQuantity();
$total = $_SESSION["booking"]->getTotal();
$gst = $_SESSION["booking"]->getGST();

?>
<body>

<div id="background" class="noPrint"></div>


<!-- Main Page Content -->
<main id="receipt">


    <h1 class="noPrint"><img src="../../media/svg/logo.svg" alt="Luncardo Cinema Logo"> Receipt & Confirmation</h1>

    <section>
        <h2>Booking Confirmation</h2>
        <h3>Customer:</h3>
        <p>Name: <?php echo $customer["name"];?></p>
        <p>Email: <?php echo $customer["email"];?></p>
        <p>Phone: <?php echo $customer["phone"];?></p>
        <br>
        <h3>Booking Details:</h3>

        <!-- Table styling from W3 schools https://www.w3schools.com/css/css_table.asp -->
        <table>
            <tr>
                <td>Movie</td>
                <td>Date & Time</td>
                <td>Seat</td>
                <td>Quantity</td>
                <td>Total</td>
                <td>Inc GST</td>
            </tr>
            <tr>
                <td><?php echo $movie["title"]?></td>
                <td><?php echo $date?> <br><?php echo $time?></td>
                <td><?php echo $seat->getName()?></td>
                <td><?php echo $quantity?></td>
                <td>$<?php echo $total?></td>
                <td>$<?php echo $gst?></td>
            </tr>
        </table>
        <br>
        <p><em>Note: booking times are shown in 24 hour time</em></p>
        <br>
        <p<em>Created at <?php echo $orderDate?></em></p>

    </section>

    <section>
        <h2>Tickets</h2>
        <p><em>Page: 1</em></p>

        <?php
        $maxPerPage = 3;
        $pageCount = $quantity/3;
        $currentPage = 0;
        $lastPageIncrease= 0;

        $i = 0;
        while($i < $quantity){

            if($i == $maxPerPage+$lastPageIncrease){
                $currentPageToShow = $currentPage+2;
                echo "  </section>";
                echo "<section>
                        <h2>Tickets</h2> 
                        <p><em>Page: $currentPageToShow</em></p>";

                $lastPageIncrease = $i;
                $currentPage++;
            }

            ?>
            <div class="ticket">
                <h4>Ticket <?php echo $i+1 ?> of <?php echo $quantity?></h4>
                <p>Booking Name: <?php echo $customer["name"]?></p>
                <p>Movie: <?php echo $movie["title"]?></p>
                <p>Date & Time: <?php echo $date." @ ".$time?></p>
                <p>Seat Type: <?php echo $seat->getName()?></p>
                <img src="../../media/barcode.png" alt="Validation QR Code">
            </div>
        <?php
            $i++;
        }

        ?>
    </section>

</main>

<?php include VIEWS."components/footer.php"?>


<style>



</style>
