<?php require_once("translations.php"); ?>
<?php 
$lang = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
$acceptLang = ["en", "fr"]; 
$lang = in_array($lang, $acceptLang) ? $lang : "en";
if (isset($_GET["language"])) {
    $GLOBALS["language"] = $_GET["language"];
} else {
    $GLOBALS["language"] = $lang;
}
?>

<?php
// Default is no page name
function head($page = "")
{
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
            if (!empty($page)) {
                print $page . " - ";
            }
        ?>
        <?php 
            translate($GLOBALS["language"], "research_realm");
        ?>
    </title>
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

function nav_bar()
{
$language = isset($_GET["language"]) ? $_GET["language"] : "";
$department = isset($_GET["department"]) ? $_GET["department"] : "";
?>

<header>
    <nav class="flex flex-column flex-row-l items-center justify-between-l">
        <a class="dib mw5" href="<?php echo $_SERVER['PHP_SELF']; ?>">
            <img id="logo" class="dib" alt="<?php translate($GLOBALS["language"], "research_realm"); ?>" src="logo_text.svg" />
        </a>
        <form class="w-100 w-auto-l" id="filters" method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="flex flex-column flex-row-l items-center-l">
                <label class="mr1-l" for="language"><?php translate($GLOBALS["language"], "language"); ?></label>
                <select id="language" class="mb2 mb0-l mr3-l" name="language">
                    <option value="en" <?php select($GLOBALS["language"], "en") ?>>English</option>
                    <option value="fr" <?php select($GLOBALS["language"], "fr") ?>>Français</option>
                </select>
                <label class="mr1-l" for="department"><?php translate($GLOBALS["language"], "department"); ?></label>
                <select id="department" name="department">
                    <option value="cosc" <?php select($department, "cosc") ?>>Computer Science</option>
                    <option value="kin" <?php select($department, "kin") ?>>Kinesiology</option>
                    <option value="psych" <?php select($department, "psych") ?>>Psychology</option>
                </select>
                <input id="btn-reset" type="reset" value="<?php translate($GLOBALS["language"], "reset"); ?>" />
                <input id="btn-submit" type="submit" value="<?php translate($GLOBALS["language"], "submit"); ?>" />
            </div>
        </form>
    </nav>
</header>

<?php
}
?>
