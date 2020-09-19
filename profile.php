<?php include './inc/header.php' ?>
<?php
if (!isset($_SESSION['useremail'])) {
    header('location: index');
} ?>

<?php
require_once './config/_conn.php';
if (!isset($_SESSION['useremail'])) {
} else {
    $check = "SELECT * FROM users where user_email = '$_SESSION[useremail]' ";
    $result = $conn->query($check);

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
            $username = $row['user_name'];
            $usertype = $row['user_type'];
            $_SESSION['usertype'] = $usertype;
            $_SESSION['username'] = $username;
            echo "
                        <h1 style='text-align:center;' >" . $username . "</h1>
                    ";
        }
    } else {
        echo "0 results";
    }
}

?>
<?php
require_once('./config/_conn.php');
if (isset($_POST['submit']) & !empty($_POST['submit'])) {
    $postTitle = mysqli_real_escape_string($conn, $_POST['title']);
    $postContent = mysqli_real_escape_string($conn, $_POST['blog']);
    $postType = mysqli_real_escape_string($conn, $_POST['type']);
    $sql = "INSERT INTO post (post_title,post_content,post_type,post_userName) VALUES ('$postTitle','$postContent','$postType','$_SESSION[username]')";
    if ($conn->query($sql) === true) {
        echo ' <div class="container">
        <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Added to blog list</strong>
        </div>
        </div>
        ';
        // header("Refresh:5");
    } else {
        echo '<div class="alert alert-danger">
        <strong>' . $sql . '</strong>' . $conn->error .
            '</div>';
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <!-- <?php echo '' . $_SESSION['username'] . '' ?> -->
            <!-- <?php echo '' . $_SESSION['usertype'] . '' ?> -->

        </div>

        <div class="col-sm-6">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" placeholder="" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="type">Type of content:</label>
                    <select class="form-control" name="type" id="type">
                        <option>General</option>
                        <option>Tech News</option>
                        <option>Gaming News</option>
                        <option>Programming News</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="blog">Post:</label>
                    <textarea class="form-control" rows="3" name="blog" id="blog"></textarea>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-info">Submit</button>
            </form>
            </br>
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM post WHERE post_userName = '$_SESSION[username]'";
            $results = mysqli_query($conn, $mysql);
            if (mysqli_num_rows($results) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($results)) {

                    echo '
            <div class="card">
            <div class="card-body" style="color:black;">
                <h4 class="card-title">' . $row['post_title'] . '</h4>
                <p class="card-text text-center"><p> ' . $row['post_content'] . ' </ p></p>
                <p class="card-text text-center"><small> Author: ' . $row['post_userName'] . ' Created: ' . $row['post_created'] . '</small></p>
            </div>
        </div>
            </br>
';
                }
            } else {
                echo "0 results";
            }
            ?>

        </div>
        <div class="col-sm-3">

        </div>
    </div>
</div>








<?php include './inc/footer.php' ?>
