<?php require_once("db.php"); ?>
<?php
class Project {
    private $id;
    private $title;
    private $department;
    private $researcher;
    private $call_to_action;

    function __construct($id, $title, $department, $researcher, $call_to_action) {
        $this->id = $id;
        $this->title = $title;
        $this->department = $department;
        $this->researcher = $researcher;
        $this->call_to_action = $call_to_action;
    }

    public function get_id() {
        return $this->id;
    }

    public function html() {
?>
<article class="mw100 bl bw2 ph3 pv1 mv3">
    <h2><?php print $this->title ?></h2>
    <h3><?php print $this->researcher ?></h3>
    <h4><?php print $this->department ?></h4>
    <p><?php print $this->call_to_action ?></p>
</article>
<?php
    }

    public function html_form() {
?>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input class="dn" type="hidden" name="project" value="<?php print $this->id; ?>" />
    <div class="w-100 flex items-center justify-between">
        <?php
        $this->html();
        ?>
        <input class="h3 w4 ba bw2 b--red" name="delete-project" type="submit" value="<?php translate($GLOBALS["language"], "delete"); ?>" />
    </div>
</form>
<?php
    }

}

function display_projects($language, $department, $editable) {
    $projects = get_projects($language, $department);

    if (count($projects) <= 0) {
?>
<p>
        <h2 class="tc"><?php translate($GLOBALS["language"], "no_projects") ?></h2>
<?php
    }

    if ($editable) {
        foreach ($projects as $project)
            $project->html_form();
    } else
        foreach ($projects as $project)
            $project->html();

}

?>