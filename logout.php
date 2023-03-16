<?php

session_start();
if($_SESSION['auth'])
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['message'] = "Logged Out Successfully";


}
header('Location: index.php')

?>