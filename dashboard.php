<?php

$pageTitle = "DashBoard";

//header
include('inc/header.php');

//navbar
include('inc/navbar.php');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}


?>


<!--Login Form-->


<div class="col-6">
    <h1>Welcome <?php htmlspecialchars($_SESSION['user']['name']) ?> </h1>
</div>

<?php
//footer
include('inc/footer.php');
?>