<!-- Luncardo Debugbar created by Jack Harris, design based on larvel & PHP Debugbar -->

<aside id="debug" class="noPrint">
    <section id="header">
        <div id="border"></div>
        <nav>
            <item id="logo"><img src="../../media/svg/logo.svg" alt="Luncardo Icon">Luncardo Debugbar <p id="mobile-error">Not Supported On Mobile Devices</p></item>
            <a href="javascript:showMessages();" id="messagesButton">Messages <?php
                if(isset($message)){
                    if(count($message) > 0){
                        echo '<span class="count">';
                        echo count($message);
                        echo '</span>';
                    }
                }?></a>
            <a href="javascript:showSession();" id="sessionButton">Session<?php
                if(isset($_SESSION)){
                    if(count($_SESSION) > 0){
                        echo '<span class="count">';
                        echo count($_SESSION);
                        echo '</span>';
                    }
                }?></a>
            <a href="javascript:showRequest();" id="requestButton">Request<?php
                $request_total = 0;

                if(isset($_POST)){
                    if(count($_POST) > 0){
                        $request_total += count($_POST);
                    }
                }
                if(isset($_GET)){
                    if(count($_GET) > 0){
                        $request_total += count($_GET);
                    }
                }

                if($request_total > 0){
                    echo '<span class="count">';
                    echo $request_total;
                    echo '</span>';
                }

                ?></a>
            <item class="float-right"><img src="../../media/svg/clock.svg" alt="Clock Icon"><?php echo $total_time*1000; ?>ms</item>
            <item ><img src="../../media/svg/ram-icon.svg" alt="Ram Usage Icon"><?php echo round(memory_get_usage(true)/1048576,2);?>mb</item>
            <item>php <?php echo phpversion()?></item>
            <a href="javascript:closeDebugbar();" id="close-icon"><img src="../../media/svg/close.svg" alt="Close Button"></a>
        </nav>
    </section>

    <!-- PHP Session section, contains and displays all the session variables and data -->
    <section id="messageContent" class="inactive-content">

        <h3>Messages: </h3>
        <pre>
        <?php
        if(isset($message)){
            print_r($message);
        }
        ?>
         </pre>
    </section>

    <!-- PHP Session section, contains and displays all the session variables and data -->
    <section id="sessionContent" class="inactive-content">
        <h3>Session: </h3>
        <pre>
            SESSION Contains:
            <?php if(isset($_SESSION)){
                print_r($_SESSION) ;
            }else echo "no current session"?>
        </pre>
    </section>

    <!-- HTTP Request section, contains all $_GET & $_POST variables sent to the server by the user -->
    <section id="requestContent" class="inactive-content">
        <h3>Request: </h3>
           GET:
           <pre>
                <?php print_r($_GET) ?>
           </pre>
           POST:
           <pre>
                <?php print_r($_POST) ?>
           </pre>
    </section>

    <!-- Override the bottom margin of the toggle wireframe button when the debugbar is present, this allows the button to appear above the minimized debug bar -->
    <style>
        #toggleWireframeCSS {
            margin-bottom: 4rem!important;
        }
    </style>

</aside>
