<?php

$aktualneUmiestnenie = "http://tss.6f.sk";
include_once 'functions.php';
if ($_POST) {
    $realm = $_POST['realm'];
    $postava = ucfirst(strtolower(str_replace(" ", "", $_POST['postava'])));
    if (isset($_POST['CRON'])) {
        $cron = "1";
    } else {
        $cron = null;
    }
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

            if (isset($_POST['armory_show'])) {
                $armory_show = $_POST['armory_show'];
                $showpictR = TRUE;
            } else {
                $armory_show = null;
            }
            if (isset($_POST['server_show'])) {
                $server_show = $_POST['server_show'];
                $showservR = TRUE;
            } else {
                $server_show = null;
            }
            if (isset($_POST['guilda_show'])) {
                $guildName = $xml->characterInfo->character['guildName'];
                $guilda_show = $_POST['guilda_show'];
                $showguildR = TRUE;
            } else {
                $guildName = $guilda_show = null;
            }
            if (isset($_POST['achievy_show'])) {
                $achievpoints = $xml->characterInfo->character['points'];
                $achievearned = $xml2->achievements->summary->c['earned'];
                $achievtotal = $xml2->achievements->summary->c['total'];
                $achievy_show = $_POST['achievy_show'];
                $showachR = TRUE;
            } else {
                $achievpoints = $achievearned = $achievtotal = $achievy_show = null;
            }
            if (isset($_POST['hk_show'])) {
                $honorkills = $xml->characterInfo->character['kills'];
                $hk_show = $_POST['hk_show'];
                $showhkR = TRUE;
            } else {
                $honorkills = $hk_show = null;
            }
            if (isset($_POST['level_show'])) {
                $char_level = $xml->characterInfo->character['level'];
                $level_show = $_POST['level_show'];
                $showlvlR = TRUE;
            } else {
                $char_level = $level_show = null;
            }

            if (isset($_POST['spec_show'])) {
                foreach ($xml->characterInfo->characterTab->talentSpecs->talentSpec as $talentSpec) {
                    if ($talentSpec['active'] == "1") /* active spec */
                        $activeSpec = $talentSpec['prim'];
                    if ($talenty1 == null) {
                        $talenty1 = $talentSpec['prim'];
                    } else {
                        $talenty2 = $talentSpec['prim'];
                    }
                }
                $spec_show = $_POST['spec_show'];
                $showtalentR = TRUE;
            } else {
                $talenty1 = $talenty2 = $spec_show = null;
            }

            /* ------------------------------------------ */
            if (isset($_POST['hp_show'])) {
                $hp = $xml->characterInfo->characterTab->characterBars->health['effective'];
                $hp_show = $_POST['hp_show'];
                $for_javascript++;
                $stat1 = TRUE;
            } else {
                $hp = $hp_show = null;
            }

            if (isset($_POST['mana_show'])) {
                $mana = $xml->characterInfo->characterTab->characterBars->secondBar['effective'];
                $mana_show = $_POST['mana_show'];
                $for_javascript++;
                $stat2 = TRUE;
            } else {
                $mana = $mana_show = null;
            }
            if (isset($_POST['sph_show'])) {
                $holy = $xml->characterInfo->characterTab->spell->bonusDamage->holy['value'];
                $fire = $xml->characterInfo->characterTab->spell->bonusDamage->fire['value'];
                $nature = $xml->characterInfo->characterTab->spell->bonusDamage->nature['value'];
                $frost = $xml->characterInfo->characterTab->spell->bonusDamage->frost['value'];
                $shadow = $xml->characterInfo->characterTab->spell->bonusDamage->shadow['value'];
                $arcane = $xml->characterInfo->characterTab->spell->bonusDamage->arcane['value'];
                $sp = min($holy, $fire, $nature, $frost, $shadow, $arcane);
                $heal = $xml->characterInfo->characterTab->spell->bonusHealing['value'];
                $sph_show = $_POST['sph_show'];
                $for_javascript++;
                $stat3 = TRUE;
            } else {
                $sp = $heal = $sph_show = null;
            }
            if (isset($_POST['ap_show'])) {
                $ap = $xml->characterInfo->characterTab->melee->power['effective'];
                $rap = $xml->characterInfo->characterTab->ranged->power['effective'];
                $ap_show = $_POST['ap_show'];
                $for_javascript++;
                $stat4 = TRUE;
            } else {
                $ap = $rap = $ap_show = null;
            }
            if (isset($_POST['mrsc_show'])) {
                $nature = (float) $xml->characterInfo->characterTab->spell->critChance->nature['percent'];
                $holy = (float) $xml->characterInfo->characterTab->spell->critChance->holy['percent'];
                $shadow = (float) $xml->characterInfo->characterTab->spell->critChance->shadow['percent'];
                $arcane = (float) $xml->characterInfo->characterTab->spell->critChance->arcane['percent'];
                $frost = (float) $xml->characterInfo->characterTab->spell->critChance->frost['percent'];
                $fire = (float) $xml->characterInfo->characterTab->spell->critChance->fire['percent'];
                $sc = number_format(($nature + $holy + $shadow + $arcane + $frost + $fire) / 6, 2);
                $mc = number_format((float) $xml->characterInfo->characterTab->melee->critChance['percent'], 2);
                $rc = number_format((float) $xml->characterInfo->characterTab->ranged->critChance['percent'], 2);
                $mrsc_show = $_POST['mrsc_show'];
                $for_javascript++;
                $stat5 = TRUE;
            } else {
                $mrsc_show = $mc = $rc = $sc = null;
            }
            if (isset($_POST['dodge_show'])) {
                $dodge = number_format((float) $xml->characterInfo->characterTab->defenses->dodge['percent'], 2);
                $dodge_show = $_POST['dodge_show'];
                $for_javascript++;
                $stat6 = TRUE;
            } else {
                $dodge = $dodge_show = null;
            }
            if (isset($_POST['parry_show'])) {
                $parry = number_format((float) $xml->characterInfo->characterTab->defenses->parry['percent'], 2);
                $parry_show = $_POST['parry_show'];
                $for_javascript++;
                $stat7 = TRUE;
            } else {
                $parry = $parry_show = null;
            }
            if (isset($_POST['block_show'])) {
                $block = number_format((float) $xml->characterInfo->characterTab->defenses->block['percent'], 2);
                $block_show = $_POST['block_show'];
                $for_javascript++;
                $stat8 = TRUE;
            } else {
                $block = $block_show = null;
            }
            if (isset($_POST['haste_show'])) {
                $haste = $xml->characterInfo->characterTab->spell->hasteRating['hasteRating'];
                $haste_show = $_POST['haste_show'];
                $for_javascript++;
                $stat9 = TRUE;
            } else {
                $haste = $haste_show = null;
            }

            /* ------------------------------------------ */
            $odkaz = "image.php?"
                    . "name=$char_name"
                    . "&amp;level=$char_level"
                    . "&amp;frakcia=$frakcia"
                    . "&amp;guilda=$guildName"
                    . "&amp;class=$class"
                    . "&amp;realm=$realm"
                    . "&amp;talents1=$talenty1"
                    . "&amp;talents2=$talenty2"
                    . "&amp;achievy=$achievpoints"
                    . "&amp;achievyearn=$achievearned"
                    . "&amp;achievytotal=$achievtotal"
                    . "&amp;prefix=$char_title_prefix"
                    . "&amp;suffix=$char_title_suffix"
                    . "&amp;honork=$honorkills"
                    . "&amp;genderid=$genderId"
                    . "&amp;raceid=$raceId"
                    . "&amp;classid=$classId"
                    . "&amp;hp=$hp"
                    . "&amp;mana=$mana"
                    . "&amp;sp=$sp"
                    . "&amp;heal=$heal"
                    . "&amp;ap=$ap"
                    . "&amp;rap=$rap"
                    . "&amp;mc=$mc"
                    . "&amp;sc=$sc"
                    . "&amp;rc=$rc"
                    . "&amp;dodge=$dodge"
                    . "&amp;parry=$parry"
                    . "&amp;block=$block"
                    . "&amp;haste=$haste"
                    . "&amp;activeSpec=$activeSpec"

                    /* check zobrazenia */
                    . "&amp;armory_show=$armory_show"
                    . "&amp;server_show=$server_show"
                    . "&amp;guilda_show=$guilda_show"
                    . "&amp;achievy_show=$achievy_show"
                    . "&amp;hk_show=$hk_show"
                    . "&amp;level_show=$level_show"
                    . "&amp;spec_show=$spec_show"
                    . "&amp;hp_show=$hp_show"
                    . "&amp;mana_show=$mana_show"
                    . "&amp;sph_show=$sph_show"
                    . "&amp;ap_show=$ap_show"
                    . "&amp;mrsc_show=$mrsc_show"
                    . "&amp;dodge_show=$dodge_show"
                    . "&amp;parry_show=$parry_show"
                    . "&amp;block_show=$block_show"
                    . "&amp;haste_show=$haste_show"
            ;
            $link = str_replace("&", "&amp;", $link);
            $odkaz = str_replace(" ", "%20", $odkaz);
            print"<br/>\n";
            logging($postava, $realm, $cron);
            repeat($postava, $realm, $showpictR, $showservR, $showguildR, $showachR, $showhkR, $showlvlR, $showtalentR, $stat1, $stat2, $stat3, $stat4, $stat5, $stat6, $stat7, $stat8, $stat9, $cron);
        }
    } else {
        print 'Žiadne vstupné údaje!\n';
    }
    if ($cron == null) {
        print "<div id='obrazok'>\n";
        if (!empty($char_name) && !empty($realm)) {
            print "<div id='vysledok'><img src='$odkaz' alt='signature'/>\n";
            print "<br/>\n<br/>\n";
            print "<table>\n";
            print "<tr>\n";
            print "<td>Forum link: </td>\n";
            print "<td>Direct link: \n</td>\n";
            print "</tr>\n";
            print "<tr>\n";
            print "<td><textarea id='forum' cols='40' rows='3' readonly='readonly' onClick=\"SelectAll('forum');\">\n";
            print "[url=$link][img]$aktualneUmiestnenie/signatures/$char_name" . "_" . "$realm.png" . "[/img][/url]";
            print "\rGenerated by [url=$aktualneUmiestnenie]Revenge[/url]\n";
            print "</textarea>\n</td>\n";
            print "<td>\n";
            print "<textarea id='direct' cols='40' rows='3' readonly='readonly' onClick=\"SelectAll('direct');\">\n";
            print "$aktualneUmiestnenie/signatures/$char_name" . "_" . "$realm.png\n";
            print "</textarea>\n</td>\n";
            print "</tr>\n";
            print "</table>\n</div>\n";
            print "<div id='myProfile' style='visibility: hidden;'>\n<!-- Sorry man, but i need more visitors...I'm a visitor Whore :D -->\n";
            print "<iframe src='http://forum.twinstar.cz/member.php/10520-sknitro'>too sad you dont allow iframe...</iframe>\n";
            print "</div>\n";
            print "<script type=\"text/javascript\">var count = " . $for_javascript . ";</script>";
        }
    } else {
        print "<img src='$odkaz' alt='signature'/>\n";
    }
    print "</div>";
}
?>