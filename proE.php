<?php include './inc/header.php' ?>

<div class="container">
    <div class="card">
        <div class="card-header text-center">
            <h2><small>Do you want to change your password?</small></h2>
        </div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="Oldpw">Your Password:</label>
                    <input type="password" class="form-control" id="Oldpw">
                </div>
                <div class="form-group">
                    <label for="Newpw">New Password:</label>
                    <input type="password" class="form-control" id="Newpw">
                </div>
                <div class="form-group">
                    <label for="Newrpw">Re-Enter New Password:</label>
                    <input type="password" class="form-control" id="Newrpw">
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
            </form>

        </div>
    </div>

</div>



<?php include './inc/footer.php' ?>