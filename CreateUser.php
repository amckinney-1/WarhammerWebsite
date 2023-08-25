<?php
include_once "Header.php";
//Responsible for Creating users to add to the users table
?>

    Create a User: &nbsp;
<input type="text" id="User" value="User Name" />
<input type="text" id="Password" value="Password" />
<input type="text" id="Email" value="Email" />
<input type="text" id="isAdmin" value="isAdmin(0/1)" />
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
        loadJson(document.getElementById("User").value, document.getElementById("Password").value, document.getElementById("Email").value, document.getElementById("isAdmin").value);
    }
    
    function loadJson(user, password, email, isadmin) {
        //Calls the apiUserQuery file to create a user
        request.open('GET', 'apiUserQuery.php?Create_Name=' + user + '&Create_Password=' + password + '&Create_Email=' + email + '&Create_isAdmin=' + isadmin);
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