<?php
include 'functions.php';
include 'allowed_realms.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="keywords" content="siganture generator wow" />
        <meta name="author" content="Peter Kajan alias Revenge" />
        <meta name="description" content="Signature generator" />
        <title>TwinStar - Signature generator</title>
        <link rel="stylesheet" href="styles.css" type="text/css" media="screen" />
        <script src="scripts/script.js"></script>
    </head>

    <?php
    $chBT = 'onchange="InputColorAndCheck(this, true); " ' . 'type="checkbox"';
    ?>
    <body onload="Color()">

        <div id="hlavicka">
            <span id="temp">If you find any bugs please send me a <a href="http://forum.twinstar.cz/private.php?do=newpm&amp;u=10520" onclick="return !window.open(this.href);">PM</a>.</span><br />
            <a href="http://twinstar.cz/" onclick="return !window.open(this.href);">TwinStar.cz</a> |
            <a href="http://forum.twinstar.cz/showthread.php/50775-Armory-Signature-generator?p=450160#post450160" onclick="return !window.open(this.href);">If you like it +1 here!</a>
        </div>
        <div id="zadavanie">
            <form action="index.php" method="post" enctype="multipart/form-data" name="form">
                <div id="zada">
                    <input id="textove_pole" type="text" name="postava" value="<?= getCharName(); ?>" onfocus="if (this.value === this.defaultValue)
                                this.value = '';" required />
                    <select id="realm" name="realm">
                        <?php
                        foreach ($allowed_realms as $key => $value) {
                            echo allowed_realms($value, $key);
                        }
                        ?>
                    </select>
                    <input type="submit" name="submit" class="button" /><br /><br />
                    <div id="skrtatka">
                        <input id="<?= $i = 1; ?>" onchange="InputColorAndCheck(this)" type="checkbox" name="armory_show" value="1" checked="checked"/><span id="span<?= $i++; ?>"> Use Armory picture</span> |
                        <input id="<?= $i; ?>" onchange="InputColorAndCheck(this)" type="checkbox" name="server_show" value="1" checked="checked"/><span id="span<?= $i++; ?>"> Show Server name</span> |
                        <input id="<?= $i; ?>" onchange="InputColorAndCheck(this)" type="checkbox" name="guilda_show" value="1" checked="checked"/><span id="span<?= $i++; ?>"> Show Guild name</span> |
                        <input id="<?= $i; ?>" onchange="InputColorAndCheck(this)" type="checkbox" name="achievy_show" value="1" checked="checked"/><span id="span<?= $i++; ?>"> Show Achievements</span> |
                        <input id="<?= $i; ?>" onchange="InputColorAndCheck(this)" type="checkbox" name="hk_show" value="1" checked="checked"/><span id="span<?= $i++; ?>"> Show HK</span> |
                        <input id="<?= $i; ?>" onchange="InputColorAndCheck(this)" type="checkbox" name="level_show" value="1" checked="checked"/><span id="span<?= $i++; ?>"> Show Level</span> |
                        <input id="<?= $i; ?>" onchange="InputColorAndCheck(this)" type="checkbox" name="spec_show" value="1" checked="checked"/><span id="span<?= $i++; ?>"> Show Talent specs</span><br />
                        <!-- Staty -->
                        <span>Only 4 options will be shown</span><br />
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="hp_show"     value="1"<?= checked("hp_show"); ?>/><span id="span<?= $i++; ?>"> Health</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="mana_show"   value="1"<?= checked("mana_show"); ?>/><span id="span<?= $i++; ?>"> Mana</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="sph_show"    value="1"<?= checked("sph_show"); ?>/><span id="span<?= $i++; ?>"> Spell Power/Healing</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="ap_show"     value="1"<?= checked("ap_show"); ?>/><span id="span<?= $i++; ?>"> Attack Power</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="mrsc_show"   value="1"<?= checked("mrsc_show"); ?>/><span id="span<?= $i++; ?>"> Critical</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="dodge_show"  value="1"<?= checked("dodge_show"); ?>/><span id="span<?= $i++; ?>"> Dodge</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="parry_show"  value="1"<?= checked("parry_show"); ?>/><span id="span<?= $i++; ?>"> Parry</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="block_show"  value="1"<?= checked("block_show"); ?>/><span id="span<?= $i++; ?>"> Block</span> |
                        <input id="<?= $i; ?>"  <?= $chBT; ?> name="haste_show"  value="1"<?= checked("haste_show"); ?>/><span id="span<?= $i++; ?>"> Haste</span>
                    </div>
                </div>
            </form>
        </div>



        <?php include_once 'gathering.php'; ?>

        <div class="reklama">
            <!-- REKLAMA, nemusi byt validne -->
            <endora>
            <!-- REKLAMA, koniec -->
        </div>
        <div id="changelog">
            <table id="spoiler_text" style="display: none;">
                <?php include_once 'changelog.html'; ?>
            </table>
        </div>
        <div id="changelog_button">
            <h3 id="show_id" onclick="showButton();">Changelog <small>(show)</small></h3>
            <h3 id="spoiler_id" onclick="hideButton();" style="display: none;">Changelog <small>(hide)</small></h3>
        </div>
    </body>
</html>
