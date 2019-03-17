<?php

function r_error($mess)
{
    header('Location: index.php?error=' . strip_tags($mess));
}

if(empty($_POST['message']) || empty($_POST['password']))
{ r_erro(); exit(); }

?>