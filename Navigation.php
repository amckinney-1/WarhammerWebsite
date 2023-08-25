<a href="Index.php">Home</a> &nbsp; &nbsp;<a href="ViewDatabase.php">View Database</a> &nbsp; &nbsp;<a href="Contact.php">Meet The Team</a>
<?php
if (isset($_COOKIE["Login"]) == true) {
    $login = $_COOKIE["Login"];
    echo "&nbsp; &nbsp;<a href=\"ManagePages.php\">Manage Pages</a>";
}
if ($_SESSION["IsAdmin"] == 0) {
    echo '  &nbsp; &nbsp;<a href="ManagePages.php">Manage Pages</a>';
    echo '<div> Help Me </div>';
}
?>
&nbsp; &nbsp;<a href="LoginPage.php">Logout</a>
