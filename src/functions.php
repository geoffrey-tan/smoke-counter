<?php

/*========================================================
ASHTRAYIP
========================================================*/

$sqlCurrent = "SELECT str FROM geoffrey.settings WHERE id = 2";
$res = mysqli_query($link, $sqlCurrent);

if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {
        $ashtrayIp = $row["str"];
    }
} else {
}

$res->free();

/*========================================================
CURRENTCOUNTER
========================================================*/

$sqlCurrent = "SELECT COUNT(*) FROM geoffrey.cigarette WHERE DATE(date)=CURDATE()";
$res = mysqli_query($link, $sqlCurrent);

if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {
        $currentCounter = $row["COUNT(*)"];
    }
} else {
}

$res->free();

/*========================================================
MAXCOUNTER
========================================================*/

$sqlMax = "SELECT `value` FROM `settings` WHERE id = 1";
$res = mysqli_query($link, $sqlMax);

if (mysqli_num_rows($res) > 0) {

    while ($row = mysqli_fetch_assoc($res)) {
        $maxCounter = $row["value"];
    }
} else {
}

$res->free();

/*========================================================
DAILY
========================================================*/

$daily = array();
$temp = null;
$idTemp = 0;

$sql = "SELECT COUNT(*) FROM geoffrey.cigarette where DATE(date)=CURDATE(); ";
$sql .= "SELECT COUNT(*) FROM geoffrey.cigarette where DATE(date)=CURDATE() - interval 1 day; ";

if (!$link->multi_query($sql)) {
    echo "Multi query failed: (" . $link->errno . ") " . $link->error;
}

do {
    if ($res = $link->store_result()) {

        while ($row = mysqli_fetch_assoc($res)) {

            array_push($daily, $row["COUNT(*)"]);

        }

        $res->free();
    }

} while ($link->more_results() && $link->next_result());

if (count($daily) >= 1) {
    $temp = $maxCounter - $daily[0]; // + $daily[1];
} else {
    array_push($daily, null);
}

if ($daily != null && $daily[0] > $maxCounter) {
    $idTemp = 9;
} elseif ($temp == null) {
    $idTemp = 0;
} elseif ($temp == 1) {
    $idTemp = 1;
} elseif ($temp == 2) {
    $idTemp = 0;
} elseif ($temp == 3) {
    $idTemp = 0;
} elseif ($temp == 4) {
    $idTemp = 0;
} elseif ($temp == 5) {
    $idTemp = 0;
} elseif ($temp == 6) {
    $idTemp = 6;
} elseif ($temp == 7) {
    $idTemp = 0;
} elseif ($temp == 8) {
    $idTemp = 0;
} elseif ($temp == 9) {
    $idTemp = 0;
} elseif ($temp == 10) {
    $idTemp = 0;
} else {
    $idTemp = 0;
}
