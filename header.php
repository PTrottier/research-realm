<?php
function head()
{
?>
<head>
  <meta charset="utf-8" />
  <title>Research Realm</title>
  <link rel="shortcut icon" href="logo.png" />
</head>
<?php
}
?>

<?php
function select($department, $value)
{
  if ($department === $value)
    print 'selected = "selected"';
}

function nav_bar()
{
$department = isset($_GET["department"]) ? $_GET["department"] : "";
?>

<header>
      <nav>
        <a href="/project">
          <img alt="Research Realm" src="logo.png" />
        </a>
        <div id="filter">
          <form method="GET" action="index.php">
            <label for="department">Department/Département</label>
            <select id="department" name="department">
              <option value="cosc" <?php select($department, "cosc") ?>>Computer Science / Sciences Informatiques</option>
              <option value="kin" <?php select($department, "kin") ?>>Kinesiology / Kinésiologie</option>
              <option value="psych" <?php select($department, "psych") ?>>Psychology / Psychologie</option>
            </select>
            <input type="reset" value="Reset" />
            <input type="submit" value="Submit" />
          </form>
        </div>
      </nav>
</header>

<?php
}
?>
