<?php
include "Header.php";
$BColour = '#0';
$TColour = '#0';
$HColour = '#0';
?>
<html>
    <form method="post" action="">
        <button type="submit" name="Basic">Basic</button>
        <button type="submit" name="GreenNecron">GreenSharp</button>
        <button type="submit" name="Golden">GoldenSharp</button>
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