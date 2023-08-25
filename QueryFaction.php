<?php
include_once "Header.php";
//Responsible for searching datasheets by faction
?>

    Sort by faction: &nbsp;
<input list="Faction" id="Faction_ID"/>
            <datalist id="Faction">
                <option value="Drukhari">
                <option value="Corsairs">
                <option value="Adeptus Mechanicus">
            </datalist>
<button name="a" onclick="myClickEvent()">Submit</button>
<p id="A"></p>
<p id="jsonData"></p>

<script>
    var request = new XMLHttpRequest();
    //Click event
    function myClickEvent() {
        //Loads JSON on button click
        loadJson(document.getElementById("Faction_ID").value);
    }

    function loadJson(id) {
        request.open('GET', 'apiQuery.php?Faction_Search=' + id);
        request.onload=loadComplete;
        request.send();
    }

    function loadComplete(evt) {
        var myResponse;
        var myData;

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
include_once "MyFooter.php";
?>