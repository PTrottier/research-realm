<?php
function head()
{
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Research Realm</title>
  <link rel="shortcut icon" href="logo.png" />
  <link rel="stylesheet" type="text/css" href="https://unpkg.com/tachyons@^4.11.1/css/tachyons.min.css" />
  <link href="https://fonts.googleapis.com/css?family=B612:400,400i,700,700i&display=swap" rel="stylesheet"> 
  <style>
    body {
      font-family: 'B612', sans-serif;
    }

    #logo {
        width: 50%;
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
        <a class="dib mt2" href="/">
          <img id="logo" class="dib" alt="Research Realm" src="logo_text.svg" />
        </a>
        <div id="filter" class="dib">
          <form method="GET" action="index.php">
            <label for="language">Language/Langue</label>
            <select id="language" name="language">
                <option value="en">English</option>
                <option value="fr">Français</option>
            </select>
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
