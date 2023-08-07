<?php
// Is this finally working???
//Yes
session_start();
?>
<head>
    <link rel="stylesheet" href="myStyle.css" />
</head>

<!DOCTYPE html>
<html lang="en">

<body>

<h1><?php echo $MyHeader ?></h1>

<br />

<?php
include_once "Navigation.php";

if ($_SESSION["isAdmin"] == 1) {
    echo '  &nbsp; &nbsp;<a href="ManagePages.php">Manage Pages</a>';
}
?>
<br/>
<br/>