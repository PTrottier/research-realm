<?php 
function project_section() {
if (isset($_GET['id']))
{
    project("Department", "Title", "Call for Action", "Abstract", "Author", "Reviewer");
}
else {
    display_projects(5);
}
}
?>
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

<?php function display_project_list_item($department, $title, $call_for_action) 
{ 
?>

        <a href="index.php?id=5">
          <article>
            <h2><?php print $title ?></h2>
            <h3><?php print $department ?></h3>
            <p><?php print $call_for_action ?></p>
          </article>
        </a>

<?php 
} 
?>

<?php function display_projects($count) 
{
$title = "Title";
$department = "Department";
$call_for_action = "Call for Action";
for ($i = 0; $i < $count - 1; $i++)
{
    display_project_list_item($department . $i, $title . $i, $call_for_action . $i);
    print "<hr />\n";
}
display_project_list_item($department . ($count - 1), $title . ($count - 1), $call_for_action . ($count - 1));
}
?>
