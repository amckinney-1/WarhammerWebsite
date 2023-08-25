<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

// Get the db connection
$myDbConn = ConnectionGet();

$myJSON = null;
$row = null;
$myGet = "";

//Creates a User
if (array_key_exists("Create_Name", $_GET) == TRUE) {
    $myGet = $_GET["Create_Name"];
    $param1 = $_GET["Create_Password"];
    $param2 = $_GET["Create_Email"];
    $param3 = $_GET["Create_isAdmin"];

    $dataSet = CreateUserWhere($myDbConn, $myGet, $param1, $param2, $param3);
}

//Updates a User
if (array_key_exists("Update_ID", $_GET) == TRUE) {
    $myGet = $_GET["Update_ID"];
    $param1 = $_GET["Update_Name"];
    $param2 = $_GET["Update_Password"];
    $param3 = $_GET["Update_Email"];
    $param4 = $_GET["Update_isAdmin"];

    $dataSet = UpdateUserWhere($myDbConn, $myGet, $param1, $param2, $param3, $param4);
}

//Deletes a User
if (array_key_exists("Delete_ID", $_GET) == TRUE) {
    $myGet = $_GET["Delete_ID"];

    $dataSet = DeleteUserWhere($myDbConn, $myGet);
}

//Returns the table of User's so the admin can confirm any changes made
$myJsonResult = GetAllUsers($myDbConn);

//Formats results into JSON
if ($myJsonResult) {
    // loop through each record and format the json (apply any needed business logic)
    while ($row = mysqli_fetch_array($myJsonResult)) {
        $rowArray[] = json_decode($row[0]);
    }

    // Format array as json
    $myJSON = json_encode($rowArray);
}

mysqli_close($myDbConn);

echo $myJSON; //return data

?>