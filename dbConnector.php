<?php

//constants
DEFINE("DB_USER", "root");
DEFINE("DB_PSWD", "admin");
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
   FROM `warhammerdb`.`unitdatasheets` as wdb where wdb.Keywords like \"%'" . $keyword . "'%\";";

    return @mysqli_query($dbConn, $query);
}

function CreateWhere($dbConn, $UnitName, $faction, $keyWords, $cost, $baseSize, $maxSize)
{
    $query = "INSERT INTO `warhammerdb`.`unitdatasheets`(UName, Faction, KeyWords, Cost, BaseSize, MaxSize) VALUES('" . $UnitName . "', '" . $faction . "', '" . $keyWords . "'," . $cost . ", " . $baseSize . ", " . $maxSize . ");";

    return @mysqli_query($dbConn, $query);
}

function UpdateWhere($dbConn, $Unit_ID, $Unit_Name, $faction, $keyWords, $cost, $baseSize, $maxSize)
{
    $query = "UPDATE `warhammerdb`.`unitdatasheets`
        SET UName = '" . $Unit_Name . "', Faction = '" . $faction . "', KeyWords = '" . $keyWords . "', Cost = " . $cost . ", BaseSize = " . $baseSize . ", MaxSize = " . $maxSize .
        " WHERE Unit_ID = " . $Unit_ID . ";";

    return @mysqli_query($dbConn, $query);
}

function DeleteWhere($dbConn, $Unit_ID)
{

    $query = "DELETE FROM `warhammerdb`.`unitdatasheets` WHERE Unit_ID = " . $Unit_ID . ";";

    return @mysqli_query($dbConn, $query);
}

function CheckLogin($dbConn)
{
    if ($statement = $dbConn->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $statement->bind_param('s', $_POST['username']);
        $statement->execute();
        // Store the result so we can check if the account exists in the database.
        $statement->store_result();

        if ($statement->num_rows > 0) {
            $statement->bind_result($id, $password);
            $statement->fetch();
            // Account exists, now we verify the password.
            // Note: remember to use password_hash in your registration file to store the hashed passwords.
            if (password_verify($_POST['password'], $password)) {
                // Verification success! User has logged-in!
                // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $id;
                header('Location: index.php');
            } else {
                // Incorrect password
                echo 'Incorrect username and/or password!';
            }
        } else {
            // Incorrect username
            echo 'Incorrect username and/or password!';
        }

        $statement->close();
    }
}
?>