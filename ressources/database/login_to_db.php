<?php

function login_db()
{
    $config = parse_ini_file('ressources/database/config.ini');
    $db_host = $config['db_host'];
    $db_name = $config['db_name'];
    $db_user = $config['db_user'];
    $db_password = $config['db_pass'];

    try
    {
        $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8', $db_user, $db_password);
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }

    return $db;
}

?>