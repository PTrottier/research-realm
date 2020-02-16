<?php
function head()
{
?>
<head>
  <meta charset="utf-8" />
  <title>Research Realm</title>
  <link rel="shortcut icon" href="logo.png" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/tachyons@^4.11.1/css/tachyons.min.css" />
  <link href="https://fonts.googleapis.com/css?family=B612:400,400i,700,700i&display=swap" rel="stylesheet"> 
  <style>
    body {
      font-family: 'B612', sans-serif;
    }
  </style>
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
      <nav class="db">
        <a class="dib mt2" href="/project">
          <img class="dib" alt="Research Realm" src="logo.png" />
        </a>
        <div id="filter" class="dib">
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
