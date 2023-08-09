<?php
use HRTime\Unit;
if (array_key_exists("Unit_Name", $_GET) == TRUE) {
    echo "<h1>" . $_GET["Unit_Name"] . "</h1>";
}
?>