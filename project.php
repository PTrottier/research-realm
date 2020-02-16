<?php require_once("db.php"); ?>
<?php 
function project_section() {
if (isset($_GET['id']))
{
  $id = $_GET['id'];
  $conn = db_connect();
  $project = get_project($conn, $id);
  project($project['department'], $project['title'], $project['call_for_action'], $project['abstract'], $project['author'], $project['reviewer']);
  db_close($conn);
}
else if (isset($_GET['department']))
{
  $conn = db_connect();
  $result = get_projects_by_department($conn, $_GET['department']);
  if ($result->num_rows > 0) {
    while ($project = $result->fetch_assoc())
      display_project_list_item($project["id"], $project["department"], $project["title"], $project["call_for_action"]);
  }
  else {
    print "<p>No projects for " . $_GET['department'] . ".</p>";
  }
  db_close($conn);
}
else {
  print "else";
  $conn = db_connect();
  $result = get_projects($conn);
  if ($result->num_rows > 0)
    while ($project = $result->fetch_assoc())
      display_project_list_item($project["id"], $project["department"], $project["title"], $project["call_for_action"]);
  db_close($conn);
}
}
?>
    <?php function project($department, $title, $call_for_action, $abstract, $author, $reviewer) 
    {
    ?>
    <article>
      <h2><?php print $title ?></h2>
      <h3><?php print $department ?></h3>
      <p><?php print $call_for_action ?></p>
      <p><?php print $abstract ?></p>
      <p><?php print $author ?></p>
      <p><?php print $reviewer ?></p>
    </article>
    <?php
    }
    ?>

<?php function display_project_list_item($id, $department, $title, $call_for_action) 
{ 
?>

	<a href="index.php?id=<?php print $id ?>">
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
