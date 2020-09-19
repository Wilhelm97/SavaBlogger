<?php include './inc/header.php' ?>
<?php

if (isset($_SESSION['useremail']) xor isset($_SESSION['username'])) {
    session_destroy();
}
require_once './config/_conn.php'; // connection to the database
if (isset($_POST) & !empty($_POST)) {
    $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
    $userpw = md5($_POST['pass']);

    $sql = "select * from users where user_email='$useremail' and user_pw='$userpw'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        $_SESSION['useremail'] = $useremail;
        header("location: profile");
    } else {
        echo "<script> alert('Invalid Username or Password'); </script> ";
    }
}
if (isset($_SESSION['username'])) {
    echo "<script> alert('User is Already signed in'); </script> ";
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Please Sign in</h2>
                    <form class="form" role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="useremail">Email:</label>
                            <input type="text" class="form-control" name="useremail" placeholder="john">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="pass" placeholder="password"
                                    title="At least 6 characters with letters and numbers">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-md float-right">Sign In</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>






<?php include './inc/footer.php' ?>
