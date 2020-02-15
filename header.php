<?php
function head()
{
?>
<head>
  <title>Research Realm</title>
</head>
<?php
}
?>

<?php
function nav_bar()
{
?>

<header>
      <nav>
        <a href="#">
          <img alt="Research Realm" src="logo.png" />
        </a>
        <div id="filter">
          <form method="POST" action="">
            <label for="department">Department/Département</label>
            <select id="department">
              <option value="cosc">Computer Science / Sciences Informatiques</option>
              <option value="kin">Kinesiology / Kinésiologie</option>
              <option value="psych">Psychology / Psychologie</option>
            </select>
            <input type="reset" value="Reset" />
            <input type="submit" value="Submit" name="department" />
          </form>
        </div>
      </nav>
</header>

<?php
}
?>
