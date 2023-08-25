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

if (array_key_exists("Get_All", $_GET) == TRUE) {
    $myJsonResult = GetAll($myDbConn);
}

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

myvar1 = array_key_exists('Login_Success', $_GET);
myvar2 = array_key_exists('IsAdmin', $_GET);

if (array_key_exists('Login_Success', $_GET) && array_key_exists('IsAdmin', $_GET)) {
    $IsAdmin = $_GET["IsAdmin"];

    if (isset($_SESSION["IsAdmin"]) == 1) {
        $admin = $_SESSION["IsAdmin"];
        echo ('<div>' . $admin . '</div>' );
    } else {
        $_SESSION["IsAdmin"] = $admin;
        echo ('<div>' . $admin . '</div>');
    }
}

if ($myJsonResult) {
    while ($row = mysqli_fetch_array($myJsonResult)) {
        $rowArray[] = json_decode($row[0]);
    }

    $myJSON = json_encode($rowArray);


} else {
    $myJSON = "Failed";
}
mysqli_close($myDbConn);
echo $myJSON;

?>