<?php
    $host = 'localhost'; //HOST NAME.
    $db_name = 'meals'; //Database Name
    $db_username = 'root'; //Database Username
    $db_password = ''; //Database Password


    try
    {
        $connection = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);

            }
    catch (PDOException $e)
    {
        exit('Error Connecting To DataBase');
    }
?>
