<?php include './inc/header.php' ?>
<?php require_once './config/_conn.php';
if (isset($_POST) & !empty($_POST)) {
    if ($_POST['pass'] == $_POST['repass']) {
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $useremail = filter_var($username, FILTER_SANITIZE_STRING);
        $useremail = mysqli_real_escape_string($conn, $_POST['useremail']);
        $userpw = md5($_POST['pass']);
        $usertype = 'user';
        $sql = "INSERT INTO users (user_name, user_email, user_pw, user_type) VALUES ('$username', '$useremail','$userpw','user')";
        if ($conn->query($sql) === true) {
            header("location: signin");
        } else {
            echo  '<div class="alert alert-danger"> <strong>' . $sql . '</strong>' . $conn->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-info"><strong>The passwords did not match. </strong> Please try again!</div>';
    }
}



?>
</br>
<!-- input userName, userEmail and userPw -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <p>Info side</p>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Join the Sava Team</h2>
                    <form class="form" role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="username">User Name:</label>
                            <input type="text" class="form-control" name="username" placeholder="john">
                        </div>
                        <div class="form-group">
                            <label for="username">Email:</label>
                            <input type="text" class="form-control" name="useremail" placeholder="john">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="pass" placeholder="password"
                                    title="At least 6 characters with letters and numbers">
                            </div>
                            <div class="form-group">
                                <label for="rePassword">Verify Password:</label>
                                <input type="password" class="form-control" name="repass"
                                    placeholder="password (again)">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-md float-right">Sign Up</button>
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
