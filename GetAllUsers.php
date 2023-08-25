<?php
include_once "Header.php";
//Lets the admin view all users
?>

<?php
$myVar = "food";
?>

<p id="A"></p>
<p id="B"></p>

<p id="jsonData"></p>

<script>

    var request = new XMLHttpRequest();

        request.open('GET', 'apiUserQuery.php');
        request.onload = loadComplete;
        request.send();

    function loadJson() {
        request.open('GET', 'apiUserQuery.php');
        request.onload = loadComplete;
        request.send();
    }

    // Run when the data has been loaded
        function loadComplete(evt) {
        var myResponse;
        var myData;
        // create a table for display
        var myReturn = "<table><tr><td>User ID &nbsp;  &nbsp; </td><td>Username &nbsp;  &nbsp; </td><td>isAdmin &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;

        myData = JSON.parse(myResponse);

        for (index in myData) {
            myReturn += "<tr><td>" + myData[index].User_ID
                    + "</td><td><a href=\"userTemplate.php?username=" + myData[index].Username
                    + "&&password=" + myData[index].Password
                    + "&&email=" + myData[index].Email
                    + "&&isAdmin=" + myData[index].IsAdmin+ "\">" + myData[index].Username + "</a></td><td>" +
                myData[index].IsAdmin + "</td></tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn;

    }

</script>

<?php
include_once "MyFooter.php";
?>

