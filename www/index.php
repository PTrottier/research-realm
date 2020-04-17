<?php require_once("header.php"); ?>
<?php require_once("project.php"); ?>
<!DOCTYPE html>
<html lang="<?php print $GLOBALS["language"] ?>">
    <?php head() ?>
    <body class="mh2">
        <div class="app">
        <?php nav_bar() ?>
        <section id="projects">
            <?php display_projects($GLOBALS["language"], $GLOBALS["department"], false); ?>
        </section>
        </div>
        <script src="filters.js"></script>
    </body>
</html>
