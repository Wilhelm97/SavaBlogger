<?php include './inc/header.php' ?>
<?php

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
?>
</br>
<div class="container">
    <div class="row">
        <?php
        if (!isset($_SESSOIN['useremail']) xor isset($_SESSION['username'])) {
            echo '<div class="col-md-8">';
        } else {
            echo ' <div class="col-md-12">';
        };
        ?>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./style/images/xps-computer.jpg" alt="XPS Computer" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Programming</h3>
                        <p>Check out the latest news on programming?</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./style/images/general.jpg" alt="type writer" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>General Talk</h3>
                        <p>What are your friends talking about?</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./style/images/vgComputer.jpg" alt="New York" width="1100" height="500">
                    <div class="carousel-caption">
                        <h3>Gaming</h3>
                        <p>What is happening in the ever expanding world of gaming?</p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <div class="col-md-4">
        <?php
        if (!isset($_SESSOIN['useremail']) xor isset($_SESSION['username'])) {
            echo '
    <div class="container">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title text-center">Sign in</h2>
                    <form class="form" role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="useremail">Email:</label>
                            <input type="text" class="form-control" name="useremail" placeholder="john">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="pass" placeholder="password" title="At least 6 characters with letters and numbers">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-md float-right">Sign In</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    ';
        } else {
        }
        ?>
    </div>
</div>


</div>
</br>


</br>
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card bg-light text-center">
                <div class="card-body ">
                    <h4 class="card-title">Programming</h4>
                    <p class="card-text">Check out the latest news on programming?</p>
                    <a href="program" class="btn btn-dark bg-info " role="button">Programming</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-light text-center">
                <div class="card-body">
                    <h4 class="card-title">General Talk</h4>
                    <p class="card-text">Join the conversation?</p> </br>
                    <a href="genTalk" class="btn btn-dark bg-info" role="button">General</a>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card bg-light text-center">
                <div class="card-body">
                    <h4 class="card-title">Gaming</h4>
                    <p class="card-text">What is happening in the ever expanding world of gaming?</p>
                    <a href="gaming" class="btn btn-dark bg-info" role="button">Gaming</a>

                </div>
            </div>
        </div>
    </div>
</div>
</br>

<?php include './inc/footer.php' ?>