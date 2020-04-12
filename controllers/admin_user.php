<?php

require 'models/users.php';

if(empty($_SESSION['id']) || checkUserRole($_SESSION['id']) != 1){
    header('location: '.ROOT_PATH);
    exit();
}
$users = getAllFromUser();

include 'views/admin_user.php';
?>