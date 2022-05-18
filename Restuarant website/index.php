<!DOCTYPE html>
<html lang="en">
<?php
include "php/config.php";
 include 'php/order.php';
 include 'php/meal_db.php';
 $db = new Meal_db($connection);
 include "include/inc.header.php";
 ?>
<head>

    <title>SWE 363</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</«head>


<link rel="stylesheet" href="style.css">
<script src="app.js"></script>

<body>
        <div class="main-section">

            <header>
                <ul>
                    <li>
                        <h1>Party Time</h1>
                    </li>
                    <li>
                        <h3>Buy any 2 burgers nd get 1.5L Pepsi Free</h3>
                    </li>
                    <li><button class="btOrder">Order Now</button></li>
                </ul>



            </header>

        </div>


        <?php
  if (isset($_COOKIE['recent-bought'])) {
    $recent = explode(",", $_COOKIE['recent-bought']);
    echo '
    <div id="gallery" >
        <h2> Your Recent Bought Products</h2>
        <div style="display:flex;">';
                foreach ($recent as $key => $value) {
                $data = $db->getMealById($value);
                echo '
                <div class="card">
                     <a href="detail.php?id='.$data["id"].'"><img src="projectImages/'.$data["image"].'" alt="Meal"></a>
                    <div style="padding: 16px;">
                     <p style="padding-bottom: 16px"><a href="#"> &#11088 '.$data["rating"].' rating</a></p>
                     <p id="meal1" style="padding-bottom: 16px"><strong><a href="#">'.$data["title"].'</a></strong></p>
                     <p style="padding-bottom: 16px"><a href="#">some description</a></p>
                    </div>
                      <p id="cartbtn"><button  id="'.$data["id"].'" onclick="sendItem(this.id)">add to cart</button>
                      <a id="price1" href="#">'.$data["price"].' SAR</a></p>
               </div>
                  ';
                }

echo "</div>
          </div>
";
}
  ?>



    <div id="menu">

        <div class="what-to">
            <h2>Want To Eat</h2>
            <p>Try our most delicious food and usually take minutes to deliver</p>


            <div class="rowS">
                <a href="">Burger</a>
                <a href="">Pizza</a>
                <a href="">Fast Food</a>
                <a href="">Cupcake</a>
                <a href="">Sandwich</a>
                <a href="">Spaghtti</a>
            </div>

        </div>

        <div class="delivery">
            <img src="projectImages/delivery.png" alt="A Delivery Guy">
            <div>
                <h2>We guarantee 30 minuets delivery</h2>
                <p>If you are having a meeting, working late night and need n extra push</p>
            </div>

        </div>
    </div>

    <!-- ------------------------------------------------------------- -->

    <div id="gallery">
        <h2>Our most popular recipes </h2>
        <p>Try our most delicious food and usually take minutes to deliver</p>
     <div class="colm-1">

        <?php
        echo $db->getAllMeals();
        ?>

      </div>
</div>

        <!-- Section -->


        <div id="testImonaials">
            <h2>Clients Testimonaials</h2>


            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" style="background-color: #ffaa00;"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-slide-to="1"
                        style="background-color: #ffaa00;">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-slide-to="2"
                        style="background-color: #ffaa00;">
                    </button>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="man-eating">
                            <img src="projectImages/man-eating-burger.png" alt="Meal 1" style="margin-right: 2rem;">
                            <p>Lorem ipsum dolor sit amet cosectetur adipisicing elit. Optio quibusdam accusamus quas
                                mollitia
                                fugiat
                                distinctio, libero eligendi quis pariatur expedita.</p>

                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="man-eating">
                            <img src="projectImages/man-eating-burger.png" alt="Meal 1" style="margin-right: 2rem;">
                            <p>Lorem ipsum dolor sit amet cosectetur adipisicing elit. Optio quibusdam accusamus quas
                                mollitia
                                fugiat
                                distinctio, libero eligendi quis pariatur expedita.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="man-eating">
                            <img src="projectImages/man-eating-burger.png" alt="Meal 1" style="margin-right: 2rem;">
                            <p>Lorem ipsum dolor sit amet cosectetur adipisicing elit. Optio quibusdam accusamus quas
                                mollitia
                                fugiat
                                distinctio, libero eligendi quis pariatur expedita.</p>

                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>



        </div>


    </div>


    <?php
 require "include/inc.footer.php"
 ?>
</body>
<script>

    $('.carousel').carousel({
        interval: 5000
    });

    $(document).ready(function () {
        $("#myBtn").click(function () {
            $("#myModal").modal();
        });
    });


</script>

</html>
