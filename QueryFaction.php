<?php
include_once "Header.php";
?>

    Sort by faction: &nbsp;
<input list="Faction" id="Faction_ID"/>
            <datalist id="Faction">
                <option value="Drukhari">
                <option value="Corsairs">
            </datalist>
<button name="a" onclick="myClickEvent()">Submit</button>
<p id="A"></p>
<p id="jsonData"></p>

<script>
   var request = new XMLHttpRequest();

    $(document).ready(function () {
        // alert("Ready"); // Use for debugging

    });
    // ---------------------------------
    // Click event
    function myClickEvent() {
         // alert("my click"); // Use for debugging
        // alert("data: " + document.getElementById("personId").value); // Use for debugging

        loadJson(document.getElementById("Faction").value);
    }
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson(id) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiSqlQuery.php?Cheese_ID=' + id);
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        var myReturn = "<table><tr><td>Cheese Name &nbsp;  &nbsp; </td><td>Brand Name &nbsp;  &nbsp; </td><td>Cheese_ID &nbsp;  &nbsp; </td><td>Person Name &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debugging
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // alert(myData);

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