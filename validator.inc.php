<?php
function ValidarEmail(){
global $email;
if (strpos($email, "@")=== FALSE)
    return FALSE;
else
    return TRUE;
}

function ValidarPassword(){
    global $password_user;
    if (strlen($password_user)<6)
        return FALSE;
    else
        return TRUE;
}
?>