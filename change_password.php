<?php

function r_error($mess)
{
    header('Location: index.php?error=' . strip_tags($mess));
}

function check_old_pass($password)
{
    $parsed_password = parse_ini_file('ressources/password/password.ini');
    if(password_verify($password, $parsed_password['password']))
    { return 0; }
    else
    { return 1; }
}

function save_new_pass($password)
{
    $save = fopen('ressources/password/password.ini', 'w');
    fputs($save, '[password]' . "\r\n");
    fputs($save, 'password = "' . $password . '"');
}

if(!isset($_POST['old_pass']) || !isset($_POST['new_pass']) || empty($_POST['old_pass']) || empty($_POST['new_pass']))
{ r_error('Please complete all the fields.'); exit(); }

if(check_old_pass($_POST['old_pass']))
{ r_error('Bad old or new password, please retry.'); exit(); }

if(strlen($_POST['new_pass']) < 5)
{ r_error('The password must at least do 5 caracters.'); exit(); }

$new_pass = password_hash($_POST['new_pass'], PASSWORD_DEFAULT);
save_new_pass($new_pass);

header('Location: index.php?success=Your password has been changed.');

?>