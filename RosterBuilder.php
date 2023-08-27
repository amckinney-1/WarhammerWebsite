<?php
include_once "Header.php";
?>
    Add ID to Roster: &nbsp;
<input type="text" id="ID" />
<button name="a" onclick="myClickEvent()">Add</button>
<p id="A"></p>
<p id="jsonData"></p>


<script>

    var request = new XMLHttpRequest();

    request.open('GET', 'apiQuery.php');
    request.onload = loadComplete;
    request.send();

    function myClickEvent() {
        //Loads JSON on button click
        loadJson(document.getElementById("ID").value);
    }

    function loadJson(id) {
        request.open('GET', 'apiQuery.php?ID_Search=' + id);
        request.onload = loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        // create a table for display
            var myReturn = "<table><tr><td>ID &nbsp;  &nbsp; </td><td>Unit Name &nbsp;  &nbsp; </td><td>Base Cost &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;
        //alert("A: " + myResponse); // Use for debug
        //document.getElementById("A").innerHTML = myResponse; // Display the json for debugging
        myData = JSON.parse(myResponse);

        // Loop through each json record and create the HTML
        for (index in myData) {
            myReturn += "<tr><td>" + myData[index].Unit_ID
                + "</td><td><a href=\"template.php?Unit_Name=" + myData[index].Unit_Name
                + "&&Faction=" + myData[index].Faction
                + "&&Key_Words=" + myData[index].Key_Words
                + "&&Cost=" + myData[index].Cost
                + "&&Base_Size=" + myData[index].Base_Size
                + "&&Max_Size=" + myData[index].Max_Size + "\">" + myData[index].Unit_Name + "</a></td><td>" +
                myData[index].Cost + "</td></tr>";

        }
        myReturn += "</table>";
        document.getElementById("jsonData").innerHTML = myReturn; // Display table
    }



</script>

<?php
include_once "MyFooter.php";
?>