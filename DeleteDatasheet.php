<?php
include_once "Header.php";
//Responsible for Deleting datasheets to add to the datasheets table
?>

    Delete a datasheet: &nbsp;
<input type="text" id="Unit_ID" value="ID" />
<button name="a" onclick="myClickEvent()">Submit</button>
<p id="A"></p>
<p id="jsonData"></p>

<script>
    var request = new XMLHttpRequest();

    $(document).ready(function () {
        //Currently Unused document.ready function
    });
    // Click event
    function myClickEvent() {
        //Loads JSON on button click
        loadJson(document.getElementById("Unit_ID").value);
    }
    
    function loadJson(id) {
        //Calls the apiQuery file to delete a datasheet
        request.open('GET', 'apiQuery.php?Delete_ID=' + id);
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        // create a table for display
        var myReturn = "<table><tr><td>Unit ID &nbsp;  &nbsp; </td><td>Unit Name &nbsp;  &nbsp; </td><td>Base Cost &nbsp;  &nbsp; </td></tr>";

        myResponse = request.responseText;

        myData = JSON.parse(myResponse);

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
        document.getElementById("jsonData").innerHTML = myReturn;

    }
</script>

<?php
include_once "Footer.php";
?>