<?php require_once("header.php"); ?>
<?php require_once("project.php"); ?>
<?php require_once("translations.php"); ?>

<?php

// Handle new project
if (isset($_POST["add-project"])) {
    // Get project information
    $language = $_POST["language"];
    $title = $_POST["title"];
    $researcher = $_POST["title"];
    $department = $_POST["department"];
    $call_to_action = $_POST["call_to_action"];

    add_project($language, $title, $researcher, $department, $call_to_action);
}

// Handle delete
if (isset($_POST["delete-project"])) {
    // Get project identifier
    $id = $_POST["project"];

    delete_project($id);
}

// Handle sign out
if (isset($_POST["signout"])) {
    session_start();
    $_SESSION = array();
    session_destroy();
    // Redirect to signout
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

handle_authentication();

function handle_authentication() {
    session_start();
    // Determine whether the credentials have already been submitted
    if (!isset($_SESSION["username"]) 
        || !isset($_SESSION["password"])
        || !is_valid_administrator($_SESSION["username"], $_SESSION["password"])) {

        // Determine whether the credentials were submitted
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Determine whether the credentials were valid
            if (is_valid_administrator($username, $password)) {
                $_SESSION = array();
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                // Refresh page to use Session
                header("Location: " . $_SERVER['HTTP_REFERER']);
            } else {
                show_administration_login(true);
            }
        } else {
            show_administration_login(false);
        }
    } else {
        show_administration_mode();
    }
}

function is_valid_administrator($username, $password) {
    // The user must prove that it is valid administrator, therefore by default it is invalid
    $is_valid = false;
    // Get configuration file for adminitration information
    $configuration = parse_ini_file("../realm.ini", true)["administration"];

    if ($username === $configuration["username"]
        && password_verify($password, $configuration["password"])) {
        $is_valid = true;
    }

    return $is_valid;
}

?>

<?php
function show_administration_login($is_invalid) 
{
?>
<!DOCTYPE html>
<html lang="<?php print $GLOBALS["language"]; ?>">
    <?php head(translate_string($GLOBALS["language"], "administration")); ?>
    <body class="mh2">
        <div class="app">
            <div class="flex flex-column flex-row-l items-center-ns justify-between-ns mt2 pa2 bg-light-red black tc ba b--dashed bw1">
                <h1 class="f3 dib mv2 ma0-l"><?php translate($GLOBALS["language"], "administration"); ?></h1>
                <form class="w-100 w-auto-l" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="flex flex-column flex-row-l items-center-l">
                        <input class="mr2-l" name="username" type="text" placeholder="<?php translate($GLOBALS["language"], "username"); ?>" required="required" />
                        <input class="mt2 mt0-l mr2-l" name="password" type="password" placeholder="<?php translate($GLOBALS["language"], "password"); ?>" required="required" />
                        <input class="mt3 mt0-l" type="submit" value="<?php translate($GLOBALS["language"], "signin"); ?>" />
                    </div>
	            </form>
                <?php
                if ($is_invalid) {
                ?>
                    <p class="dib mb1 mt3 ma0-l"><?php translate($GLOBALS["language"], "invalid_credentials"); ?></p>
                <?php
                }
                ?>
            </div>
            <?php nav_bar(); ?>
            <section id="projects">
                <?php display_projects($GLOBALS["language"], $GLOBALS["department"], false); ?>
            </section>
        </div>
        <script src="filters.js"></script>
    </body>
</html>
<?php
}
?>

<?php
function show_administration_mode() 
{
?>
<!DOCTYPE html>
<html lang="<?php print $GLOBALS["language"]; ?>">
    <?php head(translate_string($GLOBALS["language"], "administration")); ?>
    <body class="mh2">
        <div class="app">
            <div class="flex flex-column flex-row-l items-center-ns justify-between-ns mt2 pa2 bg-light-red black tc ba b--dashed bw1">
                <h1 class="f3 dib mv2 ma0-l"><?php translate($GLOBALS["language"], "administration"); ?></h1>
                <form class="w-100 w-auto-l" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="flex flex-column flex-row-l items-center-l">
                        <span class="mr3-l"><?php print $_SESSION["username"] ?></span>
                        <input class="mt3 mt0-l" name="signout" type="submit" value="<?php translate($GLOBALS["language"], "signout"); ?>" />
                    </div>
	            </form>
            </div>
            <?php nav_bar() ?>
            <section id="projects">
                <form class="w-100 w-auto-l mb2 mb0" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <article class="flex flex-column items-start-l mw100 center ba bw2 ph3 pv2 mv2">
                        <label class="mt1" for="language"><?php translate($GLOBALS["language"], "language"); ?></label>
                        <select name="language" class="w-100 w-auto-l mb2">
<?php
foreach (get_languages() as $language) {
?>
                            <option value="<?php print $language->shortcode ?>" <?php select($GLOBALS["language"], $language->shortcode) ?>><?php print $language->name ?></option>
<?php
}
?>
                        </select>
                        <input name="title" class="w-100 mv2" type="text" placeholder="<?php translate($GLOBALS["language"], "project_title"); ?>" required="required" />
                        <input name="researcher" class="w-100 w-auto-l mv2" type="text" placeholder="<?php translate($GLOBALS["language"], "researcher"); ?>" required="required" />
                        <label class="mt1" for="department"><?php translate($GLOBALS["language"], "department"); ?></label>
                        <select name="department" class="w-100 w-auto-l mb2">
<?php
foreach (get_departments($GLOBALS["language"]) as $department) {
?>
                            <option value="<?php print $department->id ?>" <?php select($GLOBALS["department"], $department->id) ?>><?php print $department->name ?></option>
<?php
}
?>
                        </select>
                        <textarea name="call_to_action" class="w-100 mv2" placeholder="<?php translate($GLOBALS["language"], "call_to_action"); ?>" required="required"></textarea>
                        <input class="mv2" name="add-project" type="submit" value="<?php translate($GLOBALS["language"], "add_project"); ?>" />
                    </article>
                </form>
                <?php display_projects($GLOBALS["language"], $GLOBALS["department"], true); ?>
            </section>
        </div>
        <script src="filters.js"></script>
    </body>
</html>
<?php
}
?>