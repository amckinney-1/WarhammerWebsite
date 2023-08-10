<?php
include_once "Header.php";
?>

    Update a datasheet: &nbsp;
<input type="text" id="Unit_ID" value="ID" />
<input type="text" id="Unit_Name" value="Unit Name" />
<input type="text" id="Faction" value="Faction" />
<input type="text" id="Keywords" value="Keywords" />
<input type="text" id="Cost" value="Unit Cost" />
<input type="text" id="BaseSize" value="Unit Base Size" />
<input type="text" id="MaxSize" value="Unit Max Size" />
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

        loadJson(document.getElementById("Unit_ID").value, document.getElementById("Unit_Name").value, document.getElementById("Faction").value, document.getElementById("Keywords").value, document.getElementById("Cost").value, document.getElementById("BaseSize").value, document.getElementById("MaxSize").value);
    }
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson(id, name, faction, keywords, cost, bsize, msize) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiQuery.php?Update_ID=' + id + '&Update_Name=' + name + '&Update_Faction=' + faction + '&Update_Keywords=' + keywords + '&Update_Cost=' + cost + '&Update_BaseSize=' + bsize + '&Update_MaxSize=' + msize);
        request.onload=loadComplete;
        request.send();
    }

    // Run when the data has been loaded
    function loadComplete(evt) {
        var myResponse;
        var myData;
        // create a table for display
            var myReturn = "<table><tr><td>Unit Name &nbsp;  &nbsp; </td><td>Faction &nbsp;  &nbsp; </td><td>Base Cost &nbsp;  &nbsp; </td></tr>";

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