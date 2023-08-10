<?php
// Is this finally working???
//Yes
session_start();
?>
<head>
    <link rel="stylesheet" href="myStyle3.css" />
</head>

<!DOCTYPE html>
<html lang="en">

<body>

<h1><?php echo $MyHeader ?></h1>

<br />
<h2>
<?php
include_once "Navigation.php";

if ($_SESSION["isAdmin"] == 1) {
    echo '  &nbsp; &nbsp;<a href="ManagePages.php">Manage Pages</a>';
}
?>
</h2>

<br/>
<br/>