<?php include './inc/header.php' ?>
<?php

?>


</br>
<div class="container">
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">
            <?php
            require_once('./config/_conn.php');
            if (!$conn) {
                die("Connection failed: ");
            }
            $mysql = "SELECT * FROM post WHERE post_type = 'programming'";
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
                <div class="btn-group">
                      <a class="btn btn-outline-info" href="programV?id=' . $row["post_id"] . '?>"role="button">View</a>
        </div>
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
<div class="col-md-2">
</div>
</div>
</div>









<?php include './inc/footer.php' ?>
