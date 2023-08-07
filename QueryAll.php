<?php
include_once "MyHeader.php";
?>

<?php
$myVar = "food";
?>

<p id="A"></p>
<p id="B"></p>

<p id="jsonData"></p>

<script>

    var request = new XMLHttpRequest();

// Don't run until the page is loaded and ready
    $(document).ready(function () {
    // alert("Ready");

    loadJson();
});

    // Call the microservice and get the data
    function loadJson() {
        request.open('GET', 'apiJsonQuery.php');
        request.onload = loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        // create a table for display
        var myReturn = "<table><tr><td>Cheese Name &nbsp;  &nbsp; </td><td>Brand Name &nbsp;  &nbsp; </td><td>Cheese_ID &nbsp;  &nbsp; </td><td>Person Name &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        for (index in myData) {
            myReturn += "<tr><td>" + myData[index].CName + "</td><td>" +
                myData[index].BName + "</td><td>" +
                myData[index].Cheese_ID + "</td><td>" +
                myData[index].FName + "</td></tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
}

</script>

<?php
include_once "MyFooter.php";
?>
