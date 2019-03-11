<!DOCTYPE html>
<html>

<?php require_once '/../database.php';?>
<!--MYSQL DATABASE-->
<?php require_once '/../functions.php';?>
<!--MYSQL QUERIES-->

<head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width">
    <!--MOBILE SCALE-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--IOS WEBAPP-->
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <title>Smoke Counter - Chat</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../touch-icon-iphone-retina.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/chat.css">
</head>

<body>

    <header>
        <section>
            <!--(1) Iconmonstr-->
            <a href="/smokecounter"><img src="../assets/images/icons/back.svg" alt="back"></a>
        </section>
        <h1>Assistant Chat</h1>
        <section>
            <!--(1) Iconmonstr-->
            <a href="/smokecounter/chart"><img src="../assets/images/icons/chart.svg" alt="chart"></a>
        </section>
    </header>

    <section id="chat">
        <section>
        </section>
    </section>

    <section>
        <fieldset>
            <form id="myform" action="assistant.php" method="post">
                <label for="message"></label>
                <input type="text" name="message" id="message" placeholder="Ask a question">
                <input type="submit" value="↵">
            </form>
        </fieldset>
    </section>

    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/Foliotek/AjaxQ/master/ajaxq.js"></script>
    <script src="~/smokecounter/assets/js/webapp.js"></script>
    <!--WEBAPP - links stay in app-->
    <script src="~/smokecounter/assets/js/assistant.js"></script>
    <!--CHAT SCRIPTS-->

    <!--SOURCE-->
    <!--(1) https://iconmonstr.com/-->

</body>

</html>
