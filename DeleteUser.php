<?php
include_once "Header.php";
?>

    Delete a User: &nbsp;
<input type="text" id="User_ID" value="ID" />
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

        loadJson(document.getElementById("User_ID").value);
    }
    // ---------------------------------
            // Call the microservice and get the data
    function loadJson(id) {
        // alert("id: " + id); // Use for debugging
        request.open('GET', 'apiUserQuery.php?Delete_ID=' + id);
        request.onload=loadComplete;
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
include_once "Footer.php";
?>