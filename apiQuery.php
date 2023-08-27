<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

// Get All records
// Get the db connection
$myDbConn = ConnectionGet();

$myJSON = null;
$row = null;
$myGet = "";
$userArray = null;

session_start();


//Creates a database
if (array_key_exists("Create_Name", $_GET) == TRUE) {
    $myGet = $_GET["Create_Name"];
    $param1 = $_GET["Create_Faction"];
    $param2 = $_GET["Create_Keywords"];
    $param3 = $_GET["Create_Cost"];
    $param4 = $_GET["Create_BaseSize"];
    $param5 = $_GET["Create_MaxSize"];

    $dataSet = CreateWhere($myDbConn, $myGet, $param1, $param2, $param3, $param4, $param5);
}

//Updates a database
if (array_key_exists("Update_ID", $_GET) == TRUE) {
    $myGet = $_GET["Update_ID"];
    $param1 = $_GET["Update_Name"];
    $param2 = $_GET["Update_Faction"];
    $param3 = $_GET["Update_Keywords"];
    $param4 = $_GET["Update_Cost"];
    $param5 = $_GET["Update_BaseSize"];
    $param6 = $_GET["Update_MaxSize"];

    $dataSet = UpdateWhere($myDbConn, $myGet, $param1, $param2, $param3, $param4, $param5, $param6);
}

//Delete a database
if (array_key_exists("Delete_ID", $_GET) == TRUE) {
    $myGet = $_GET["Delete_ID"];

    $dataSet = DeleteWhere($myDbConn, $myGet);
}

//Defaults the Json to be a GetAll, so the first three display the whole table when they are called to help confirm changes.
$myJsonResult = GetAll($myDbConn);

//Queries the faction search
if (array_key_exists("Faction_Search", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myGet = $_GET["Faction_Search"];
    // Get the records
    $myJsonResult = GetByFaction($myDbConn, $myGet);
}

//Queries the Keyword search
if (array_key_exists("Keyword_Search", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myGet = $_GET["Keyword_Search"];
    // Get the records
    $myJsonResult = GetByKeyword($myDbConn, $myGet);
}

//Queries the ID search
if (array_key_exists("ID_Search", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myGet = $_GET["ID_Search"];
    // Get the records
    $myJsonResult = GetByID($myDbConn, $myGet);
}

//Queries a username search for the login page
if (array_key_exists("Username_Search", $_GET) && array_key_exists("Username", $_GET) && array_key_exists("Password", $_GET)) {
    $username = $_GET["Username"];
    $password = $_GET["Password"];
    $myJsonResult = GetByUsername($myDbConn, $username, $password);

    //if ($myJsonResult) {
    //    while ($row = mysqli_fetch_array($myJsonResult)) {
    //        $rowArray[] = json_decode($row[0]);
    //    }

    //    $myJSON = json_encode($rowArray);


    //} else {
    //    $myJSON = "Login Failed";
    //}
    //mysqli_close($myDbConn);
}

$myvar1 = array_key_exists('Login_Success', $_GET);
$myvar2 = array_key_exists('IsAdmin', $_GET);

//Sets the session variable from login for the admin or user.
if (array_key_exists('Login_Success', $_GET) && array_key_exists('IsAdmin', $_GET)) {
    $IsAdmin = $_GET["IsAdmin"];

    $_SESSION["IsAdmin2"] = $IsAdmin;
}

//Formats the recieved data to JSON
if ($myJsonResult) {
    while ($row = mysqli_fetch_array($myJsonResult)) {
        $rowArray[] = json_decode($row[0]);
    }

    $myJSON = json_encode($rowArray);


} else {
    $myJSON = "Failed";
}

//Close database
mysqli_close($myDbConn);
//Returns data
echo $myJSON;

?>