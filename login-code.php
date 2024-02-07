<?php
ob_start();
session_start();
include 'config/init.php';

/* Login Form Code */
if (isset($_POST['loginbtn'])) {
    $emailInput = validate($_POST['email']);
    $passInput = validate($_POST['pass']);

    $email = filter_var($emailInput, FILTER_SANITIZE_EMAIL);
    $password = sha1(htmlspecialchars($passInput));

    if (!empty($email && $password)) {
        $sql = "SELECT * FROM users WHERE email='$email' AND pass='$password' LIMIT 1";
        $query = mysqli_query($con, $sql);
        if ($query) {
            if (mysqli_num_rows($query) == 1) {
                $data = mysqli_fetch_array($query, MYSQLI_ASSOC);

                if ($data['role'] == 'admin') {
                    if ($data['banned'] == 1) {redirect('login.php', 'Your Account Has Been Banned Contact With Admin');}
                    $_SESSION['admin'] = $email;
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['name'] = $data['fullname'];

                    redirect('admin/index.php', 'Welcome Admin');
                } else {

                    if ($data['banned'] == 1) {redirect('login.php', 'Your Account Has Been Banned Contact With Admin');}
                    $_SESSION['user'] = true;
                    $_SESSION['role'] = $data['role'];
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['name'] = $data['fullname'];

                    redirect('index.php', 'Welcome User');
                }
            } else {
                redirect('login.php', 'Invalid Email OR Password');
            }

        } else {

            redirect('login.php', 'Something Is Wrong');
        }

    } else {
        redirect('login.php', 'Type Your Email And Password ..');
    }
}
