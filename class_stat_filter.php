<?php

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