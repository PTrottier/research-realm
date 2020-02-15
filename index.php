<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Research Realm</title>
	</head>
	<body>
      <header>
        <nav>
          <a href="#">
            <img alt="Research Realm" src="logo.png" />
          </a>
          <div id="filter">
            <form method="POST" action="/">
              <label for="department">Department/Département</label>
              <select id="department">
                <option value="cosc">Computer Science / Sciences Informatiques</option>
                <option value="kin">Kinesiology / Kinésiologie</option>
                <option value="psych">Psychology / Psychologie</option>
              </select>
              <input type="reset" value="Reset" />
              <input type="submit" value="Submit" />
            </form>
          </div>
        </nav>
      </header>
      <section>
      <?php
        $title = "Title";
        $department = "Department";
        $call_for_action = "Call for Action";
        for ($i = 0; $i < 4; $i++)
        {
            project($department . $i, $title . $i, $call_for_action . $i);
            print '<hr />';
        }
        project($department . 5, $title . 5, $call_for_action . 5);
      ?>
      <?php function project($department, $title, $call_for_action) 
      { 
      ?>
        <a href="#">
          <article>
            <h2><?php print $title ?></h2>
            <h3><?php print $department ?></h3>
            <p><?php print $call_for_action ?></p>
          </article>
        </a>
      <?php 
      } 
      ?>
      </section>
	</body>
</html>
