<?php 
if (filter_var($_GET['level'],        FILTER_VALIDATE_INT)) {	$level        = filter_var($_GET['level'],        FILTER_VALIDATE_INT);	} else { 	$level = 0;}
if (filter_var($_GET['frakcia'],      FILTER_VALIDATE_INT)) {	$frakcia      = filter_var($_GET['frakcia'],      FILTER_VALIDATE_INT);	} else { 	$frakcia = 0;}
if (filter_var($_GET['achievy'],      FILTER_VALIDATE_INT)) {	$achievy      = filter_var($_GET['achievy'],      FILTER_VALIDATE_INT);	} else { 	$achievy = 0;}
if (filter_var($_GET['achievyearn'],  FILTER_VALIDATE_INT)) {	$achievyearn  = filter_var($_GET['achievyearn'], FILTER_VALIDATE_INT); } else { 	$achievyearn = 0;}
if (filter_var($_GET['achievytotal'], FILTER_VALIDATE_INT)) {	$achievytotal = filter_var($_GET['achievytotal'], FILTER_VALIDATE_INT);	} else { 	$achievytotal = 0;}
if (filter_var($_GET['honork'],       FILTER_VALIDATE_INT)) {	$honork       = filter_var($_GET['honork'],       FILTER_VALIDATE_INT);	} else { 	$honork = 0;}
if (filter_var($_GET['genderid'],     FILTER_VALIDATE_INT)) {	$genderId     = filter_var($_GET['genderid'],     FILTER_VALIDATE_INT);	} else { 	$genderId = 0;}
if (filter_var($_GET['raceid'],       FILTER_VALIDATE_INT)) {	$raceId       = filter_var($_GET['raceid'],       FILTER_VALIDATE_INT);	} else { 	$raceId = 0;}
if (filter_var($_GET['classid'],      FILTER_VALIDATE_INT)) {	$classId      = filter_var($_GET['classid'],      FILTER_VALIDATE_INT);	} else { 	$classId = 0;}
if (filter_var($_GET['activeSpec'],   FILTER_VALIDATE_INT)) {	$activeSpec   = filter_var($_GET['activeSpec'],   FILTER_VALIDATE_INT);	} else { 	$activeSpec = 0;}
if (filter_var($_GET['armory_show'],  FILTER_VALIDATE_INT)) {	$armory_show  = filter_var($_GET['armory_show'],  FILTER_VALIDATE_INT);	} else { 	$armory_show = 0;}
if (filter_var($_GET['server_show'],  FILTER_VALIDATE_INT)) {	$server_show  = filter_var($_GET['server_show'],  FILTER_VALIDATE_INT);	} else { 	$server_show = 0;}
if (filter_var($_GET['guilda_show'],  FILTER_VALIDATE_INT)) {	$guilda_show  = filter_var($_GET['guilda_show'],  FILTER_VALIDATE_INT);	} else { 	$guilda_show = 0;}
if (filter_var($_GET['achievy_show'], FILTER_VALIDATE_INT)) {	$achievy_show = filter_var($_GET['achievy_show'], FILTER_VALIDATE_INT);	} else { 	$achievy_show = 0;}
if (filter_var($_GET['armory_show'],  FILTER_VALIDATE_INT)) {	$armory_show  = filter_var($_GET['armory_show'],  FILTER_VALIDATE_INT);	} else { 	$armory_show = 0;}
if (filter_var($_GET['hk_show'],      FILTER_VALIDATE_INT)) {	$hk_show      = filter_var($_GET['hk_show'],      FILTER_VALIDATE_INT);	} else { 	$hk_show = 0;}
if (filter_var($_GET['level_show'],   FILTER_VALIDATE_INT)) {	$level_show   = filter_var($_GET['level_show'],   FILTER_VALIDATE_INT);	} else { 	$level_show = 0;}
if (filter_var($_GET['spec_show'],    FILTER_VALIDATE_INT)) {	$spec_show    = filter_var($_GET['spec_show'],    FILTER_VALIDATE_INT);	} else { 	$spec_show = 0;}
if (filter_var($_GET['hp_show'],      FILTER_VALIDATE_INT)) {	$hp_show      = filter_var($_GET['hp_show'],      FILTER_VALIDATE_INT);	} else { 	$hp_show = 0;}
if (filter_var($_GET['mana_show'],    FILTER_VALIDATE_INT)) {	$mana_show    = filter_var($_GET['mana_show'],    FILTER_VALIDATE_INT);	} else { 	$mana_show = 0;}
if (filter_var($_GET['sph_show'],     FILTER_VALIDATE_INT)) {	$sph_show     = filter_var($_GET['sph_show'],     FILTER_VALIDATE_INT);	} else { 	$sph_show = 0;}
if (filter_var($_GET['ap_show'],      FILTER_VALIDATE_INT)) {	$ap_show      = filter_var($_GET['ap_show'],      FILTER_VALIDATE_INT);	} else { 	$ap_show = 0;}
if (filter_var($_GET['mrsc_show'],    FILTER_VALIDATE_INT)) {	$mrsc_show    = filter_var($_GET['mrsc_show'],    FILTER_VALIDATE_INT);	} else { 	$mrsc_show = 0;}
if (filter_var($_GET['dodge_show'],   FILTER_VALIDATE_INT)) {	$dodge_show   = filter_var($_GET['dodge_show'],   FILTER_VALIDATE_INT);	} else { 	$dodge_show = 0;}
if (filter_var($_GET['parry_show'],   FILTER_VALIDATE_INT)) {	$parry_show   = filter_var($_GET['parry_show'],   FILTER_VALIDATE_INT);	} else { 	$parry_show = 0;}
if (filter_var($_GET['block_show'],   FILTER_VALIDATE_INT)) {	$block_show   = filter_var($_GET['block_show'],   FILTER_VALIDATE_INT);	} else { 	$block_show = 0;}
if (filter_var($_GET['haste_show'],   FILTER_VALIDATE_INT)) {	$haste_show   = filter_var($_GET['haste_show'],   FILTER_VALIDATE_INT);	} else { 	$haste_show = 0;}
if (filter_var($_GET['hp'],           FILTER_VALIDATE_INT)) {	$hp           = filter_var($_GET['hp'],           FILTER_VALIDATE_INT);	} else { 	$hp = 0;}
if (filter_var($_GET['mana'],         FILTER_VALIDATE_INT)) {	$mana         = filter_var($_GET['mana'],         FILTER_VALIDATE_INT);	} else { 	$mana = 0;}
if (filter_var($_GET['sp'],           FILTER_VALIDATE_INT)) {	$sp           = filter_var($_GET['sp'],           FILTER_VALIDATE_INT);	} else { 	$sp = 0;}
if (filter_var($_GET['heal'],         FILTER_VALIDATE_INT)) {	$heal         = filter_var($_GET['heal'],         FILTER_VALIDATE_INT);	} else { 	$heal = 0;}
if (filter_var($_GET['ap'],           FILTER_VALIDATE_INT)) {	$ap           = filter_var($_GET['ap'],           FILTER_VALIDATE_INT);	} else { 	$ap = 0;}
if (filter_var($_GET['rap'],          FILTER_VALIDATE_INT)) {	$rap          = filter_var($_GET['rap'],          FILTER_VALIDATE_INT);	} else { 	$rap = 0;}
if (filter_var($_GET['mc'],           FILTER_VALIDATE_FLOAT)) {	$mc           = filter_var($_GET['mc'],           FILTER_VALIDATE_FLOAT);	} else { 	$mc = 0;}
if (filter_var($_GET['sc'],           FILTER_VALIDATE_FLOAT)) {	$sc           = filter_var($_GET['sc'],           FILTER_VALIDATE_FLOAT);	} else { 	$sc = 0;}
if (filter_var($_GET['rc'],           FILTER_VALIDATE_FLOAT)) {	$rc           = filter_var($_GET['rc'],           FILTER_VALIDATE_FLOAT);	} else { 	$rc = 0;}
if (filter_var($_GET['dodge'],        FILTER_VALIDATE_FLOAT)) {	$dodge        = filter_var($_GET['dodge'],        FILTER_VALIDATE_FLOAT);	} else { 	$dodge = 0;}
if (filter_var($_GET['parry'],        FILTER_VALIDATE_FLOAT)) {	$parry        = filter_var($_GET['parry'],        FILTER_VALIDATE_FLOAT);	} else { 	$parry = 0;}
if (filter_var($_GET['block'],        FILTER_VALIDATE_FLOAT)) {	$block        = filter_var($_GET['block'],        FILTER_VALIDATE_FLOAT);	} else { 	$block = 0;}
if (filter_var($_GET['haste'],        FILTER_VALIDATE_FLOAT)) {	$haste        = filter_var($_GET['haste'],        FILTER_VALIDATE_FLOAT);	} else { 	$haste = 0;}

if (sizeof(filter_var($_GET['realm'],    FILTER_SANITIZE_STRING)) != 0) { $realm    = filter_var($_GET['realm'],     FILTER_SANITIZE_STRING);}
if (sizeof(filter_var($_GET['prefix'],    FILTER_SANITIZE_STRING)) != 0) { $prefix    = filter_var($_GET['prefix'],     FILTER_SANITIZE_STRING);}
if (sizeof(filter_var($_GET['suffix'],    FILTER_SANITIZE_STRING)) != 0) { $suffix    = filter_var($_GET['suffix'],     FILTER_SANITIZE_STRING);}
if (sizeof(filter_var($_GET['guilda'],    FILTER_SANITIZE_STRING)) != 0) { $guilda    = filter_var($_GET['guilda'],     FILTER_SANITIZE_STRING);}
if (sizeof(filter_var($_GET['talents1'],  FILTER_SANITIZE_STRING)) != 0) { $talents1  = filter_var($_GET['talents1'],   FILTER_SANITIZE_STRING);}
if (sizeof(filter_var($_GET['talents2'],  FILTER_SANITIZE_STRING)) != 0) { $talents2  = filter_var($_GET['talents2'],   FILTER_SANITIZE_STRING);}
if (sizeof(filter_var($_GET['class'],     FILTER_SANITIZE_STRING)) != 0) { $class     = filter_var($_GET['class'],      FILTER_SANITIZE_STRING);}
if (sizeof(filter_var($_GET['name'],      FILTER_SANITIZE_STRING)) != 0) { $name      = filter_var($_GET['name'],       FILTER_SANITIZE_STRING);}



