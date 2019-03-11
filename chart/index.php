<!DOCTYPE html>
<html>

<?php require_once '/../database.php';?>
<!--MYSQL DATABASE-->
<?php require_once '/../functions.php';?>
<!--MYSQL QUERIES-->
<?php require_once 'chart.php';?>
<!--MYSQL CHART QUERIES-->

<head>
    <meta charset=utf-8 />
    <meta name="viewport" content="width=device-width">
    <!--MOBILE SCALE-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--IOS WEBAPP-->
    <meta name="apple-mobile-web-app-status-bar-style" content="white">
    <title>Smoke Counter - Chart</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="touch-icon-iphone-retina.png">
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/chart.css">
    <script src="../assets/js/Chart.js"></script>
    <!--CHART.JS LIBRARY-->
</head>

<body>
    <header>
        <section>
            <!--(1) Iconmonstr-->
            <a href="/"><img src="../assets/images/icons/back.svg" alt="back"></a>
        </section>
        <h1>Chart</h1>
        <section>
            <!--(1) Iconmonstr-->
            <a href="/chart"><img src="../assets/images/icons/chart_a.svg" alt="chart"></a>
        </section>
    </header>

    <section>
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["<?php echo $day[6] ?>", "<?php echo $day[5] ?>", "<?php echo $day[4] ?>",
                    "<?php echo $day[3] ?>", "<?php echo $day[2] ?>", "<?php echo $day[1] ?>",
                    "<?php echo $day[0] ?>"
                ],
                datasets: [{
                    label: 'Cigarettes the last 7 days',
                    data: [<?php echo $value[6] ?>, <?php echo $value[5] ?>, <?php echo $value[4] ?>,
                        <?php echo $value[3] ?>, <?php echo $value[2] ?>, <?php echo $value[1] ?>,
                        <?php echo $value[0] ?>
                    ],
                    backgroundColor: 'rgba(0, 0, 0, 0)',
                    borderColor: 'rgb(255, 106, 106)'
                }, {
                    label: 'Max cigarettes goal',
                    data: [<?php echo $maxCounter ?>, <?php echo $maxCounter ?>,
                        <?php echo $maxCounter ?>, <?php echo $maxCounter ?>,
                        <?php echo $maxCounter ?>, <?php echo $maxCounter ?>,
                        <?php echo $maxCounter ?>
                    ],
                    backgroundColor: 'rgba(0, 0, 0, 0)',
                    borderColor: 'rgb(51, 122, 183)'
                }]
            },

            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMax: 10,
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        </script>

        <section>

            <section>
                <h2><strong>Assistant</strong></h2>
                <p><?php echo $assistant ?></p>
            </section>

        </section>

    </section>

    <a href="/chat"><button>Open Chat</button></a>

    <!--SCRIPTS-->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://cdn.rawgit.com/Foliotek/AjaxQ/master/ajaxq.js"></script>
    <script src="../assets/js/webapp.js"></script>
    <!--WEBAPP - links stay in app-->

    <!--SOURCE-->
    <!--(1) https://iconmonstr.com/-->

</body>

</html>
