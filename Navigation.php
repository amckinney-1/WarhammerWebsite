<a href="Index.php">Home</a> &nbsp; &nbsp;<a href="ViewDatabase.php">View Database</a> &nbsp; &nbsp;<a href="Contact.php">Meet The Team</a>
<?php
session_start();
//Displays the ManagePages if the user is an admin
if (isset($_COOKIE["Login"]) == true) {
    $login = $_COOKIE["Login"];
    echo "&nbsp; &nbsp;<a href=\"ManagePages.php\">Manage Pages</a>";
}
if ($_SESSION["IsAdmin2"] == 1) {
    echo '  &nbsp; &nbsp;<a href="ManagePages.php">Manage Pages</a>';
}
?>
&nbsp; &nbsp;<a href="LoginPage.php">Logout</a>
