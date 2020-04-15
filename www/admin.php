<?php require_once("header.php"); ?>
<?php require_once("project.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <?php head() ?>
    <body class="ma2">
        <div class="flex flex-column flex-row-l items-center-ns justify-between-ns ma0 pa2 bg-light-red black tc ba b--dashed bw1">
            <p class="dib ma0">Administration</p>
            <a class="w-100 w-auto-l mt2 mt0-l link black pa2 ba bw1" href="#">Sign out</a>
        </div>
        <?php nav_bar() ?>
        <section id="projects">
            <?php //project_section(); ?>
        </section>
        <script src="filters.js"></script>
    </body>
</html>
