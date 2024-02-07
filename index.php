<?php
session_start();
$pagetitle = "Home";
include 'config/init.php';

if (!isset($_SESSION['user'])) {

	redirect('login.php', 'Login To Continue .....');
}

?>

<?php include 'includes/footer.php';
