<a href="Index.php">Home</a> &nbsp; &nbsp;<a href="ViewDatabase.php">View Database</a>
<?php
if (isset($_COOKIE["Login"]) == true) {
    $login = $_COOKIE["Login"];
    echo "&nbsp; &nbsp;<a href=\"ManagePages.php\">Manage Pages</a>";
}
?>
&nbsp; &nbsp;<a href="LoginPage.php">Login</a>
