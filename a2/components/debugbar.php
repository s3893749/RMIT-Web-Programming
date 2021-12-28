<!-- Luncardo Debugbar created by Jack Harris, design based on larvel & PHP Debugbar -->
<aside id="debug">
    <section id="header">
        <div id="border"></div>
        <nav>
            <item id="logo"><img src="../../media/svg/logo.svg" alt="Luncardo Icon">Luncardo Debugbar <p id="mobile-error">Not Supported On Mobile Devices</p></item>
            <a href="javascript:showMessages();" id="messagesButton">Messages</a>
            <a href="javascript:showSession();" id="sessionButton">Session</a>
            <a href="javascript:showRequest();" id="requestButton">Request</a>
            <item class="float-right"><img src="../../media/svg/clock.svg" alt="Clock Icon"><?php echo $total_time*1000; ?>ms</item>
            <item ><img src="../../media/svg/ram-icon.svg" alt="Ram Usage Icon"><?php echo round(memory_get_usage(true)/1048576,2);?>mb</item>
            <item>php <?php echo phpversion()?></item>
            <a href="javascript:closeDebugbar();" id="close-icon"><img src="../../media/svg/close.svg" alt="Close Button"></a>
        </nav>
    </section>

    <section id="messageContent" class="inactive-content">
        <!-- PHP Session section, contains and displays all the session variables and data -->

        <h3>Messages</h3>
    </section>

    <section id="sessionContent" class="inactive-content">
    <!-- PHP Session section, contains and displays all the session variables and data -->
        <h3>PHP Session</h3>
        <pre>
            SESSION Contains:
            <?php if(isset($_SESSION)){
                print_r($_SESSION) ;
            }else echo "no current session"?>
        </pre>
    </section>

    <section id="requestContent" class="inactive-content">
    <!-- HTTP Request section, contains all $_GET & $_POST variables sent to the server by the user -->
        <h3>HTTP Request</h3>
       <pre>
           GET Contains:
           <?php print_r($_GET) ?>
           POST Contains:
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
