<?php include "../utils.php" ?>

<?php
session_start();
session_unset();
session_destroy();

redirect("/php_tutorial/01_php_intro.php");
?>