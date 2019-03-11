<?php
require_once('/../database.php'); // contains $link

/*========================================================
    VARIABLES
========================================================*/

$message = $_POST['message']; // (1) PHP Manual
$context = $_POST['context'];
$valuePostone = $_POST['valueOne'];
$valuePosttwo = $_POST['valueTwo'];
$intentValueone = NULL;
$intentValuetwo = NULL;

$intentGreeting = array("hi", "hello", "hey");
$intentHelp = array("help");
$intentQuit = array("quit", "stop");
$intentMost = array("smoke", "most");
$intentLast = array("last", "time");

/*========================================================
    FUNCTIONS
========================================================*/

function checkIntent($intent) {
    global $message; // (3) Stackoverflow
    $temp = false;

    for ($i = 0; $i < sizeof($intent); $i++) { // (2) Stackoverflow
        if (stripos($message, $intent[$i]) !== false) { // (4) Stackoverflow

            $temp = true;

            break; // (5) Stackoverflow
        }
    }
    return $temp;
}

function sqlQuery($sql, $valueone, $valuetwo) {
    global $link;
    global $intentValueone;
    global $intentValuetwo;

    $res = mysqli_query($link, $sql);

    if (mysqli_num_rows($res) > 0) {
        while($row = mysqli_fetch_assoc($res)) {
            $intentValueone = $row[$valueone];
            $intentValuetwo = $row[$valuetwo];
        }
    } else {
    }
    $res->free();
}

/*========================================================
    SCRIPTS
========================================================*/

if ($context == 1) {
    echo "<h2><strong>Assistant</strong></h2><p>How much does <span>1 pack</span> of cigarettes cost?</p>";
} elseif ($context == 2) {
    echo "<h2><strong>Assistant</strong></h2><p>And <span>how many cigarettes</span> does it contain?</p>";
} elseif ($context == 3) {
    $sqlMoney = 'SELECT COUNT(*) AS count FROM geoffrey.cigarette';
    sqlQuery($sqlMoney, "count", "count");

    $calc = $intentValueone / $valuePosttwo * $valuePostone;
    $calcMoney = number_format((float)$calc, 2, ',', ''); // (6) Stackoverflow

    if ($calc < 30) {
        $resultCalc = "</p>";
    } else {
        $resultCalc = "That's about 3 months of Netflix!</p>";
    }

    echo "<h2><strong>Assistant</strong></h2><p>You smoked <span>" . $intentValueone . "</span> cigarettes which is <span>€" . $calcMoney . "</span>! " . $resultCalc;
}

if (checkIntent($intentGreeting) == true) {
    echo "<h2><strong>Assistant</strong></h2><p>Hi, you can type <span class='em'>help</span> to see what you can ask me! 😁  (blue keywords can be tapped)</p>";
} elseif (checkIntent($intentHelp) == true) {
    echo "<h2><strong>Assistant</strong></h2><p>You can ask me:</p><p>When do I <span class='em'>smoke the most</span>?</p><p>How <span class='em'>much money</span> have I spent on cigarettes?</p><p>When was the <span class='em'>last time</span> I smoked a cigarette?</p>";
} elseif(checkIntent($intentQuit) == true) {
    echo "<h2><strong>Assistant</strong></h2><p>Yes</p>";
} elseif (checkIntent($intentMost) == true) {
    $sqlMost = 'SELECT HOUR(date) AS hour, COUNT(*) AS count FROM geoffrey.cigarette WHERE date BETWEEN CURDATE() - INTERVAL 31 day AND CURDATE() GROUP BY HOUR(date) ORDER BY `count` DESC LIMIT 1';
    sqlQuery($sqlMost, "hour", "count");

    echo "<h2><strong>Assistant</strong></h2><p>For the last month you seem to smoke the most at <span>" . $intentValueone . "</span> o'clock with a total of <span>" . $intentValuetwo . "</span> cigarettes! 🚬</p>";
} elseif (checkIntent($intentLast) == true) {
    $sqlLast = 'SELECT date, DATEDIFF(CURdate(), date(date)) as difference FROM geoffrey.cigarette ORDER BY ID DESC LIMIT 1';
    sqlQuery($sqlLast, "date", "difference");

    if ($intentValuetwo <= 1) {
        $intentValueone = "Well it's a start 🤔</p>";
    } else {
        $intentValueone = "</p>";
    }

    echo "<h2><strong>Assistant</strong></h2><p>Your last cigarette was <span>" . $intentValuetwo . "</span> days ago! " . $intentValueone;
} elseif ($context == 0) {
    echo "<h2><strong>Assistant</strong></h2><p>I don't quite understand, try typing <span class='em'>help</span> (blue keywords can be tapped)</p>";
}

/*========================================================
    SOURCE
========================================================*/

// (1) http://php.net/manual/en/reserved.variables.post.php
// (2) https://stackoverflow.com/questions/42226780/how-to-find-the-size-of-array/42226809
// (3) https://stackoverflow.com/questions/6058781/undefined-variable-problem-with-php-function
// (4) https://stackoverflow.com/questions/15305278/php-how-to-check-if-a-string-contain-any-text
// (5) https://stackoverflow.com/questions/588892/can-you-exit-a-loop-in-php
// (6) https://stackoverflow.com/questions/4483540/php-show-a-number-to-2-decimal-places

?>
