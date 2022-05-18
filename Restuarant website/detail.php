<?php 
include "php/config.php"; 
include 'php/meal_db.php';
$meal = new Meal_db($connection);
include 'include/inc.header.php';
$id = $_GET['id'];
$data = $meal->getMealById($id);
?>
<style>
<?php
 include "detailStyle.css"
 ?>
 </style>

<script>
<?php
 include "app.js"
 ?>
 </script>



<!DOCTYPE html>
<html lang="en">

<head>
  

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

</head>



<body onload="set()">


 


    <div class="order">


        <img src="projectImages/<?php echo $data['image'];  ?>" alt="burger meal">
        <div class="meal-info">
            <ul>
                <li>
                    <h2><?php echo $data['title'];  ?></h2>
                </li>
                <li>
                    <p><?php echo $data['price'];  ?> SAR</p>
                </li>
                <li>
                    <p>&#11088 <?php echo $data['rating'];  ?> rating</p>
                </li>
                <li>
                    <p><?php echo $data['description'];  ?></p>
                </li>
                <li><button class="b1" id="remove" onclick="removeItem();">-</button>
                    <button class="b1" id="numberOfItems">1</button>
                    <button class="b1" id="add" onclick="addItem();">+</button>
                    <button class="b2" onclick="sendItem(this.id);" id="<?php echo $data['id']?>">Add to cart</button>
                </li>
            </ul>




        </div>
    </div>

    <div class="wrapper">
        <h2 onclick="show_disc()" id="descBtn" class="activated">Description</h2>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <h2 id = "<?php echo $data['id'];  ?>"  onclick="showReviews(this.id)">Reviews</h2>
    </div>


    <div class="description" id="description">


        <p id="contactUs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem impedit nihil modi.
            Optio aliquid consequuntur repudiandae vel voluptas! Voluptatibus, a? Aut quasi esse non praesentium
            nobis? Nisi non possimus provident!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis neque obcaecati laudantium qui quam
            totam eaque. Unde dolorum consectetur similique minus, vero vel maxime, ab aspernatur expedita aliquam
            recusandae quod.</p>
        <p><b>nutrition facts</b></p>



        <!--Table Section-->
        <div class="table1">
            <table>
                <tr>
                    <td colspan="3"><b>SupplementFacts</b></td>
                </tr>
                <tr>
                    <td colspan="3"><b>Serving Size: </b> <?php echo $data['nutrition']['serving_size'];  ?></td>
                </tr>
                <tr>
                    <td colspan="3"><b>Serving Per Container: </b> <?php echo $data['nutrition']['serving_per_container'];  ?></td>
                </tr>
                <tr>
                    <td style="width: 200px;"></td>
                    <th style="width: 200px;">Amount Per Serving</th>
                    <th style="width: 200px;">%Daily Value*</th>
                </tr>
 <?php
        foreach ($data['nutrition']['facts'] as $key => $value) {
        ?>
        <TR>
          <Td> <?php echo $value['item']; ?> </Td>
          <Td> <?php echo $value['amount_per_serving']; ?><?php echo $value['unit']; ?>  </Td>
          <Td> <?php echo $value['daily_value']; ?> </Td>
        </TR>
        <?php
        }
        ?>
                <td colspan="3">*Percent Daily Values are based on a 2,000 calorie diet. Your daily values may be
                    higher or lower depending on your calorie needs</td>

            </table>

        </div>
    </div>
    
    <div class="review" id="review">
        <div class="reviewMuch">
        <div class="testimonial-left">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators whitebutoon">
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active ">
                <div class="row align-items-center">
            <div class="col-lg-6 final">
              <div class="pic">
                <img class="img-fluid" src="projectImages/<?php echo $data['reviews']['image'];  ?>">
              </div>
            </div>
            <div class="col-lg-6">
              <div class="p2">
                <h4 class="final1"><?php echo $data['reviews']['reviewer_name'];  ?></h4>
                <h5 class="final1"><?php echo $data['reviews']['city'];  ?> - <?php echo $data['reviews']['date'];  ?> <?php echo $data['reviews']['rating'];  ?></h5>
                <p><?php echo $data['reviews']['review'];  ?> </p>
              </div>
            </div>
          </div>
              </div>

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>   
        </div>

        <button class="addBtn" onclick="showForm();">Add Your Review</button>

        <form action="POST"  id="Form" >

            <div id="review-f">
                <div class="f-element">
                    <label for="file">Image</label>
                    <input type="file" name="file">
                </div>

                <div class="f-element">
                    <label for="thickmarks">Rate the Food</label>
                    <input type="range" list="tickmarks">

                    <datalist id="tickmarks">
                        <option value="0" label="0%"></option>
                        <option value="10"></option>
                        <option value="20"></option>
                        <option value="30"></option>
                        <option value="40"></option>
                        <option value="50" label="50%"></option>
                        <option value="60"></option>
                        <option value="70"></option>
                        <option value="80"></option>
                        <option value="90"></option>
                        <option value="100" label="100%"></option>
                    </datalist>
                </div>

                <div class="f-element">
                    <label for="name">Name</label>
                    <input type="text" name="name" placeholder="First name and Last name">
                </div>

                <div class="f-element">
                    <label for="city">City:</label>
                    <input type="text" name="city" placeholder="City">
                </div>


                <div class="f-element">
                    <label for="review">Review</label>
                    <p id="warning">Please type your review</p>
                    <textarea id="review-area" id="review" cols="30" rows="10" maxlength="500"
                        placeholder="Type your review here max 500 charechters" onkeyup="countChars(this)"></textarea>
                    <p id="charNum">0 /500</p>
                </div>
                <input type="hidden" name="id" id="id" value="<?php echo $data['id'];  ?>">
                <button type="submit" name=submit class="submit">Submit</button>
            </div>
        </form>


    </div>

   

    <?php
 require "include/inc.footer.php"
 ?>

</body>



</html>
