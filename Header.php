<?php
// Is this finally working???
//Yes
session_start();

if (isset($_COOKIE["Style"]) == false)
{
    $myStyle = 3;
} else {
    $myStyle = $_COOKIE["Style"];
}
?>
<head>
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
<br/>
<?php
    switch ($myStyle)
    {
    case 1:
        echo '<link rel="stylesheet" type="text/css" href="/Stylesheets/myStyle.css">';
        break;
    case 2:
        echo '<link rel="stylesheet" type="text/css" href="/Stylesheets/myStyle2.css">';
        break;
    case 3:
        echo '<link rel="stylesheet" type="text/css" href="/Stylesheets/myStyle3.css">';
        break;
    default:
        break;
    }
?>
</h2>
<?php

?>
<br/>
<br/>