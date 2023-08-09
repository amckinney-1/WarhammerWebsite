<?php

//constants
DEFINE("DB_USER", "root");
DEFINE("DB_PSWD ", "admin");
DEFINE("DB_SERVER", "localhost:3306");
DEFINE("DB_NAME", "warhammerdb");

//get things
function ConnectionGet()
{
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

function GetAll($dbConn)
{
    $query = "SELECT JSON_OBJECT(
        'Unit_Name', wdb.UName,
        'Faction', wdb.Faction,
        'Key_Words', wdb.KeyWords,
        'Cost', wdb.Cost,
        'Base_Size', wdb.BaseSize,
        'Max_Size', wdb.MaxSize) as Json1
        FROM `warhammerdb`.`unitdatasheets` as wdb;";

    return @mysqli_query($dbConn, $query);
}

function GetByFaction($dbConn, $faction)
{

    $query = "SELECT sl.GName, sl.ReleaseDate, sl.PlayTime
   FROM `warhammerdb`.`unitdatasheets` as wdb where wdb.Faction = " . $faction . " limit 1;";

    return @mysqli_query($dbConn, $query);
}
?>