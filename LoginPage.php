<?php

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="myStyle.css">
    </head>
    <form method="post" action="">
        <button type="submit" name="Admin">Admin Signin</button>
        <button type="submit" name="Normal">Regular Signin</button>
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Admin"])){
        setcookie("Login", "1", time() + 3600, "/");
    }elseif(isset($_POST["Normal"])){
        setcookie("Login", null, time() + 3600, "/");
    }
        header("Location: index.php");
        exit();
}
if(isset($_COOKIE["Login"]) == true){
        $login = $_COOKIE["Login"];
} else {
        $_COOKIE["Login"] = $login;
}
    include "Footer.php";
?>
?>