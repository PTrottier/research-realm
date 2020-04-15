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
  </style>
</head>
<?php
}
?>

<?php
function select($current, $value)
{
  if ($current === $value)
    print 'selected = "selected"';
}

function nav_bar($is_admin)
{
$language = isset($_GET["language"]) ? $_GET["language"] : "";
$department = isset($_GET["department"]) ? $_GET["department"] : "";
?>

<header>
<?php
    if ($is_admin) {
?>
        <div class="flex flex-column flex-row-l items-center-ns justify-between-ns ma0 pa2 bg-light-red black tc ba b--dashed bw1">
            <p class="dib ma0">Administration</p>
            <a class="w-100 w-auto-l mt2 mt0-l link black pa2 ba bw1" href="#">Sign out</a>
        </div>
<?php
    }
?>
    <nav class="flex flex-column flex-row-l items-center justify-between-l">
        <a class="dib mw5" href="<?php echo $_SERVER['PHP_SELF']; ?>">
            <img id="logo" class="dib" alt="Research Realm" src="logo_text.svg" />
        </a>
        <form class="w-100 w-auto-l" id="filters" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="flex flex-column flex-row-l items-center-l">
                <label class="mr1-l" for="language">Language</label>
                <select id="language" class="mb2 mb0-l mr3-l" name="language">
                    <option value="en" <?php select($language, "en") ?>>English</option>
                    <option value="fr" <?php select($language, "fr") ?>>Français</option>
                </select>
                <label class="mr1-l" for="department">Department</label>
                <select id="department" name="department">
                    <option value="cosc" <?php select($department, "cosc") ?>>Computer Science</option>
                    <option value="kin" <?php select($department, "kin") ?>>Kinesiology</option>
                    <option value="psych" <?php select($department, "psych") ?>>Psychology</option>
                </select>
                <input id="btn-reset" type="reset" value="Reset" />
                <input id="btn-submit" type="submit" value="Submit" />
            </div>
        </form>
    </nav>
</header>

<?php
}
?>
