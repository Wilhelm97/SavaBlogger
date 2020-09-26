<?php include './inc/header.php' ?>
</br>
<div class="container">
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
<div id="counter">
    Counter: {{ counter }}

</div>


<?php include './inc/footer.php' ?>