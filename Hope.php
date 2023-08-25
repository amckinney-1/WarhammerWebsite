<?php
include "Header.php";
$BColour = '#0';
$TColour = '#0';
$HColour = '#0';
//Responsible for changing the theme of the website
?>
<html>
    <form method="post" action="">
        <button type="submit" name="Basic">Basic Tan</button>
        <button type="submit" name="GreenNecron">Blue and Purple Pastel</button>
        <button type="submit" name="Golden">Golden Sharp</button>
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Basic"])){
        setcookie("Style", "1", time() + 3600, "/");
    }elseif(isset($_POST["GreenNecron"])){
        setcookie("Style", "2", time() + 3600, "/");
    }elseif(isset($_POST["Golden"])){
        setcookie("Style", "3", time() + 3600, "/");
    }
        header("Location: Hope.php");
        exit();
}
if(isset($_COOKIE["Style"]) == true){
        $myStyle = $_COOKIE["Style"];
} else {
        $_COOKIE["Style"] = $myStyle;
}
    include "Footer.php";
    ?>