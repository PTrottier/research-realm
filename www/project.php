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
<article class="mw100 center bl bw3 ph3 pv2 mv2">
    <h2><?php print $this->title ?></h2>
    <h3><?php print $this->researcher ?></h3>
    <h4><?php print $this->department ?></h4>
    <p><?php print $this->call_to_action ?></p>
</article>
<?php
    }

}

function display_projects($language, $department) {
    $projects = get_projects($language, $department);

    if (count($projects) <= 0) {
?>
<p>
        <h2 class="tc"><?php translate($GLOBALS["language"], "no_projects") ?></h2>
<?php
    }

    foreach ($projects as $project) {
        $project->html();
    }
}

?>