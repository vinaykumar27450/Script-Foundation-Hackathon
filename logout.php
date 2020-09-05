<?php
if($_SESSION['username'] && $_GET['logout'] == 1){
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);

}

?>
