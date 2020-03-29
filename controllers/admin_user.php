<?php

require 'models/users.php';

if(empty($_SESSION['id'])){
    header("Location: ".ROOT_PATH);
    exit();
}
$users = getAllFromUser();

include 'views/admin_user.php';

?>