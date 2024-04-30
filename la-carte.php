<?php
session_start();

if (!isset($_SESSION['auth'])) {
    header('Location: index.php');
    exit();
}
require('header.php');
?>


<h1 style="text-align:center; margin: 50px">Page carte</h1>
<?php
require('footer.php');
?>
