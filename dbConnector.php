<?php

//constants
DEFINE("DB_USER", "root");
DEFINE("DB_PSWD", "admin");
DEFINE("DB_SERVER", "localhost:3306");
DEFINE("DB_NAME", "warhammerdb");

//get Connection
function ConnectionGet()
{
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
        or die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

//Gets whole table
function GetAll($dbConn)
{
    $query = "SELECT JSON_OBJECT(
        'Unit_ID', wdb.Unit_ID,
        'Unit_Name', wdb.UName,
        'Faction', wdb.Faction,
        'Key_Words', wdb.KeyWords,
        'Cost', wdb.Cost,
        'Base_Size', wdb.BaseSize,
        'Max_Size', wdb.MaxSize) as Json1
        FROM `warhammerdb`.`unitdatasheets` as wdb;";

    return @mysqli_query($dbConn, $query);
}

//Searchs using a faction name
function GetByFaction($dbConn, $faction)
{

    $query = "SELECT JSON_OBJECT(
        'Unit_ID', wdb.Unit_ID,
        'Unit_Name', wdb.UName,
        'Faction', wdb.Faction,
        'Key_Words', wdb.KeyWords,
        'Cost', wdb.Cost,
        'Base_Size', wdb.BaseSize,
        'Max_Size', wdb.MaxSize) as Json1
   FROM `warhammerdb`.`unitdatasheets` as wdb where wdb.Faction = '" . $faction . "';";

    return @mysqli_query($dbConn, $query);
}

//Searches using a Keyword
function GetByKeyword($dbConn, $keyword)
{

    $query = "SELECT JSON_OBJECT(
        'Unit_ID', wdb.Unit_ID,
        'Unit_Name', wdb.UName,
        'Faction', wdb.Faction,
        'Key_Words', wdb.KeyWords,
        'Cost', wdb.Cost,
        'Base_Size', wdb.BaseSize,
        'Max_Size', wdb.MaxSize) as Json1
   FROM `warhammerdb`.`unitdatasheets` as wdb where wdb.Keywords like \"%" . $keyword . "%\";";

    return @mysqli_query($dbConn, $query);
}

//Creates a datasheet using the values determined by the parameters
function CreateWhere($dbConn, $UnitName, $faction, $keyWords, $cost, $baseSize, $maxSize)
{
    $query = "INSERT INTO `warhammerdb`.`unitdatasheets`(UName, Faction, KeyWords, Cost, BaseSize, MaxSize) VALUES('" . $UnitName . "', '" . $faction . "', '" . $keyWords . "'," . $cost . ", " . $baseSize . ", " . $maxSize . ");";

    return @mysqli_query($dbConn, $query);
}

//Updates a datasheet at the chosen index using the values determined by the parameters
function UpdateWhere($dbConn, $Unit_ID, $Unit_Name, $faction, $keyWords, $cost, $baseSize, $maxSize)
{
    $query = "UPDATE `warhammerdb`.`unitdatasheets`
        SET UName = '" . $Unit_Name . "', Faction = '" . $faction . "', KeyWords = '" . $keyWords . "', Cost = " . $cost . ", BaseSize = " . $baseSize . ", MaxSize = " . $maxSize .
        " WHERE Unit_ID = " . $Unit_ID . ";";

    return @mysqli_query($dbConn, $query);
}

//Deletes a datasheet at the chosen index
function DeleteWhere($dbConn, $Unit_ID)
{

    $query = "DELETE FROM `warhammerdb`.`unitdatasheets` WHERE Unit_ID = " . $Unit_ID . ";";

    return @mysqli_query($dbConn, $query);
}

//Gets all rows from the Users table
function GetAllUsers($dbConn)
{
    $query = "SELECT JSON_OBJECT(
        'User_ID', wdb.id,
        'Username', wdb.username,
        'Password', wdb.password,
        'Email', wdb.email,
        'IsAdmin', wdb.isAdmin) as Json1
        FROM `warhammerdb`.`users` as wdb;";

    return @mysqli_query($dbConn, $query);
}

//Creates a user using the values determined by the parameters
function CreateUserWhere($dbConn, $User, $Password, $Email, $isAdmin)
{
    $query = "INSERT INTO `warhammerdb`.`users`(username, password, email, isAdmin) VALUES('" . $User . "', '" . $Password . "', '" . $Email . "'," . $isAdmin . ");";

    return @mysqli_query($dbConn, $query);
}

//Updates a user at the chosen index using the values determined by the parameters
function UpdateUserWhere($dbConn, $User_ID, $User, $Password, $Email, $isAdmin)
{
    $query = "UPDATE `warhammerdb`.`users`
        SET username = '" . $User . "', password = '" . $Password . "', email = '" . $Email . "', isAdmin = " . $isAdmin .
        " WHERE id = " . $User_ID . ";";

    return @mysqli_query($dbConn, $query);
}

//Deletes a user at the chosen index
function DeleteUserWhere($dbConn, $User_ID)
{

    $query = "DELETE FROM `warhammerdb`.`users` WHERE id = " . $User_ID . ";";

    return @mysqli_query($dbConn, $query);
}

function CheckLogin($dbConn)
{
    
}

//Gets a User determined by a username and password
function GetByUsername($dbConn, $username, $password){

    $query = "SELECT JSON_OBJECT(
        'Username', u.username,
        'Password', u.password,
        'Email', u.email,
        'IsAdmin', u.isAdmin) as Json1
   FROM `warhammerdb`.`users` as u where u.username = '" . $username . "' and u.password = '" . $password . "';";

    return @mysqli_query($dbConn, $query);
}

?>