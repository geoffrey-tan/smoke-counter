<!DOCTYPE html>
<html>

<?php require_once 'database.php';?>
<!--MYSQL DATABASE-->
<?php require_once 'functions.php';?>
<!--MYSQL QUERIES-->

<head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width">
    <!--MOBILE SCALE-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--IOS WEBAPP-->
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <title>Smoke Counter</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--JQUERY SLIDER CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slider.css">
</head>

<body>
    <header>
        <section>
            <!--(1) Iconexperience-->
            <a href="/"><img src="assets/images/icons/logo.svg" alt="logo"></a>
        </section>
        <h1>Dashboard</h1>
        <section>
            <!--(2) Iconmonstr-->
            <a href="/chart"><img src="assets/images/icons/chart.svg" alt="chart"></a>
        </section>
    </header>

    <section>

        <section>
            <section id="image-container">
                <!--(3) Iconexperience-->
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
                <img class="img" src="assets/images/cigarette.svg" alt="cigarette">
            </section>

            <div class="slider-container">
                <div id="slider-range-max"></div>
            </div>

            <p class="center"><span id="counter"><?php echo $currentCounter ?></span> out of the <span
                    id="counterMax"><?php echo $maxCounter ?></span> max cigarettes a day</p>

        </section>


        <section>
            <section>
                <h2><strong>Assistant</strong></h2>
                <p id='<?php echo $idTemp ?>'></p>
            </section>
        </section>

    </section>

    <a href="/chat"><button>Open Chat</button></a>

    <!--CONNECTION-->
    <span id='ipAddress' class="hidden"><?php echo $ashtrayIp ?></span>

    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <!--JQUERY SLIDER FIX-->
    <script src="https://cdn.rawgit.com/Foliotek/AjaxQ/master/ajaxq.js"></script>
    <script src="assets/js/webapp.js"></script>
    <!--WEBAPP - links stay in app-->
    <script src="assets/js/aREST.js"></script>
    <!--AREST LIBRARY-->
    <script src="assets/js/controls.js"></script>
    <!--AREST SCRIPTS-->
    <script src="assets/js/message.js"></script>
    <!--daily messages-->

    <!--SOURCE-->
    <!--(1) https://www.iconexperience.com/o_collection/icons/?icon=ashtray_cigarette-->
    <!--(2) https://iconmonstr.com/-->
    <!--(3) https://www.iconexperience.com/o_collection/icons/?icon=cigarette-->

</body>

</html>
