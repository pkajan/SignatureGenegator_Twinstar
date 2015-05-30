<?php

if (filter_input(INPUT_GET, 'level',        FILTER_VALIDATE_INT)) {	$level        = filter_input(INPUT_GET, 'level',        FILTER_VALIDATE_INT);	} else { 	$level = 0;}
if (filter_input(INPUT_GET, 'frakcia',      FILTER_VALIDATE_INT)) {	$frakcia      = filter_input(INPUT_GET, 'frakcia',      FILTER_VALIDATE_INT);	} else { 	$frakcia = 0;}
if (filter_input(INPUT_GET, 'achievy',      FILTER_VALIDATE_INT)) {	$achievy      = filter_input(INPUT_GET, 'achievy',      FILTER_VALIDATE_INT);	} else { 	$achievy = 0;}
if (filter_input(INPUT_GET, 'achievyearn',  FILTER_VALIDATE_INT)) {	$achievyearn  = filter_input(INPUT_GET, 'achievyearn',  FILTER_VALIDATE_INT);	} else { 	$achievyearn = 0;}
if (filter_input(INPUT_GET, 'achievytotal', FILTER_VALIDATE_INT)) {	$achievytotal = filter_input(INPUT_GET, 'achievytotal', FILTER_VALIDATE_INT);	} else { 	$achievytotal = 0;}
if (filter_input(INPUT_GET, 'honork',       FILTER_VALIDATE_INT)) {	$honork       = filter_input(INPUT_GET, 'honork',       FILTER_VALIDATE_INT);	} else { 	$honork = 0;}
if (filter_input(INPUT_GET, 'genderid',     FILTER_VALIDATE_INT)) {	$genderId     = filter_input(INPUT_GET, 'genderid',     FILTER_VALIDATE_INT);	} else { 	$genderId = 0;}
if (filter_input(INPUT_GET, 'raceid',       FILTER_VALIDATE_INT)) {	$raceId       = filter_input(INPUT_GET, 'raceid',       FILTER_VALIDATE_INT);	} else { 	$raceId = 0;}
if (filter_input(INPUT_GET, 'classid',      FILTER_VALIDATE_INT)) {	$classId      = filter_input(INPUT_GET, 'classid',      FILTER_VALIDATE_INT);	} else { 	$classId = 0;}
if (filter_input(INPUT_GET, 'activeSpec',   FILTER_VALIDATE_INT)) {	$activeSpec   = filter_input(INPUT_GET, 'activeSpec',   FILTER_VALIDATE_INT);	} else { 	$activeSpec = 0;}
if (filter_input(INPUT_GET, 'armory_show',  FILTER_VALIDATE_INT)) {	$armory_show  = filter_input(INPUT_GET, 'armory_show',  FILTER_VALIDATE_INT);	} else { 	$armory_show = 0;}
if (filter_input(INPUT_GET, 'server_show',  FILTER_VALIDATE_INT)) {	$server_show  = filter_input(INPUT_GET, 'server_show',  FILTER_VALIDATE_INT);	} else { 	$server_show = 0;}
if (filter_input(INPUT_GET, 'guilda_show',  FILTER_VALIDATE_INT)) {	$guilda_show  = filter_input(INPUT_GET, 'guilda_show',  FILTER_VALIDATE_INT);	} else { 	$guilda_show = 0;}
if (filter_input(INPUT_GET, 'achievy_show', FILTER_VALIDATE_INT)) {	$achievy_show = filter_input(INPUT_GET, 'achievy_show', FILTER_VALIDATE_INT);	} else { 	$achievy_show = 0;}
if (filter_input(INPUT_GET, 'armory_show',  FILTER_VALIDATE_INT)) {	$armory_show  = filter_input(INPUT_GET, 'armory_show',  FILTER_VALIDATE_INT);	} else { 	$armory_show = 0;}
if (filter_input(INPUT_GET, 'hk_show',      FILTER_VALIDATE_INT)) {	$hk_show      = filter_input(INPUT_GET, 'hk_show',      FILTER_VALIDATE_INT);	} else { 	$hk_show = 0;}
if (filter_input(INPUT_GET, 'level_show',   FILTER_VALIDATE_INT)) {	$level_show   = filter_input(INPUT_GET, 'level_show',   FILTER_VALIDATE_INT);	} else { 	$level_show = 0;}
if (filter_input(INPUT_GET, 'spec_show',    FILTER_VALIDATE_INT)) {	$spec_show    = filter_input(INPUT_GET, 'spec_show',    FILTER_VALIDATE_INT);	} else { 	$spec_show = 0;}
if (filter_input(INPUT_GET, 'hp_show',      FILTER_VALIDATE_INT)) {	$hp_show      = filter_input(INPUT_GET, 'hp_show',      FILTER_VALIDATE_INT);	} else { 	$hp_show = 0;}
if (filter_input(INPUT_GET, 'mana_show',    FILTER_VALIDATE_INT)) {	$mana_show    = filter_input(INPUT_GET, 'mana_show',    FILTER_VALIDATE_INT);	} else { 	$mana_show = 0;}
if (filter_input(INPUT_GET, 'sph_show',     FILTER_VALIDATE_INT)) {	$sph_show     = filter_input(INPUT_GET, 'sph_show',     FILTER_VALIDATE_INT);	} else { 	$sph_show = 0;}
if (filter_input(INPUT_GET, 'ap_show',      FILTER_VALIDATE_INT)) {	$ap_show      = filter_input(INPUT_GET, 'ap_show',      FILTER_VALIDATE_INT);	} else { 	$ap_show = 0;}
if (filter_input(INPUT_GET, 'mrsc_show',    FILTER_VALIDATE_INT)) {	$mrsc_show    = filter_input(INPUT_GET, 'mrsc_show',    FILTER_VALIDATE_INT);	} else { 	$mrsc_show = 0;}
if (filter_input(INPUT_GET, 'dodge_show',   FILTER_VALIDATE_INT)) {	$dodge_show   = filter_input(INPUT_GET, 'dodge_show',   FILTER_VALIDATE_INT);	} else { 	$dodge_show = 0;}
if (filter_input(INPUT_GET, 'parry_show',   FILTER_VALIDATE_INT)) {	$parry_show   = filter_input(INPUT_GET, 'parry_show',   FILTER_VALIDATE_INT);	} else { 	$parry_show = 0;}
if (filter_input(INPUT_GET, 'block_show',   FILTER_VALIDATE_INT)) {	$block_show   = filter_input(INPUT_GET, 'block_show',   FILTER_VALIDATE_INT);	} else { 	$block_show = 0;}
if (filter_input(INPUT_GET, 'haste_show',   FILTER_VALIDATE_INT)) {	$haste_show   = filter_input(INPUT_GET, 'haste_show',   FILTER_VALIDATE_INT);	} else { 	$haste_show = 0;}
if (filter_input(INPUT_GET, 'hp',           FILTER_VALIDATE_INT)) {	$hp           = filter_input(INPUT_GET, 'hp',           FILTER_VALIDATE_INT);	} else { 	$hp = 0;}
if (filter_input(INPUT_GET, 'mana',         FILTER_VALIDATE_INT)) {	$mana         = filter_input(INPUT_GET, 'mana',         FILTER_VALIDATE_INT);	} else { 	$mana = 0;}
if (filter_input(INPUT_GET, 'sp',           FILTER_VALIDATE_INT)) {	$sp           = filter_input(INPUT_GET, 'sp',           FILTER_VALIDATE_INT);	} else { 	$sp = 0;}
if (filter_input(INPUT_GET, 'heal',         FILTER_VALIDATE_INT)) {	$heal         = filter_input(INPUT_GET, 'heal',         FILTER_VALIDATE_INT);	} else { 	$heal = 0;}
if (filter_input(INPUT_GET, 'ap',           FILTER_VALIDATE_INT)) {	$ap           = filter_input(INPUT_GET, 'ap',           FILTER_VALIDATE_INT);	} else { 	$ap = 0;}
if (filter_input(INPUT_GET, 'rap',          FILTER_VALIDATE_INT)) {	$rap          = filter_input(INPUT_GET, 'rap',          FILTER_VALIDATE_INT);	} else { 	$rap = 0;}
if (filter_input(INPUT_GET, 'mc',           FILTER_VALIDATE_FLOAT)) {	$mc           = filter_input(INPUT_GET, 'mc',           FILTER_VALIDATE_FLOAT);	} else { 	$mc = 0;}
if (filter_input(INPUT_GET, 'sc',           FILTER_VALIDATE_FLOAT)) {	$sc           = filter_input(INPUT_GET, 'sc',           FILTER_VALIDATE_FLOAT);	} else { 	$sc = 0;}
if (filter_input(INPUT_GET, 'rc',           FILTER_VALIDATE_FLOAT)) {	$rc           = filter_input(INPUT_GET, 'rc',           FILTER_VALIDATE_FLOAT);	} else { 	$rc = 0;}
if (filter_input(INPUT_GET, 'dodge',        FILTER_VALIDATE_FLOAT)) {	$dodge        = filter_input(INPUT_GET, 'dodge',        FILTER_VALIDATE_FLOAT);	} else { 	$dodge = 0;}
if (filter_input(INPUT_GET, 'parry',        FILTER_VALIDATE_FLOAT)) {	$parry        = filter_input(INPUT_GET, 'parry',        FILTER_VALIDATE_FLOAT);	} else { 	$parry = 0;}
if (filter_input(INPUT_GET, 'block',        FILTER_VALIDATE_FLOAT)) {	$block        = filter_input(INPUT_GET, 'block',        FILTER_VALIDATE_FLOAT);	} else { 	$block = 0;}
if (filter_input(INPUT_GET, 'haste',        FILTER_VALIDATE_FLOAT)) {	$haste        = filter_input(INPUT_GET, 'haste',        FILTER_VALIDATE_FLOAT);	} else { 	$haste = 0;}


if (sizeof(filter_input(INPUT_GET, 'prefix',    FILTER_SANITIZE_STRING)) != 0) { $prefix    = filter_input(INPUT_GET, 'prefix',     FILTER_SANITIZE_STRING);}
if (sizeof(filter_input(INPUT_GET, 'suffix',    FILTER_SANITIZE_STRING)) != 0) { $suffix    = filter_input(INPUT_GET, 'suffix',     FILTER_SANITIZE_STRING);}
if (sizeof(filter_input(INPUT_GET, 'guilda',    FILTER_SANITIZE_STRING)) != 0) { $guilda    = filter_input(INPUT_GET, 'guilda',     FILTER_SANITIZE_STRING);}
if (sizeof(filter_input(INPUT_GET, 'talents1',  FILTER_SANITIZE_STRING)) != 0) { $talents1  = filter_input(INPUT_GET, 'talents1',   FILTER_SANITIZE_STRING);}
if (sizeof(filter_input(INPUT_GET, 'talents2',  FILTER_SANITIZE_STRING)) != 0) { $talents2  = filter_input(INPUT_GET, 'talents2',   FILTER_SANITIZE_STRING);}
if (sizeof(filter_input(INPUT_GET, 'class',     FILTER_SANITIZE_STRING)) != 0) { $class     = filter_input(INPUT_GET, 'class',      FILTER_SANITIZE_STRING);}
if (sizeof(filter_input(INPUT_GET, 'name',      FILTER_SANITIZE_STRING)) != 0) { $name      = filter_input(INPUT_GET, 'name',       FILTER_SANITIZE_STRING);}



