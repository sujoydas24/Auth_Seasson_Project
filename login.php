<?php

//header
include('inc/header.php');

//navbar
include('inc/navbar.php');

//massage
$massageText = "";
$massageType = "";

// logical ops
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['email'] === $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            header("Location: dashboard.php");
            exit;
        }
    }

    $massageText = "Invalid email or password.";
    $massageType = "danger";
} 
    
         

?>


<!--Login Form-->

<div class="row-mt-5">
    <div class="col-6">
        <?php if ($massageText != '') ?>
        <div class="alert alert-<?php echo $massageType ?>" role="alert">
            <?php echo $massageText ?>
        </div>
        <form method="POST" action="">

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">?Login</button>
        </form>
    </div>
</div>

<?php
//footer
include('inc/footer.php');
?>