<?php

include('ressources/database/login_to_db.php');

function r_error($mess)
{
    header('Location: index.php?error=' . strip_tags($mess));
}

// check if the sent password is the good one
function check_password($password)
{
    $parsed_pass = parse_ini_file('ressources/password/password.ini');
    if(password_verify($password, $parsed_pass['password']))
    { return 0; }
    else
    { return 1; }
}

// check if there is a sent data
if(!isset($_POST['message']) || !isset($_POST['password']) || empty($_POST['message']) || empty($_POST['password']))
{ r_error('Please complete all fields.'); exit(); }

// check if the message is not too long
if(strlen(strip_tags($_POST['message'])) > 30)
{ r_error('Your message is too long, max lenght is 30 caracters.'); exit(); }

// check password
if(check_password($_POST['password']))
{ r_error('Bad password, please retry.'); exit(); }

$db = login_db();
$insert = $db->prepare('INSERT INTO messages(message, post_date, post_ip) VALUES (:message, :post_date, :post_ip)');
$insert->execute(array(
    'message'=>strip_tags($_POST['message']),
    'post_date'=>date('Y/m/d H:i:s'),
    'post_ip'=>$_SERVER['REMOTE_ADDR']
));

header('Location: index.php?success=Message sent successfully.');

?>