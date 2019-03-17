<?php

include('ressources/database/login_to_db.php');

function r_error($mess)
{
    header('Location: logs.php?error=' . strip_tags($mess));
}

function check_pass($password)
{
    $parsed_password = parse_ini_file('ressources/password/password.ini');
    if(password_verify($password, $parsed_password['password']))
    { return 0; }
    else
    { return 1; }
}

function clean_logs()
{
    $db = login_db();
    $delete = $db->prepare('DELETE FROM messages');
    $delete->execute();
}

if(!isset($_POST['password']) || empty($_POST['password']))
{ r_error('Please retry to clean the logs.'); exit(); }

// check password
if(check_pass($_POST['password']))
{ r_error('Bad password, please retry.'); exit(); }

// cleaning logs
clean_logs();

header('Location: logs.php?success=Logs clean successfully.');

?>