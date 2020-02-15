<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
  <?php head() ?>
  <body>
    <?php nav_bar() ?>
    <?php project("Department", "Title", "Call for Action", "Abstract", "Author", "Reviewer") ?>
    <?php function project($department, $title, $call_for_action, $abstract, $author, $reviewer) 
    {
    ?>
    <article>
      <h1><?php print $title ?></h1>
      <h2><?php print $department ?></h2>
      <p><?php print $call_for_action ?></p>
      <p><?php print $abstract ?></p>
      <p><?php print $author ?></p>
      <p><?php print $reviewer ?></p>
    </article>
    <?php
    }
    ?>
  </body>
</html>
