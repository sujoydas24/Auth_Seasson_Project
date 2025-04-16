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
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    //empty check
    if (empty($name) || empty($email) || empty($password)) {
        $massageText = "Fill up the form";
        $massageType = "danger";
    }else{

        // Check if email already exists
        // foreach ($_SESSION['users'] as $user) {
        //     if ($user['email'] === $email) {
        //         $massageText = "Registration Already Done!";
        //         $massageType = "success";
        //         exit;
        //     }
        // }

        $_SESSION['users'][] = [
            'name' => $name,
            'email' => $email,
            'password' => $password
        ];

        $massageText = "Registration Done";
        $massageType = "success";
    }

}


?>


<!--Registration Form-->

<div class="row-mt-5">
    <div class="col-6">
        <?php if ($massageText != '') ?>
        <div class="alert alert-<?php echo $massageType ?>" role="alert">
            <?php echo $massageText ?>
        </div>
        <form method="POST" action="">

            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="register">Register</button>
        </form>
    </div>
</div>

<?php
//footer
include('inc/footer.php');
?>