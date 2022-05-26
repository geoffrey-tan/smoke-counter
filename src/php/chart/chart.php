<?php

/*========================================================
    VARIABLES
========================================================*/

$value = array();
$day = array();

$valueTotal = 0;

$sqlChart1 = "SELECT COUNT(*) AS total, DATE_FORMAT(curdate(), '%d-%m') AS date FROM geoffrey.cigarette where date(date) = curdate()";
$sqlChart2 = "SELECT COUNT(*) AS total, DATE_FORMAT(curdate() - INTERVAL 1 day, '%d-%m') AS date FROM geoffrey.cigarette where date(date) = curdate() - INTERVAL 1 day";
$sqlChart3 = "SELECT COUNT(*) AS total, DATE_FORMAT(curdate() - INTERVAL 2 day, '%d-%m') AS date FROM geoffrey.cigarette where date(date) = curdate() - INTERVAL 2 day";
$sqlChart4 = "SELECT COUNT(*) AS total, DATE_FORMAT(curdate() - INTERVAL 3 day, '%d-%m') AS date FROM geoffrey.cigarette where date(date) = curdate() - INTERVAL 3 day";
$sqlChart5 = "SELECT COUNT(*) AS total, DATE_FORMAT(curdate() - INTERVAL 4 day, '%d-%m') AS date FROM geoffrey.cigarette where date(date) = curdate() - INTERVAL 4 day";
$sqlChart6 = "SELECT COUNT(*) AS total, DATE_FORMAT(curdate() - INTERVAL 5 day, '%d-%m') AS date FROM geoffrey.cigarette where date(date) = curdate() - INTERVAL 5 day";
$sqlChart7 = "SELECT COUNT(*) AS total, DATE_FORMAT(curdate() - INTERVAL 6 day, '%d-%m') AS date FROM geoffrey.cigarette where date(date) = curdate() - INTERVAL 6 day";

$sqlWeek = array($sqlChart1, $sqlChart2, $sqlChart3, $sqlChart4, $sqlChart5, $sqlChart6, $sqlChart7);

/*========================================================
    FUNCTIONS
========================================================*/

function sqlQuery($sql) {
    global $link;
    global $value;
    global $day;

    $res = mysqli_query($link, $sql);

    if (mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            array_push($value, $row["total"]);
            array_push($day, $row["date"]);
        }
    } else {
    }
    $res->free();
}

/*========================================================
    SCRIPTS
========================================================*/

for ($i = 0; $i < sizeof($sqlWeek); $i++) {
    sqlQuery($sqlWeek[$i]);
}

for ($i = 0; $i < sizeof($value); $i++) {
    $valueTotal = $valueTotal + $value[$i];
}

$valueAverage = $valueTotal / 7;
$valueDiff = $maxCounter - round($valueAverage); // (1)

if (round($valueAverage) < $maxCounter) {
    if ($valueDiff > 3) {
        $goal = "That's <span>" . $valueDiff . "</span> under your goal! Perhaps lower the max cigarettes goal? 🎉";
    } else {
        $goal = "That's <span>" . $valueDiff . "</span> under your goal! 🎉";
    }
} else {
    $goal = "Try smoking less the next few days";
}

$assistant = "The last <span>7 days</span> you smoked <span>" . $valueTotal . "</span> cigarettes, on average that's about <span>" . round($valueAverage) . "</span> a day! " . $goal;

/*========================================================
    SOURCE
========================================================*/

// (1) https://www.w3schools.com/php/func_math_round.asp

?>
