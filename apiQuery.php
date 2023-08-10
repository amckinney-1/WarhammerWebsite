<?php
include_once "dbConnector.php";

header('Content-Type: application/json');

// Get All records
// Get the db connection
$myDbConn = ConnectionGet();

$myJSON = null;
$row = null;
$myGet = "";

if (array_key_exists("Create_Name", $_GET) == TRUE) {
    $myGet = $_GET["Create_Name"];
    $param1 = $_GET["Create_Faction"];
    $param2 = $_GET["Create_Keywords"];
    $param3 = $_GET["Create_Cost"];
    $param4 = $_GET["Create_BaseSize"];
    $param5 = $_GET["Create_MaxSize"];

    $dataSet = CreateWhere($myDbConn, $myGet, $param1, $param2, $param3, $param4, $param5);
}

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

if (array_key_exists("Delete_ID", $_GET) == TRUE) {
    $myGet = $_GET["Delete_ID"];

    $dataSet = DeleteWhere($myDbConn, $myGet);
}

$myJsonResult = GetAll($myDbConn);

if (array_key_exists("Faction_Search", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myGet = $_GET["Faction_Search"];
    // Get the records
    $myJsonResult = GetByFaction($myDbConn, $myGet);
}

if (array_key_exists("Keyword_Search", $_GET) == TRUE) {
    // Get the db connection
    // Get the data
    $myGet = $_GET["Keyword_Search"];
    // Get the records
    $myJsonResult = GetByKeyword($myDbConn, $myGet);
}


//
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