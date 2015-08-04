<?php

include_once 'functions.php';
include_once 'allowed_realms.php';
$aktualneUmiestnenie = curPageURL();

$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$starttime = $mtime;

/* read info from file */
$list = array();
$filename = "cronscript.log";
if (is_file($filename)) {
    $trimmed = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($trimmed as $line) {
        $exp = explode(",", $line);
        $name = $exp[0];
        unset($exp[0]);
        $realm = $exp[1];
        unset($exp[1]);
        array_push($list, array("name" => $name, "realm" => $realm, $exp));
    }
}
/* remove duplicities and old entries */
$dd = count($list);
for ($i = 0; $i < $dd; $i++) {
    $name = @$list[$i]["name"];
    $realm = @$list[$i]["realm"];
    for ($j = $i + 1; $j < $dd; $j++) {
        $name2 = @$list[$j]["name"];
        $realm2 = @$list[$j]["realm"];
        if ($name == $name2 && $realm == $realm2) {
            unset($list[$j]);
        }
    }
}
reset($list);

/* backup old file */
if (is_file($filename)) {
    $current = file_get_contents($filename);
    $backup = "backup/";
    $backupfilename = $backup . $filename . "_" . date('d-m-Y') . ".bak";
    if (is_file($backupfilename)) {
        $backupfilename = $backup . $filename . "_" . date('d-m-Y') . "[1].bak";
    }
    if (!is_dir($backup)) {
        mkdir($backup, 0700);
    }
    file_put_contents($backupfilename, $current . "\n");
}
/* end backup */
$current = null;
foreach ($list as $line) {
    $current .= $line["name"] . ",";
    $current .= $line["realm"] . ",";
    for ($i = 0; $i < 16; $i++) {
        $numItems = count(@$line[$i]);
        $j = 0;
        $argum = @$line[$i];
        if (is_array($argum)) {
            foreach ($argum as $linesep) {
                $current .= $linesep;
                if (++$j != $numItems) {
                    $current .= ",";
                } else {
                    $current .= "\n";
                }
            }
        }
    }
// Write the contents back to the file
    file_put_contents($filename, $current . "\n");
}
/* OLD/DUPL detect end */

/* Generate picture */
if (is_file($filename)) {
    $trimmed = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($trimmed as $line) {
        $exp = explode(",", $line);
        /* data */
        $i = 0;
        $name = $exp[$i];
        $realm = $exp[++$i];
        $showpictR = $exp[++$i];
        $showservR = $exp[++$i];
        $showguildR = $exp[++$i];
        $showachR = $exp[++$i];
        $showhkR = $exp[++$i];
        $showlvlR = $exp[++$i];
        $showtalentR = $exp[++$i];
        $stat1 = $exp[++$i];
        $stat2 = $exp[++$i];
        $stat3 = $exp[++$i];
        $stat4 = $exp[++$i];
        $stat5 = $exp[++$i];
        $stat6 = $exp[++$i];
        $stat7 = $exp[++$i];
        $stat8 = $exp[++$i];
        $stat9 = $exp[++$i];
        /* send to */
        $_POST['realm'] = returnNULL($realm);
        $_POST['postava'] = returnNULL($name);
        $_POST['armory_show'] = returnNULL($showpictR);
        $_POST['server_show'] = returnNULL($showservR);
        $_POST['guilda_show'] = returnNULL($showguildR);
        $_POST['achievy_show'] = returnNULL($showachR);
        $_POST['hk_show'] = returnNULL($showhkR);
        $_POST['level_show'] = returnNULL($showlvlR);
        $_POST['spec_show'] = returnNULL($showtalentR);
        $_POST['hp_show'] = returnNULL($stat1);
        $_POST['mana_show'] = returnNULL($stat2);
        $_POST['sph_show'] = returnNULL($stat3);
        $_POST['ap_show'] = returnNULL($stat4);
        $_POST['mrsc_show'] = returnNULL($stat5);
        $_POST['dodge_show'] = returnNULL($stat6);
        $_POST['parry_show'] = returnNULL($stat7);
        $_POST['block_show'] = returnNULL($stat8);
        $_POST['haste_show'] = returnNULL($stat9);

        /* CRON */
        $_POST['CRON'] = 1;
        /* END */



        if ($_POST) {
            $realm = $_POST['realm'];
            $postava = ucfirst(strtolower(str_replace(" ", "", $_POST['postava'])));
        }

        if (!empty($realm) && !empty($postava)) {
            $link = "http://armory.twinstar.cz/character-sheet.xml?r=$realm&cn=$postava";
            $link2 = "http://armory.twinstar.cz/character-achievements.xml?r=$realm&cn=$postava"; //nacitanie achievov

            if (isset($realm) && isset($postava)) {
                $xml = pull_xml($link);
                $xml2 = pull_xml($link2);
                if (!isset($xml->characterInfo->character['name'])) {
                    print "<br /><span id='neexistuje'>No Search Results Found (for $postava)!<br />Maybe wrong realm ?</span>";
                } else {
                    /* pouzite premenne */
                    $char_name = $xml->characterInfo->character['name'];
                    $realm = $xml->characterInfo->character['realm'];
                    $realm_type = array_search($realm, $allowed_realms);
                    $char_title_suffix = apostropheStupido($xml->characterInfo->character['suffix']); //titul za menom
                    $char_title_prefix = apostropheStupido($xml->characterInfo->character['prefix']); //titul pred menem
                    $frakcia = $xml->characterInfo->character['factionId'];
                    $class = $xml->characterInfo->character['class'];
                    $genderId = $xml->characterInfo->character['genderId'];
                    $raceId = $xml->characterInfo->character['raceId'];
                    $classId = $xml->characterInfo->character['classId'];
                    $talenty1 = $talenty2 = null;
                    $for_javascript = 0;
                    /* USED variables for CRON script file */
                    $showpictR = $showservR = $showguildR = $showachR = $showhkR = $showlvlR = $showtalentR = 'N';
                    $stat1 = $stat2 = $stat3 = $stat4 = $stat5 = $stat6 = $stat7 = $stat8 = $stat9 = 'N';

                    if ((filter_var($_POST['armory_show']))) {
                        $armory_show = 1;
                        $showpictR = TRUE;
                    } else {
                        $armory_show = null;
                    }
                    if ((filter_var($_POST['server_show']))) {
                        $server_show = 1;
                        $showservR = TRUE;
                    } else {
                        $server_show = null;
                    }
                    if ((filter_var($_POST['guilda_show']))) {
                        $guildName = $xml->characterInfo->character['guildName'];
                        $guilda_show = 1;
                        $showguildR = TRUE;
                    } else {
                        $guildName = $guilda_show = null;
                    }
                    if (filter_var($_POST['achievy_show'])) {
                        $achievpoints = $xml->characterInfo->character['points'];
                        $achievearn = $xml2->achievements->summary->c['earned'];
                        $achievtotal = $xml2->achievements->summary->c['total'];
                        $achievy_show = 1;
                        $showachR = TRUE;
                    } else {
                        $achievpoints = $achievearn = $achievtotal = $achievy_show = null;
                    }
                    if ((filter_var($_POST['hk_show']))) {
                        $honorkills = $xml->characterInfo->character['kills'];
                        $hk_show = 1;
                        $showhkR = TRUE;
                    } else {
                        $honorkills = $hk_show = null;
                    }
                    if ((filter_var($_POST['level_show']))) {
                        $char_level = $xml->characterInfo->character['level'];
                        $level_show = 1;
                        $showlvlR = TRUE;
                    } else {
                        $char_level = $level_show = null;
                    }

                    if ((filter_var($_POST['spec_show']))) {
                        foreach ($xml->characterInfo->characterTab->talentSpecs->talentSpec as $talentSpec) {
                            if ($talentSpec['active'] == "1") /* active spec */
                                $activeSpec = $talentSpec['prim'];
                            if ($talenty1 == null) {
                                $talenty1 = $talentSpec['prim'];
                            } else {
                                $talenty2 = $talentSpec['prim'];
                            }
                        }
                        $spec_show = 1;
                        $showtalentR = TRUE;
                    } else {
                        $talenty1 = $talenty2 = $spec_show = null;
                    }

                    /* ------------------------------------------ */
                    if ((filter_var($_POST['hp_show']))) {
                        $hp = $xml->characterInfo->characterTab->characterBars->health['effective'];
                        $hp_show = 1;
                        $for_javascript++;
                        $stat1 = TRUE;
                    } else {
                        $hp = $hp_show = null;
                    }

                    if ((filter_var($_POST['mana_show']))) {
                        $mana = $xml->characterInfo->characterTab->characterBars->secondBar['effective'];
                        $mana_show = 1;
                        $for_javascript++;
                        $stat2 = TRUE;
                    } else {
                        $mana = $mana_show = null;
                    }
                    if ((filter_var($_POST['sph_show']))) {
                        $holy = $xml->characterInfo->characterTab->spell->bonusDamage->holy['value'];
                        $fire = $xml->characterInfo->characterTab->spell->bonusDamage->fire['value'];
                        $nature = $xml->characterInfo->characterTab->spell->bonusDamage->nature['value'];
                        $frost = $xml->characterInfo->characterTab->spell->bonusDamage->frost['value'];
                        $shadow = $xml->characterInfo->characterTab->spell->bonusDamage->shadow['value'];
                        $arcane = $xml->characterInfo->characterTab->spell->bonusDamage->arcane['value'];
                        $sp = min($holy, $fire, $nature, $frost, $shadow, $arcane);
                        $heal = $xml->characterInfo->characterTab->spell->bonusHealing['value'];
                        $sph_show = 1;
                        $for_javascript++;
                        $stat3 = TRUE;
                    } else {
                        $sp = $heal = $sph_show = null;
                    }
                    if ((filter_var($_POST['ap_show']))) {
                        $ap = $xml->characterInfo->characterTab->melee->power['effective'];
                        $rap = $xml->characterInfo->characterTab->ranged->power['effective'];
                        $ap_show = 1;
                        $for_javascript++;
                        $stat4 = TRUE;
                    } else {
                        $ap = $rap = $ap_show = null;
                    }
                    if ((filter_var($_POST['mrsc_show']))) {
                        $nature = (float) $xml->characterInfo->characterTab->spell->critChance->nature['percent'];
                        $holy = (float) $xml->characterInfo->characterTab->spell->critChance->holy['percent'];
                        $shadow = (float) $xml->characterInfo->characterTab->spell->critChance->shadow['percent'];
                        $arcane = (float) $xml->characterInfo->characterTab->spell->critChance->arcane['percent'];
                        $frost = (float) $xml->characterInfo->characterTab->spell->critChance->frost['percent'];
                        $fire = (float) $xml->characterInfo->characterTab->spell->critChance->fire['percent'];
                        $sc = number_format(($nature + $holy + $shadow + $arcane + $frost + $fire) / 6, 2);
                        $mc = number_format((float) $xml->characterInfo->characterTab->melee->critChance['percent'], 2);
                        $rc = number_format((float) $xml->characterInfo->characterTab->ranged->critChance['percent'], 2);
                        $mrsc_show = 1;
                        $for_javascript++;
                        $stat5 = TRUE;
                    } else {
                        $mrsc_show = $mc = $rc = $sc = null;
                    }
                    if ((filter_var($_POST['dodge_show']))) {
                        $dodge = number_format((float) $xml->characterInfo->characterTab->defenses->dodge['percent'], 2);
                        $dodge_show = 1;
                        $for_javascript++;
                        $stat6 = TRUE;
                    } else {
                        $dodge = $dodge_show = null;
                    }
                    if ((filter_var($_POST['parry_show']))) {
                        $parry = number_format((float) $xml->characterInfo->characterTab->defenses->parry['percent'], 2);
                        $parry_show = 1;
                        $for_javascript++;
                        $stat7 = TRUE;
                    } else {
                        $parry = $parry_show = null;
                    }
                    if ((filter_var($_POST['block_show']))) {
                        $block = number_format((float) $xml->characterInfo->characterTab->defenses->block['percent'], 2);
                        $block_show = 1;
                        $for_javascript++;
                        $stat8 = TRUE;
                    } else {
                        $block = $block_show = null;
                    }
                    if ((filter_var($_POST['haste_show']))) {
                        $haste = $xml->characterInfo->characterTab->spell->hasteRating['hasteRating'];
                        $haste_show = 1;
                        $for_javascript++;
                        $stat9 = TRUE;
                    } else {
                        $haste = $haste_show = null;
                    }
                    /* ------------------------------------------ */

                    $_GET['name'] = "$char_name";
                    $_GET['level'] = "$char_level";
                    $_GET['frakcia'] = "$frakcia";
                    $_GET['guilda'] = "$guildName";
                    $_GET['class'] = "$class";
                    $_GET['realm'] = "$realm";
                    $_GET['talents1'] = "$talenty1";
                    $_GET['talents2'] = "$talenty2";
                    $_GET['achievy'] = "$achievpoints";
                    $_GET['achievyearn'] = "$achievearn";
                    $_GET['achievytotal'] = "$achievtotal";
                    $_GET['prefix'] = "$char_title_prefix";
                    $_GET['suffix'] = "$char_title_suffix";
                    $_GET['honork'] = "$honorkills";
                    $_GET['genderid'] = "$genderId";
                    $_GET['raceid'] = "$raceId";
                    $_GET['classid'] = "$classId";
                    $_GET['hp'] = "$hp";
                    $_GET['mana'] = "$mana";
                    $_GET['sp'] = "$sp";
                    $_GET['heal'] = "$heal";
                    $_GET['ap'] = "$ap";
                    $_GET['rap'] = "$rap";
                    $_GET['mc'] = "$mc";
                    $_GET['sc'] = "$sc";
                    $_GET['rc'] = "$rc";
                    $_GET['dodge'] = "$dodge";
                    $_GET['parry'] = "$parry";
                    $_GET['block'] = "$block";
                    $_GET['haste'] = "$haste";
                    $_GET['activeSpec'] = "$activeSpec";

                    /* check zobrazenia */
                    $_GET['armory_show'] = "$armory_show";
                    $_GET['server_show'] = "$server_show";
                    $_GET['guilda_show'] = "$guilda_show";
                    $_GET['achievy_show'] = "$achievy_show";
                    $_GET['hk_show'] = "$hk_show";
                    $_GET['level_show'] = "$level_show";
                    $_GET['spec_show'] = "$spec_show";
                    $_GET['hp_show'] = "$hp_show";
                    $_GET['mana_show'] = "$mana_show";
                    $_GET['sph_show'] = "$sph_show";
                    $_GET['ap_show'] = "$ap_show";
                    $_GET['mrsc_show'] = "$mrsc_show";
                    $_GET['dodge_show'] = "$dodge_show";
                    $_GET['parry_show'] = "$parry_show";
                    $_GET['block_show'] = "$block_show";
                    $_GET['haste_show'] = "$haste_show";

                    $_GET['realm_type'] = "$realm_type";
                    $_GET['cron'] = true;

                    repeat($postava, $realm, $showpictR, $showservR, $showguildR, $showachR, $showhkR, $showlvlR, $showtalentR, $stat1, $stat2, $stat3, $stat4, $stat5, $stat6, $stat7, $stat8, $stat9, "1");
                }
            }
        }
        include 'image.php';
    }
}
$mtime = microtime();
$mtime = explode(" ", $mtime);
$mtime = $mtime[1] + $mtime[0];
$endtime = $mtime;
$totaltime = ($endtime - $starttime);
echo "This page was created in " . $totaltime . " seconds";
?>