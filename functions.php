<?php

function curPageURL() {
    $pageURL = 'http';

    if (filter_input(INPUT_SERVER, "HTTPS") == "on") {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if (filter_input(INPUT_SERVER, "SERVER_PORT") != "80") {
        $pageURL .= filter_input(INPUT_SERVER, "SERVER_NAME") . ":" . filter_input(INPUT_SERVER, "SERVER_PORT") . filter_input(INPUT_SERVER, "REQUEST_URI");
    } else {
        $pageURL .= filter_input(INPUT_SERVER, "SERVER_NAME") . filter_input(INPUT_SERVER, "REQUEST_URI");
    }
    return str_replace("/index.php", "", $pageURL);
}

function pull_xml($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
    $url_string = curl_exec($ch);
    curl_close($ch);

    return simplexml_load_string($url_string);
}

function logging($postava, $realm, $cron = null) {
    if ($cron == null) {
        $log = "signature.log";
        $datum = StrFTime("%d.%m.%Y [%H:%M:%S]", Time());
        $old = null;
        if (file_exists($log)) {
            $read = fopen($log, 'r') or die("can't open file");
            $old = fread($read, filesize($log));
            fclose($read);
        }
        $file = fopen($log, 'w') or die("can't open file");
        $stringDataLog = "$postava  ($realm)  ->  $datum\n";
        fwrite($file, $stringDataLog . $old);
        fclose($file);
    }
}

function repeat($postava, $realm, $showpictR, $showservR, $showguildR, $showachR, $showhkR, $showlvlR, $showtalentR, $stat1, $stat2, $stat3, $stat4, $stat5, $stat6, $stat7, $stat8, $stat9, $cron = null) {
    if ($cron == null) {
        $log = "cronscript.log";
        $old = null;
        if (file_exists($log)) {
            $read = fopen($log, 'r') or die("can't open file");
            $old = fread($read, filesize($log));
            fclose($read);
        }
        $file = fopen($log, 'w') or die("can't open file");
        $stringDataLog = "$postava,$realm,$showpictR,$showservR,$showguildR,$showachR,$showhkR,$showlvlR,$showtalentR,"
                . "$stat1,$stat2,$stat3,$stat4,$stat5,$stat6,$stat7,$stat8,$stat9\n";
        fwrite($file, $stringDataLog . $old);
        fclose($file);
    }
}

function apostropheStupido($string) {
    $newstring = str_replace("'", "&#39;", $string);
    return $newstring;
}

function getCharName() {
    if (filter_input(INPUT_POST, 'postava')) {
        return filter_input(INPUT_POST, 'postava');
    } else {
        return 'Character name';
    }
}

function SelectRealm($realm_name) {
    if ((filter_var($_POST['realm']))) {
        if (filter_var($_POST['realm']) == $realm_name) {
            return "selected=\"selected\"";
        }
    } else {
        return '';
    }
}

function checked($name) {
    if (filter_input(INPUT_POST, $name)) {
        return " checked=\"checked\"";
    } else {
        return '';
    }
}

function farbaNicku($r, $g, $b, $IMAGE) {
    $farba = imagecolorallocate($IMAGE, $r, $g, $b);
    return $farba;
}

function farbaGuildy($r, $g, $b, $IMAGE) {
    $farba = imagecolorallocate($IMAGE, $r, $g, $b);
    return $farba;
}

function strPixels($string) {
    $strPixelWidths = array(
        //uni
        '[' => 3, '\\' => 3, ']' => 3, '^' => 5, '_' => 7, '`' => 4, ':' => 3, ';' => 3, '<' => 7, '=' => 7, ' ' => 3,
        '!' => 3, '\"' => 4, '#' => 7, '$' => 7, '%' => 11, '&' => 8, "'" => 2, '(' => 4, ')' => 4, '*' => 5, '+' => 7,
        ',' => 3, '-' => 4, '.' => 3, '/' => 3, '>' => 7, '?' => 7, '@' => 12, '{' => 4, '|' => 3, '}' => 4, '~' => 7,
        //number
        '0' => 7, '1' => 7, '2' => 7, '3' => 7, '4' => 7, '5' => 7, '6' => 7, '7' => 7, '8' => 7, '9' => 7,
        //capital
        'A' => 7, 'B' => 8, 'C' => 9, 'D' => 9, 'E' => 8, 'F' => 7, 'G' => 9, 'H' => 7, 'I' => 3, 'J' => 6, 'K' => 8,
        'L' => 7, 'M' => 9, 'N' => 9, 'O' => 9, 'P' => 8, 'Q' => 9, 'R' => 7, 'S' => 8, 'T' => 7, 'U' => 9, 'V' => 7,
        'W' => 11, 'X' => 7, 'Y' => 7, 'Z' => 7,
        //small
        'a' => 6, 'b' => 7, 'c' => 6, 'd' => 7, 'e' => 6, 'f' => 3, 'g' => 7, 'h' => 7, 'i' => 3, 'j' => 3, 'k' => 6,
        'l' => 3, 'm' => 7, 'n' => 5, 'o' => 7, 'p' => 7, 'q' => 7, 'r' => 4, 's' => 7, 't' => 3, 'u' => 7, 'v' => 5,
        'w' => 7, 'x' => 5, 'y' => 5, 'z' => 5);
    $weight = 0;
    if (!empty($string)) {
        for ($i = 0; $i < strlen($string); $i++) {
            //$w = $strPixelWidths[substr($string, $i, 1)];
            if ($strPixelWidths[substr($string, $i, 1)]) {
                $weight += $strPixelWidths[substr($string, $i, 1)];
            }
        }
    }
    return $weight;
}

function returnNULL($str) {
    if ($str == 'N') {
        return null;
    } else {
        return $str;
    }
}

function allowed_realms($name,$datadisk_type) {
    return "<option value=\"" . $name ."\" ". SelectRealm($name) . ">$name ($datadisk_type)</option>\n";
}
