<?php
include_once "Header.php";

if (array_key_exists("Unit_Name", $_GET) == TRUE) {
    echo "<h1>" . $_GET["Unit_Name"] . "</h1>";
}
echo "</br>";
if (array_key_exists("Faction", $_GET) == TRUE) {
    echo "<div>" . $_GET["Faction"] . "</div>";
}
if (array_key_exists("Key_Words", $_GET) == TRUE) {
    echo "<div>" . $_GET["Key_Words"] . "</div>";
}
if (array_key_exists("Cost", $_GET) == TRUE) {
    echo "<div>" . $_GET["Cost"] . "</div>";
}
if (array_key_exists("Base_Size", $_GET) == TRUE) {
    echo "<div>" . $_GET["Base_Size"] . "</div>";
}
if (array_key_exists("Max_Size", $_GET) == TRUE) {
    echo "<div>" . $_GET["Max_Size"] . "</div>";
}
?>