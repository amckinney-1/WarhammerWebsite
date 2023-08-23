<?php
include_once "Header.php";

if (array_key_exists("username", $_GET) == TRUE) {
    echo "<h1>" . $_GET["username"] . "</h1>";
}
echo "</br>";
if (array_key_exists("password", $_GET) == TRUE) {
    echo "<div>" . $_GET["password"] . "</div>";
}
if (array_key_exists("email", $_GET) == TRUE) {
    echo "<div>" . $_GET["email"] . "</div>";
}
if (array_key_exists("isAdmin", $_GET) == TRUE) {
    echo "<div>" . $_GET["isAdmin"] . "</div>";
}

include_once "Footer.php";
?>