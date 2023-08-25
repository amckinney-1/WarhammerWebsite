<?php
include_once "dbConnector.php";
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="myStyle.css">
    </head>
    <input type="text" name="Username" id="username"/>
    <input type="text" name="Password" id="password"/>
    <button type="submit" onclick="OnClickSubmit()" name="Submit">Sign in</button>
    <script>
    var request = new XMLHttpRequest();
    function OnClickSubmit() {

        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;


        request.open('GET', 'apiQuery.php?Username_Search=TRUE&Username='+username+"&Password="+password);
        request.onload = loadUsername;
        request.send();
    }

    function loadUsername(evt) {
        var myResponse;
        var myData;
        var myPassword;

        console.log(request.responseText);
        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);
        if (myResponse == "Failed") {
            alert("Login failed");
            console.log("wrong password");
        }
        else {
            request.open('GET', 'apiQuery.php?Login_Success=TRUE&IsAdmin=' + myData[0].IsAdmin);
            request.send();

            window.location.href = "index.php";
        }
        console.log(myData);
        // Loop through each json record and create the HTML
        

        /*myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table*/
    }

    </script>
    <?php


    /*if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["Admin"])){
    setcookie("Login", "1", time() + 3600, "/");
    }elseif(isset($_POST["Normal"])){
    setcookie("Login", null, time() + 3600, "/");
    }
    header("Location: index.php");
    exit();
    }*/
    if (isset($_COOKIE["Login"]) == true) {
        $login = $_COOKIE["Login"];
    } else {
        $_COOKIE["Login"] = $login;
    }
    include "Footer.php";
    ?>
?>