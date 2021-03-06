<?php

$aktualneUmiestnenie = curPageURL();
include_once 'functions.php';

if ($_POST) {


    $realm = filter_input(INPUT_POST, 'realm');
    $postava = ucfirst(strtolower(str_replace(" ", "", filter_input(INPUT_POST, 'postava'))));
    if ((filter_input(INPUT_POST, 'CRON'))) {
        $cron = "1";
    } else {
        $cron = null;
    }
}

if (!empty($realm) && !empty($postava)) {
    $link = "http://armory.twinstar.cz/character-sheet.xml?r=$realm&cn=$postava";
    $link2 = "http://armory.twinstar.cz/character-achievements.xml?r=$realm&cn=$postava"; //nacitanie achievov

    $realm_type = array_search($realm, $allowed_realms);


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

            if ((filter_input(INPUT_POST, 'armory_show'))) {
                $armory_show = 1;
                $showpictR = TRUE;
            } else {
                $armory_show = null;
            }
            if ((filter_input(INPUT_POST, 'server_show'))) {
                $server_show = 1;
                $showservR = TRUE;
            } else {
                $server_show = null;
            }
            if ((filter_input(INPUT_POST, 'guilda_show'))) {
                $guildName = $xml->characterInfo->character['guildName'];
                $guilda_show = 1;
                $showguildR = TRUE;
            } else {
                $guildName = $guilda_show = null;
            }
            if ((filter_input(INPUT_POST, 'achievy_show'))) {
                $achievpoints = $xml->characterInfo->character['points'];
                $achievearned = $xml2->achievements->summary->c['earned'];
                $achievtotal = $xml2->achievements->summary->c['total'];
                $achievy_show = 1;
                $showachR = TRUE;
            } else {
                $achievpoints = $achievearned = $achievtotal = $achievy_show = null;
            }
            if ((filter_input(INPUT_POST, 'hk_show'))) {
                $honorkills = $xml->characterInfo->character['kills'];
                $hk_show = 1;
                $showhkR = TRUE;
            } else {
                $honorkills = $hk_show = null;
            }
            if ((filter_input(INPUT_POST, 'level_show'))) {
                $char_level = $xml->characterInfo->character['level'];
                $level_show = 1;
                $showlvlR = TRUE;
            } else {
                $char_level = $xml->characterInfo->character['level'];
                $level_show = null;
            }
            if ($realm_type != "vanilla" and $realm_type != "tbc") {
                if ((filter_input(INPUT_POST, 'spec_show'))) {
                    foreach ($xml->characterInfo->characterTab->talentSpecs->talentSpec as $talentSpec) {
                        if ($talentSpec['active'] == "1") /* active spec */ {
                            $activeSpec = $talentSpec['prim'];
                        }
                        if ($talenty1 == null) {
                            $talenty1 = $talentSpec['prim'];
                        } else {
                            $talenty2 = $talentSpec['prim'];
                        }
                    }
                    $spec_show = 1;
                    $showtalentR = TRUE;
                } else {
                    $talenty1 = $talenty2 = $spec_show = $activeSpec = null;
                }
            } else {
                $activeSpec = null;
                $spec_show = 0;
            }


            /* ------------------------------------------ */
            if ((filter_input(INPUT_POST, 'hp_show'))) {
                $hp = $xml->characterInfo->characterTab->characterBars->health['effective'];
                $hp_show = 1;
                $for_javascript++;
                $stat1 = TRUE;
            } else {
                $hp = $hp_show = null;
            }

            if ((filter_input(INPUT_POST, 'mana_show'))) {
                $mana = $xml->characterInfo->characterTab->characterBars->secondBar['effective'];
                $mana_show = 1;
                $for_javascript++;
                $stat2 = TRUE;
            } else {
                $mana = $mana_show = null;
            }
            if ((filter_input(INPUT_POST, 'sph_show'))) {
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
            if ((filter_input(INPUT_POST, 'ap_show'))) {
                $ap = $xml->characterInfo->characterTab->melee->power['effective'];
                $rap = $xml->characterInfo->characterTab->ranged->power['effective'];
                $ap_show = 1;
                $for_javascript++;
                $stat4 = TRUE;
            } else {
                $ap = $rap = $ap_show = null;
            }
            if ((filter_input(INPUT_POST, 'mrsc_show'))) {
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
            if ((filter_input(INPUT_POST, 'dodge_show'))) {
                $dodge = number_format((float) $xml->characterInfo->characterTab->defenses->dodge['percent'], 2);
                $dodge_show = 1;
                $for_javascript++;
                $stat6 = TRUE;
            } else {
                $dodge = $dodge_show = null;
            }
            if ((filter_input(INPUT_POST, 'parry_show'))) {
                $parry = number_format((float) $xml->characterInfo->characterTab->defenses->parry['percent'], 2);
                $parry_show = 1;
                $for_javascript++;
                $stat7 = TRUE;
            } else {
                $parry = $parry_show = null;
            }
            if ((filter_input(INPUT_POST, 'block_show'))) {
                $block = number_format((float) $xml->characterInfo->characterTab->defenses->block['percent'], 2);
                $block_show = 1;
                $for_javascript++;
                $stat8 = TRUE;
            } else {
                $block = $block_show = null;
            }
            if ((filter_input(INPUT_POST, 'haste_show'))) {
                $haste = $xml->characterInfo->characterTab->spell->hasteRating['hasteRating'];
                $haste_show = 1;
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
                    . "&amp;realm_type=$realm_type"
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
            print "<div id='vysledok'><img src='$odkaz' alt='signature'/>\n" .
                    "<br/>\n<br/>\n" .
                    "<table>\n" .
                    "<tr>\n" .
                    "<td>Forum link: </td>\n" .
                    "<td>Direct link: \n</td>\n" .
                    "</tr>\n" .
                    "<tr>\n" .
                    "<td><textarea id='forum' cols='40' rows='3' readonly='readonly' onClick=\"SelectAll('forum');\">\n" .
                    "[url=$link][img]$aktualneUmiestnenie/signatures/$char_name" . "_" . "$realm.png" . "[/img][/url]" .
                    "\rGenerated by [url=$aktualneUmiestnenie]Revenge[/url]\n" .
                    "</textarea>\n</td>\n" .
                    "<td>\n" .
                    "<textarea id='direct' cols='40' rows='3' readonly='readonly' onClick=\"SelectAll('direct');\">\n" .
                    "$aktualneUmiestnenie/signatures/$char_name" . "_" . "$realm.png\n" .
                    "</textarea>\n</td>\n" .
                    "</tr>\n" .
                    "</table>\n</div>\n" .
                    "<script type=\"text/javascript\">var count = " . $for_javascript . ";</script>";
        }
    } else {
        print "<img src='$odkaz' alt='signature'/>\n";
    }
    print "</div>";
}