<?php

include_once 'functions.php';

if (!isset(filter_input(INPUT_GET, 'cron'))) {
//header('Content-Disposition: attachment; filename="signature_generated_by_Revenge.png"');
}
$image = imagecreatetruecolor(450, 80);

$TBC = FALSE;

if (isset(filter_input(INPUT_GET, 'realm'))) {
    $realm = filter_input(INPUT_GET, 'realm');
    if ($realm == "Ares") {
        $TBC = TRUE;
    }
}

if (isset(filter_input(INPUT_GET, 'name'))) {
    $name = filter_input(INPUT_GET, 'name');
}

if (isset(filter_input(INPUT_GET, 'level'))) {
    $level = filter_input(INPUT_GET, 'level');
}

if (isset(filter_input(INPUT_GET, 'frakcia'))) {
    $frakcia = filter_input(INPUT_GET, 'frakcia');
}

if (isset(filter_input(INPUT_GET, 'class'))) {
    $class = filter_input(INPUT_GET, 'class');
}
if (isset(filter_input(INPUT_GET, 'talents1'))) {
    $talents1 = ucwords(filter_input(INPUT_GET, 'talents1'));
}
if (isset(filter_input(INPUT_GET, 'talents2'))) {
    $talents2 = ucwords(filter_input(INPUT_GET, 'talents2'));
}
if (isset(filter_input(INPUT_GET, 'achievy'))) {
    $achievy = filter_input(INPUT_GET, 'achievy');
}
if (isset(filter_input(INPUT_GET, 'achievyearn'))) {
    $achievyearn = filter_input(INPUT_GET, 'achievyearn');
}
if (isset(filter_input(INPUT_GET, 'achievytotal'))) {
    $achievytotal = filter_input(INPUT_GET, 'achievytotal');
}
if (isset(filter_input(INPUT_GET, 'prefix'))) {
    $prefix = filter_input(INPUT_GET, 'prefix');
}
if (isset(filter_input(INPUT_GET, 'suffix'))) {
    $suffix = filter_input(INPUT_GET, 'suffix');
}
if (isset(filter_input(INPUT_GET, 'guilda'))) {
    $guilda = filter_input(INPUT_GET, 'guilda');
}
if (isset(filter_input(INPUT_GET, 'honork'))) {
    $honork = filter_input(INPUT_GET, 'honork');
}
if (isset(filter_input(INPUT_GET, 'genderid'))) {
    $genderId = filter_input(INPUT_GET, 'genderid');
}
if (isset(filter_input(INPUT_GET, 'raceid'))) {
    $raceId = filter_input(INPUT_GET, 'raceid');
}
if (isset(filter_input(INPUT_GET, 'classid'))) {
    $classId = filter_input(INPUT_GET, 'classid');
}
if (isset(filter_input(INPUT_GET, 'armory_show'))) {
    $armory_show = filter_input(INPUT_GET, 'armory_show');
}
if (isset(filter_input(INPUT_GET, 'server_show'))) {
    $server_show = filter_input(INPUT_GET, 'server_show');
}
if (isset(filter_input(INPUT_GET, 'guilda_show'))) {
    $guilda_show = filter_input(INPUT_GET, 'guilda_show');
}
if (isset(filter_input(INPUT_GET, 'achievy_show'))) {
    $achievy_show = filter_input(INPUT_GET, 'achievy_show');
}
if (isset(filter_input(INPUT_GET, 'hk_show'))) {
    $hk_show = filter_input(INPUT_GET, 'hk_show');
}
if (isset(filter_input(INPUT_GET, 'level_show'))) {
    $level_show = filter_input(INPUT_GET, 'level_show');
}
if (isset(filter_input(INPUT_GET, 'spec_show'))) {
    $spec_show = filter_input(INPUT_GET, 'spec_show');
}
if (isset(filter_input(INPUT_GET, 'activeSpec'))) {
    $activeSpec = filter_input(INPUT_GET, 'activeSpec');
}
if (isset(filter_input(INPUT_GET, 'hp_show'))) {
    $hp_show = filter_input(INPUT_GET, 'hp_show');
}
if (isset(filter_input(INPUT_GET, 'mana_show'))) {
    $mana_show = filter_input(INPUT_GET, 'mana_show');
}
if (isset(filter_input(INPUT_GET, 'sph_show'))) {
    $sph_show = filter_input(INPUT_GET, 'sph_show');
}
if (isset(filter_input(INPUT_GET, 'ap_show'))) {
    $ap_show = filter_input(INPUT_GET, 'ap_show');
}
if (isset(filter_input(INPUT_GET, 'mrsc_show'))) {
    $mrsc_show = filter_input(INPUT_GET, 'mrsc_show');
}
if (isset(filter_input(INPUT_GET, 'dodge_show'))) {
    $dodge_show = filter_input(INPUT_GET, 'dodge_show');
}
if (isset(filter_input(INPUT_GET, 'parry_show'))) {
    $parry_show = filter_input(INPUT_GET, 'parry_show');
}
if (isset(filter_input(INPUT_GET, 'block_show'))) {
    $block_show = filter_input(INPUT_GET, 'block_show');
}
if (isset(filter_input(INPUT_GET, 'haste_show'))) {
    $haste_show = filter_input(INPUT_GET, 'haste_show');
}

if (isset(filter_input(INPUT_GET, 'hp'))) {
    $hp = filter_input(INPUT_GET, 'hp');
}
if (isset(filter_input(INPUT_GET, 'mana'))) {
    $mana = filter_input(INPUT_GET, 'mana');
}
if (isset(filter_input(INPUT_GET, 'sp'))) {
    $sp = filter_input(INPUT_GET, 'sp');
}
if (isset(filter_input(INPUT_GET, 'heal'))) {
    $heal = filter_input(INPUT_GET, 'heal');
}
if (isset(filter_input(INPUT_GET, 'ap'))) {
    $ap = filter_input(INPUT_GET, 'ap');
}
if (isset(filter_input(INPUT_GET, 'rap'))) {
    $rap = filter_input(INPUT_GET, 'rap');
}
if (isset(filter_input(INPUT_GET, 'mc'))) {
    $mc = filter_input(INPUT_GET, 'mc');
}
if (isset(filter_input(INPUT_GET, 'sc'))) {
    $sc = filter_input(INPUT_GET, 'sc');
}
if (isset(filter_input(INPUT_GET, 'rc'))) {
    $rc = filter_input(INPUT_GET, 'rc');
}
if (isset(filter_input(INPUT_GET, 'dodge'))) {
    $dodge = filter_input(INPUT_GET, 'dodge');
}
if (isset(filter_input(INPUT_GET, 'parry'))) {
    $parry = filter_input(INPUT_GET, 'parry');
}
if (isset(filter_input(INPUT_GET, 'block'))) {
    $block = filter_input(INPUT_GET, 'block');
}
if (isset(filter_input(INPUT_GET, 'haste'))) {
    $haste = filter_input(INPUT_GET, 'haste');
}
global $posunto;
$black = imagecolorallocate($image, 0, 0, 0);
$farbaAchievy = imagecolorallocate($image, 0, 153, 0);
$farbaHK = imagecolorallocate($image, 204, 0, 0);
$farbaStats = imagecolorallocate($image, 100, 50, 0);
$font_size_default = 20;
$font_size_lvl = 16;
$font_size_text = 8;
$space = 4;
$posunZhora = 26;
$posunN = 20;
$posun = 12;
$korekcia = 0;
$korekciaH = 0;
$showMaxStats = 4;
$font = "fonty/tahoma.ttf";
$fontNick = "fonty/nick.ttf";
$fontLevel = "fonty/level.ttf";
$achpoIcon = 'images/others/achiev.gif';
$achpIcon = imagecreatefromstring(file_get_contents($achpoIcon));
$allianceHonor = 'images/others/alliance.gif';
$obludyHonor = 'images/others/horde.gif';
imagefilledrectangle($image, 0, 0, 399, 99, $black); // pozadie

if (empty($name)) {
    $name = null;
}
if (empty($server_show)) {
    $textRealm = null;
} else {
    $textRealm = $realm;
}
if (empty($guilda_show)) {
    $guilda = null;
}
if (empty($achievy_show)) {
    $textAchievy = null;
} else {
    if ($TBC == FALSE) {
        $textAchievy = $achievyearn . " / " . $achievytotal . " [" . $achievy . "]";
    } else {
        $textAchievy = null;
    }
}
if (empty($hk_show)) {
    $textHonorK = null;
} else {
    $textHonorK = $honork;
}
if (empty($level_show)) {
    $textLvl = null;
} else {
    $textLvl = "Lvl " . $level;
}
if (empty($spec_show)) {
    $talents1 = null;
    $talents2 = null;
}

if (empty($hp_show)) {
    $textHP = null;
} else {
    $textHP = "HP " . $hp;
}
if (empty($mana_show)) {
    $textMana = null;
} else {
    if ($class != "Death Knight" && $class != "Rogue" && $class != "Warrior") {
        $textMana = "Mana " . $mana;
    }
}
if (empty($sph_show)) {
    $textSPH = null;
} else {
    if ($class != "Death Knight" && $class != "Rogue" && $class != "Warrior" && $class != "Hunter") {
        if (($class == "Druid" && $activeSpec == "Restoration") ||
                ($class == "Paladin" && $activeSpec == "Holy") ||
                ($class == "Priest" && ($activeSpec == "Holy" || $activeSpec == "Discipline")) ||
                ($class == "Shaman" && $activeSpec == "Restoration")) {
            $textSPH = "Healing " . $heal;
        } else {
            $textSPH = "SP " . $sp;
        }
    }
}
if (empty($ap_show)) {
    $textAP = null;
} else {
    if ($class != "Mage" && $class != "Priest" && $class != "Warlock") {
        if ($class == "Hunter") {
            $textAP = "AP " . $rap;
        } else {
            $textAP = "AP " . $ap;
        }
    }
}
if (empty($mrsc_show)) {
    $textMRSC = null;
} else {
    if ($class == "Hunter") {
        $textMRSC = "Crit " . $rc . "%";
    } else {
        if (($class == "Druid" && ($activeSpec == "Restoration" || $activeSpec == "Balance")) ||
                $class == "Mage" ||
                $class == "Paladin" && $activeSpec == "Holy" ||
                $class == "Priest" ||
                ($class == "Shaman" && ($activeSpec == "Restoration" || $activeSpec == "Elemental")) ||
                $class == "Warlock") {
            $textMRSC = "Crit " . $sc . "%";
        } else {
            $textMRSC = "Crit " . $mc . "%";
        }
    }
}
if (empty($dodge_show)) {
    $textDodge = null;
} else {
    $textDodge = "Dodge " . $dodge . "%";
}
if (empty($parry_show)) {
    $textParry = null;
} else {
    if ($class != "Mage" && $class != "Priest" && $class != "Warlock" && $class != "Druid") {
        $textParry = "Parry " . $parry . "%";
    }
}
if (empty($block_show)) {
    $textBlock = null;
} else {
    if ($class != "Mage" && $class != "Priest" && $class != "Warlock" && $class != "Druid") {
        $textBlock = "Block " . $block . "%";
    }
}
if (empty($haste_show)) {
    $textHaste = null;
} else {
    $textHaste = "Haste " . $haste;
}

switch ($frakcia) {
    case '0':  //aliancia
        $farbaGuildy = farbaGuildy(0, 51, 204, $image);
        $honorIcona = $allianceHonor;
        $honorIcon = imagecreatefromstring(file_get_contents($honorIcona));
        break;
    case '1': //obludy
        $farbaGuildy = farbaGuildy(255, 0, 51, $image);
        $honorIcona = $obludyHonor;
        $honorIcon = imagecreatefromstring(file_get_contents($honorIcona));
        break;
    default: $farbaGuildy = farbaGuildy(255, 255, 255);
}

switch ($class) {
    case 'Druid':
        $farbaNick = farbaNicku(255, 124, 10, $image);
        $avatar = 'images/class/druid_crest.png';
        $korekcia = 2;
        switch ($talents1) {
            case 'Restoration': $spec1 = 'images/talents/druid_resto.gif';
                break;
            case 'Feral Combat': $spec1 = 'images/talents/druid_feral.gif';
                break;
            case 'Balance': $spec1 = 'images/talents/druid_balance.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Restoration': $spec2 = 'images/talents/druid_resto.gif';
                break;
            case 'Feral Combat': $spec2 = 'images/talents/druid_feral.gif';
                break;
            case 'Balance': $spec2 = 'images/talents/druid_balance.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Death Knight':
        $farbaNick = farbaNicku(171, 31, 54, $image);
        $avatar = 'images/class/death_knight_crest.png';
        switch ($talents1) {
            case 'Blood': $spec1 = 'images/talents/deathknight_blood.gif';
                break;
            case 'Frost': $spec1 = 'images/talents/deathknight_frost.gif';
                break;
            case 'Unholy': $spec1 = 'images/talents/deathknight_unholy.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Blood': $spec2 = 'images/talents/deathknight_blood.gif';
                break;
            case 'Frost': $spec2 = 'images/talents/deathknight_frost.gif';
                break;
            case 'Unholy': $spec2 = 'images/talents/deathknight_unholy.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Hunter':
        $farbaNick = farbaNicku(170, 211, 114, $image);
        $avatar = 'images/class/hunter_crest.png';
        $korekcia = 3;
        switch ($talents1) {
            case 'Beast Mastery': $spec1 = 'images/talents/hunter_bm.gif';
                break;
            case 'Marksmanship': $spec1 = 'images/talents/hunter_mm.gif';
                break;
            case 'Survival': $spec1 = 'images/talents/hunter_survi.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Beast Mastery': $spec2 = 'images/talents/hunter_bm.gif';
                break;
            case 'Marksmanship': $spec2 = 'images/talents/hunter_mm.gif';
                break;
            case 'Survival': $spec2 = 'images/talents/hunter_survi.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Mage':
        $farbaNick = farbaNicku(93, 204, 208, $image);
        $avatar = 'images/class/mage_crest.png';
        $korekcia = 2;
        switch ($talents1) {
            case 'Arcane': $spec1 = 'images/talents/mage_arc.gif';
                break;
            case 'Fire': $spec1 = 'images/talents/mage_fire.gif';
                break;
            case 'Frost': $spec1 = 'images/talents/mage_frost.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Arcane': $spec2 = 'images/talents/mage_arc.gif';
                break;
            case 'Fire': $spec2 = 'images/talents/mage_fire.gif';
                break;
            case 'Frost': $spec2 = 'images/talents/mage_frost.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Paladin':
        $farbaNick = farbaNicku(244, 140, 186, $image);
        $avatar = 'images/class/paladin_crest.png';
        $korekcia = 4;
        switch ($talents1) {
            case 'Holy': $spec1 = 'images/talents/paladin_holy.gif';
                break;
            case 'Protection': $spec1 = 'images/talents/paladin_prot.gif';
                break;
            case 'Retribution': $spec1 = 'images/talents/paladin_retri.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Holy': $spec2 = 'images/talents/paladin_holy.gif';
                break;
            case 'Protection': $spec2 = 'images/talents/paladin_prot.gif';
                break;
            case 'Retribution': $spec2 = 'images/talents/paladin_retri.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Priest':
        $farbaNick = farbaNicku(255, 255, 255, $image);
        $avatar = 'images/class/priest_crest.png';
        $korekcia = 2;
        switch ($talents1) {
            case 'Discipline': $spec1 = 'images/talents/priest_disco.gif';
                break;
            case 'Holy': $spec1 = 'images/talents/priest_holy.gif';
                break;
            case 'Shadow': $spec1 = 'images/talents/priest_shadow.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Discipline': $spec2 = 'images/talents/priest_disco.gif';
                break;
            case 'Holy': $spec2 = 'images/talents/priest_holy.gif';
                break;
            case 'Shadow': $spec2 = 'images/talents/priest_shadow.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Rogue':
        $farbaNick = farbaNicku(255, 244, 104, $image);
        $avatar = 'images/class/rogue_crest.png';
        $korekcia = 1;
        switch ($talents1) {
            case 'Assassination': $spec1 = 'images/talents/rogue_assa.gif';
                break;
            case 'Combat': $spec1 = 'images/talents/rogue_combat.gif';
                break;
            case 'Subtlety': $spec1 = 'images/talents/rogue_subtlety.gif';
                break;
            case 'Subletly': $spec1 = 'images/talents/rogue_subtlety.gif'; //Twinstar FAIL
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Assassination': $spec2 = 'images/talents/rogue_assa.gif';
                break;
            case 'Combat': $spec2 = 'images/talents/rogue_combat.gif';
                break;
            case 'Subtlety': $spec2 = 'images/talents/rogue_subtlety.gif';
                break;
            case 'Subletly': $spec2 = 'images/talents/rogue_subtlety.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Shaman':
        $farbaNick = farbaNicku(34, 89, 222, $image);
        $avatar = 'images/class/shaman_crest.png';
        switch ($talents1) {
            case 'Elemental': $spec1 = 'images/talents/shaman_ele.gif';
                break;
            case 'Enhancement': $spec1 = 'images/talents/shaman_enha.gif';
                break;
            case 'Restoration': $spec1 = 'images/talents/shaman_resto.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Elemental': $spec2 = 'images/talents/shaman_ele.gif';
                break;
            case 'Enhancement': $spec2 = 'images/talents/shaman_enha.gif';
                break;
            case 'Restoration': $spec2 = 'images/talents/shaman_resto.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Warlock':
        $farbaNick = farbaNicku(147, 130, 201, $image);
        $avatar = 'images/class/warlock_crest.png';
        $korekcia = 2;
        switch ($talents1) {
            case 'Affliction': $spec1 = 'images/talents/warlock_affi.gif';
                break;
            case 'Demonology': $spec1 = 'images/talents/warlock_demo.gif';
                break;
            case 'Destruction': $spec1 = 'images/talents/warlock_destro.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Affliction': $spec2 = 'images/talents/warlock_affi.gif';
                break;
            case 'Demonology': $spec2 = 'images/talents/warlock_demo.gif';
                break;
            case 'Destruction': $spec2 = 'images/talents/warlock_destro.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    case 'Warrior':
        $farbaNick = farbaNicku(198, 155, 109, $image);
        $avatar = 'images/class/warrior_crest.png';
        $korekcia = 1;
        switch ($talents1) {
            case 'Arms': $spec1 = 'images/talents/warrior_arms.gif';
                break;
            case 'Fury': $spec1 = 'images/talents/warrior_fury.gif';
                break;
            case 'Protection': $spec1 = 'images/talents/warrior_prot.gif';
                break;
            default: $spec1 = 'images/talents/blank.gif';
        }
        switch ($talents2) {
            case 'Arms': $spec2 = 'images/talents/warrior_arms.gif';
                break;
            case 'Fury': $spec2 = 'images/talents/warrior_fury.gif';
                break;
            case 'Protection': $spec2 = 'images/talents/warrior_prot.gif';
                break;
            default: $spec2 = 'images/talents/blank.gif';
        }
        break;
    default:
        $farbaNick = farbaNicku(255, 255, 255, $image);
        $avatar = 'images/class/!nothing.gif';
        $spec1 = 'images/talents/blank.gif';
        $spec2 = 'images/talents/blank.gif';
}

/* NAME+titul */
$PreNickSuf = $prefix . $name . $suffix;
if (($PreNickSuf * $font_size_default) < 450) {
    $font_size = $font_size_default;
}
for ($i = $font_size_default; (strlen($PreNickSuf) * $i) > 450; $i--) {
    $font_size = $i;
    $posunZhora--;
}

if ($prefix != null) {
    $zobrazeneMeno = "$prefix $name";
}
if ($suffix != null) {
    $zobrazeneMeno = "$name $suffix";
}
if ($suffix == null && $prefix == null) {
    $zobrazeneMeno = "$name";
}
//imagettftext ($image, float $size , float $angle , int $x , int $y , 		 int $color , string $fontfile , string $text )
imagettftext($image, $font_size, 0, 90, $posunZhora, $farbaNick, $fontNick, $zobrazeneMeno);


/* GUILDA */
$posunto = $posunZhora + $posunN - 4;
if ($guilda == null) {
    imagettftext($image, $font_size_text, 0, 90, $posunto, $farbaGuildy, $font, $textRealm);
} else {
    imagettftext($image, $font_size_text, 0, 90, $posunto, $farbaGuildy, $font, "<$guilda> $textRealm");
}

/* ACHIEVEMENTY */
if (!empty($textAchievy)) {
    $posunto += $posun;
    $rozmerXAch = imagesx($achpIcon);
    $rozmerYAch = imagesy($achpIcon);
    imagecopymerge($image, $achpIcon, 90, $posunto - 7, 0, 0, $rozmerXAch, $rozmerYAch, 100);
    imagettftext($image, $font_size_text, 0, 90 + $rozmerXAch + 3, $posunto + 5, $farbaAchievy, $font, $textAchievy);
} else {
    $posunto += $posun;
}

/* HONOR KILLS */
if (!empty($textHonorK)) {
    if (empty($textAchievy)) {
        $move_first_line = 90;
    } else {
        $move_first_line = 90 + strPixels($textAchievy) + $space * 3;
    }
    $rozmerXH = imagesx($honorIcon);
    $rozmerYH = imagesy($honorIcon);
    imagecopymerge($image, $honorIcon, $move_first_line, $posunto - 7, 0, 0, $rozmerXH, $rozmerYH, 100);
    imagettftext($image, $font_size_text, 0, $move_first_line + $rozmerXH + 3, $posunto + 5, $farbaHK, $font, $textHonorK);
}

/* LEVEL */
imagettftext($image, $font_size_lvl, 0, 377, 75, $farbaNick, $fontLevel, $textLvl);

/* STATY */
$posunto = 85 - $font_size_text;
$posuntoDoPrava = 0;
if (!empty($textHP) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90, $posunto, $farbaStats, $font, $textHP);
    $posuntoDoPrava += strPixels($textHP) + $space;
    $showMaxStats--;
}
if (!empty($textMana) && $showMaxStats > 0) {
    $a = imagettfbbox(0, 90, $font, $textMana);
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textMana);
    $posuntoDoPrava += strPixels($textMana) + $space;
    $showMaxStats--;
}
if (!empty($textSPH) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textSPH);
    $posuntoDoPrava += strPixels($textSPH) + $space;
    $showMaxStats--;
}
if (!empty($textAP) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textAP);
    $posuntoDoPrava += strPixels($textAP) + $space;
    $showMaxStats--;
}
if (!empty($textMRSC) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textMRSC);
    $posuntoDoPrava += strPixels($textMRSC) + $space;
    $showMaxStats--;
}
if (!empty($textDodge) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textDodge);
    $posuntoDoPrava += strPixels($textDodge) + $space;
    $showMaxStats--;
}
if (!empty($textParry) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textParry);
    $posuntoDoPrava += strPixels($textParry) + $space;
    $showMaxStats--;
}
if (!empty($textBlock) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textBlock);
    $posuntoDoPrava += strPixels($textBlock) + $space;
    $showMaxStats--;
}
if (!empty($textHaste) && $showMaxStats > 0) {
    imagettftext($image, $font_size_text, 0, 90 + $posuntoDoPrava, $posunto, $farbaStats, $font, $textHaste);
    $posuntoDoPrava += strPixels($textHaste) + $space;
    $showMaxStats--;
}
/* -------------- */


/* OBRAZKY */
if (empty($spec_show)) {
    $spec1 = 'images/talents/!blank.gif';
    $spec2 = 'images/talents/!blank.gif';
}

$spec1 = imagecreatefromstring(file_get_contents($spec1));
$spec2 = imagecreatefromstring(file_get_contents($spec2));

/* AVATAR z ARMORY */
if ($armory_show == 1) {
    switch ($level) {
        case ($level == 80):
            $avatar = "images/wow-80/" . $genderId . "-" . $raceId . "-" . $classId . ".gif";
            break;
        case ($level >= 70 && $level < 80):
            $avatar = "images/wow-70/" . $genderId . "-" . $raceId . "-" . $classId . ".gif";
            break;
        case ($level >= 60 && $level < 70):
            $avatar = "images/wow/" . $genderId . "-" . $raceId . "-" . $classId . ".gif";
            break;
        case ($level < 60):
            $avatar = "images/wow-default/" . $genderId . "-" . $raceId . "-" . $classId . ".gif";
            break;
    }
    $korekcia = 5;
    $korekciaH = 3;
}
/* * ***** */

$avatar = imagecreatefromstring(file_get_contents($avatar));
/* Zistenie rozmerov obrazkov */
$rozmerX = imagesx($avatar);
$rozmerY = imagesy($avatar);
$rozmerXS1 = imagesx($spec1);
$rozmerYS1 = imagesy($spec1);
$rozmerXS2 = imagesx($spec2);
$rozmerYS2 = imagesy($spec2);

//imagecopymerge(zaklad,vkladany, vpravo, dole,	0, 0, x, y,  transparentnost);
imagecopymerge($image, $avatar, 5 + $korekcia, 5 + $korekciaH, 0, 0, $rozmerX, $rozmerY, 100);
if ($TBC == FALSE) {
    imagecopymerge($image, $spec1, 2, 55, 0, 0, $rozmerXS1, $rozmerYS1, 100);
    imagecopymerge($image, $spec2, 60, 55, 0, 0, $rozmerXS2, $rozmerYS2, 100);
}

if (!isset(filter_input(INPUT_GET, 'cron'))) {
    header("Content-type: image/png");
    imagepng($image); //zobrazi v prehliadaci
}

/* SAVE FILE */
imagepng($image, "signatures/" . $name . "_" . $realm . ".png"); //ulozi na local
ImageDestroy($image);


