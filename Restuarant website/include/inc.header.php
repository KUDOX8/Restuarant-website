 <?php
 
 if (isset($_COOKIE['cart']) && $_COOKIE['cart']!="") {
    $cartVal = $_COOKIE['cart'];  
    $cart = explode(",", $_COOKIE['cart']);
    $cartCounter = count($cart);
    } else {
    $cartVal = "";  
    $cartCounter = 0;  
    }    

 ?>

 
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
     integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>

 <!-- --------------------------------------------Modal--------------------------------------------- -->

 <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cart Content</h4>
                </div>
                <div class="modal-body" style="display: flex; flex-direction: column;">
                    <div id="item-list" style="display:flex; justify-content: space-between; width:100%;">
                        <p>Item</p>
                        
                        <p>Price</p>
                    
                    </div>
                    <?php
                        $price=0;
                        foreach ($cart as $value){
                            
                            $data = $meal->getMealById($value);
                            $priced = $data['price'];
                            $price+=$priced;
                            $name = $data['title'];

                            echo '
                              <div id="price-list" style="display:flex; justify-content: space-between; width:100%;">
                              <p>'.$name.'</p>
                              <p>'.$priced.'</p>
                              </div>
                            ';


                        }

                    ?>


             <div id="price-list" style="display:flex; justify-content: space-between; width:100%;">
                                 <p>Total</p>
                                 <p id="modal-0"><?php echo $price; ?></p>
             </div>
                
                </div>

                <div class="modal-footer">
                <form action="php/order.php" method="POST">
                    <input type="hidden" name="cart" value="<?php echo $cartVal; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <button type="button" class="closeBtn btn-default" data-dismiss="modal">Close</button>
                    <button   type="submit" name="submit" class="orderBtn btn-default">Order Now</button>
</form>
                </div>
            </div>

        </div>
    </div>
    


    <div style="display: flex; justify-content: center; flex-direction: column;">
        <nav class="navbar navbar-expand-lg navbar-dark"
            style="background-color: #281923; opacity: 61%; position: fixed; top: 0; width: 100%; z-index: 1;">
            <a class="navbar-brand" href="#"><img class="barLogo" src="projectImages/logo-White.svg" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" style="color:#fff;"></span>
            </button>
            <div class=" collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="black1" href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="black1" href="index.php#menu">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="black1" href="index.php#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="black1" href="index.php#testImonaials">Testimonaials</a>
                    </li>
                    <li class="nav-item">
                        <a class="black1" href="#contact">Contact us</a>
                    </li>
                    <li class="nav-item">
                        <a class="red1" href="#">Search</a>
                    </li>
                    <li class="nav-item">
                        <a class="red1" href="#">Profile</a>
                    </li>
                    <li class="nav-item">

                        <a class="red1" href="#" style="display: flex; justify-content: center; " id="myBtn"
                            data-toggle="modal" data-target="#myModal">cart
                            <p id="cartHome" ><?php echo $cartCounter;  ?></p>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
