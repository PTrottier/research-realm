<?php include 'header.php' ?>
<!DOCTYPE html>
<html lang="en">
  <?php head() ?>
  <body>
      <?php nav_bar() ?>
      <section id="projects">
      <?php
        $title = "Title";
        $department = "Department";
        $call_for_action = "Call for Action";
        for ($i = 0; $i < 4; $i++)
        {
            display_project_list_item($department . $i, $title . $i, $call_for_action . $i);
            print "<hr />\n";
        }
        display_project_list_item($department . 5, $title . 5, $call_for_action . 5);
      ?>
      <?php function display_project_list_item($department, $title, $call_for_action) 
      { 
      ?>

        <a href="project.php">
          <article>
            <h2><?php print $title ?></h2>
            <h3><?php print $department ?></h3>
            <p><?php print $call_for_action ?></p>
          </article>
        </a>

      <?php 
      } 
      ?>

      </section>
  </body>
</html>
