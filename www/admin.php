<?php
function display_login()
{
?>
	<form method="POST" action="">
        <label for="password">Password: </label>
        <input id="password" type="password" required="required" />
		<br />
		<input type="submit" value="Submit" />
	</form>
<?php
}
?>

<?php display_login(); ?>

<?php
function display_add_project()
{
?>
	<form method="POST" action="">
		<label for="language">Language: </label>
		<select id="language">
			<option value="en">English</option>
			<option value="fr">French</option>
		</select>
		<br />
		<label for="title">Title: </label>
		<input id="title" type="text" required="required" />
		<br />
		<label for="department">Department: </label>
		<input id="department" type="text" required="required" />
		<br />
		<label for="author">Author: </label>
		<input id="author" type="text" required="required" />
		<br />
		<label for="reviewer">Reviewer: </label>
		<input id="reviewer" type="text" required="required" />
		<br />
		<label for="call_for_action">Call for Action: </label>
		<textarea id="call_for_action" rows="2" cols="33"></textarea>
		<br />
		<label for="abstract">Abstract: </label>
		<textarea id="abstract" rows="5" cols="33"></textarea>
		<br />
		<br />
		<input type="reset" value="Clear" />
		<input type="submit" value="Submit" />
	</form>
<?php
}
?>
