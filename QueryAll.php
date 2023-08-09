<?php
include_once "Header.php";
?>

<?php
$myVar = "food";
?>

<p id="A"></p>
<p id="B"></p>

<p id="jsonData"></p>

<script>

    var request = new XMLHttpRequest();

        request.open('GET', 'apiQuery.php');
        request.onload = loadComplete;
        request.send();
// Don't run until the page is loaded and ready
    //$(document).ready(function () {
    // alert("Ready");

    //loadJson();
//});

    // Call the microservice and get the data
    function loadJson() {
        request.open('GET', 'apiQuery.php');
        request.onload = loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        // create a table for display
        var myReturn = "<table><tr><td>Unit Name &nbsp;  &nbsp; </td><td>Faction &nbsp;  &nbsp; </td><td>Key Words &nbsp;  &nbsp; </td><td>Base Cost &nbsp;  &nbsp; </td><td>Base Size &nbsp;  &nbsp; </td><td>Max Size &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        for (index in myData) {
            myReturn += "<tr><td><a href=\"template.php?Unit_Name=" + myData[index].Unit_Name + "\">" + myData[index].Unit_Name + "</a></td><td>" +
                myData[index].Faction + "</td><td>" +
                myData[index].Key_Words + "</td><td>" +
                myData[index].Cost + "</td></tr>";
                myData[index].BaseSize + "</td></tr>";
                myData[index].MaxSize + "</td></tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
}

</script>

<?php
include_once "MyFooter.php";
?>

