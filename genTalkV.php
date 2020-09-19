<?php include './inc/header.php' ?>


<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "./config/_conn.php";

    // Prepare a select statement
    $sql = "SELECT * FROM post WHERE post_id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $post_id = $row['post_id'];
                $post_title = $row["post_title"];
                $post_content = $row["post_content"];
                $post_userName = $row["post_userName"];
                $post_created = $row["post_created"];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    // mysqli_stmt_close($stmt);
    mysqli_stmt_close($stmt);
    // Close connection
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<?php
require_once './config/_conn.php';
if (isset($_POST['submit']) & !empty($_POST['submit'])) {
    $comPost = mysqli_real_escape_string($conn, $_POST['comment']);
    $sql = "INSERT INTO comments (post_id,com_post) VALUES ('$post_id','$comPost')";
    if ($conn->query($sql) === true) {
        echo ' <div class="container">
        <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Your comment was successful</strong>
        </div>
        </div>
        ';
        header("Refresh:1");
    } else {
        echo '<div class="alert alert-danger">
        <strong>' . $sql . '</strong>' . $conn->error .
            '</div>';
    }
}

?>

<div class="container">
    <p><a href="genTalk" class="btn btn-outline-primary">Back</a></p>
    <div class="card ">
        <div class="card-body" style="color:black;">
            <h4 class="card-title text-center"><?php echo $post_title ?></h4>
            <p class="card-text text-center">
            <p><?php echo $post_content ?> </p>
            </p>
            <p class="card-text text-center"><small> Author: <?php echo $post_userName ?> Created:
                    <?php echo $post_created ?> </small></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="blog">Comment:</label>
                    <textarea class="form-control" rows="3" name="comment" id="comment"></textarea>
                </div>

                <button type="submit" name="submit" value="submit" class="btn btn-outline-success">Submit</button>
            </form>
            </br>
        </div>

        <div class="col-md-3">

        </div>
    </div>
    <div class="row">

        <div class="col-md-2">

        </div>

        <div class="col-md-8">
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM comments WHERE post_id = $post_id";
            $results = mysqli_query($conn, $mysql);
            if (mysqli_num_rows($results) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($results)) {

                    echo '
            <div class="card">
            <div class="card-body" style="color:black;">
                <h4 class="card-title"> ' . $post_userName . '</h4>
                <p class="card-text text-center"><p>' . $row['com_post'] . '  </ p></p>
                <p class="card-text text-center"><small>Posted: ' . $row['com_created'] . '</small></p>
    </div>
</div>
</br>
';
                }
            } else {
            }
            ?>
        </div>
        <div class="col-md-2">

        </div>


    </div>
</div>
</div <?php include './inc/footer.php' ?>
