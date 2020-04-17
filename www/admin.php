<?php require_once("header.php"); ?>
<?php require_once("project.php"); ?>
<?php require_once("translations.php"); ?>

<?php
if (true) {
    show_administration_login(false);
} else {
    show_administration_mode("Patrick");
}
?>

<?php
function show_administration_login($is_invalid) 
{
?>
<!DOCTYPE html>
<html lang="<?php print $GLOBALS["language"]; ?>">
    <?php head(translate_string($GLOBALS["language"], "administration")); ?>
    <body class="ma2">
        <div class="flex flex-column flex-row-l items-center-ns justify-between-ns ma0 pa2 bg-light-red black tc ba b--dashed bw1">
            <h1 class="f3 dib mv2 ma0-l"><?php translate($GLOBALS["language"], "administration"); ?></h1>
            <form class="w-100 w-auto-l" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="flex flex-column flex-row-l items-center-l">
                    <label class="mr1-l dn" for="username"><?php translate($GLOBALS["language"], "username"); ?></label>
                    <input class="mr2-l" id="username" type="text" placeholder="<?php translate($GLOBALS["language"], "username"); ?>" required="required" />
                    <label class="mr1-l dn" for="password"><?php translate($GLOBALS["language"], "password"); ?></label>
                    <input class="mt2 mt0-l mr2-l" id="password" type="password" placeholder="<?php translate($GLOBALS["language"], "password"); ?>" required="required" />
                    <input class="mt3 mt0-l" type="submit" value="<?php translate($GLOBALS["language"], "signin"); ?>" />
                </div>
	        </form>
            <?php
            if ($is_invalid) {
            ?>
                <p class="dib"><?php translate($GLOBALS["language"], "invalid_credentials"); ?></p>
            <?php
            }
            ?>
        </div>
        <?php nav_bar(); ?>
        <section id="projects">
            <?php //project_section(); ?>
        </section>
        <script src="filters.js"></script>
    </body>
</html>
<?php
}
?>

<?php
function show_administration_mode($username) 
{
?>
<!DOCTYPE html>
<html lang="<?php print $GLOBALS["language"]; ?>">
    <?php head(translate($GLOBALS["language"], "administration")); ?>
    <body class="ma2">
        <div class="flex flex-column flex-row-l items-center-ns justify-between-ns ma0 pa2 bg-light-red black tc ba b--dashed bw1">
            <h1 class="f3 dib mv2 ma0-l"><?php translate($GLOBALS["language"], "administration"); ?></h1>
            <form class="w-100 w-auto-l" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="flex flex-column flex-row-l items-center-l">
                    <span class="mr3-l"><?php print $username ?></span>
                    <input class="mt3 mt0-l" type="submit" value="<?php translate($GLOBALS["language"], "signout"); ?>" />
                </div>
	        </form>
        </div>
        <?php nav_bar() ?>
        <section id="projects">
            <?php //project_section(); ?>
        </section>
        <script src="filters.js"></script>
    </body>
</html>
<?php
}
?>