


function addItem() {
    var itemsNumber = document.getElementById("numberOfItems");
    itemsNumber.innerHTML = parseInt(itemsNumber.innerHTML) + 1;
}

function removeItem() {
    var itemsNumber = document.getElementById("numberOfItems");
    if (parseInt(itemsNumber.innerHTML) > 1)
        itemsNumber.innerHTML = parseInt(itemsNumber.innerHTML) - 1;
}


function addToCartHome(name,price) {

    let cartItems = 1;
    let itemsNumber = document.getElementById("numberOfItems");
    let cart = document.getElementById('cartHome');
    if (itemsNumber == null)
    cart.innerHTML = parseInt(cart.innerHTML) + cartItems ;
    
    else{
    cart.innerHTML = parseInt(cart.innerHTML) + parseInt(itemsNumber.innerHTML);
    cartItems = itemsNumber.textContent;
    }

    for (i = 0 ; i < cartItems ; i++){
    let el = document.createElement("p");
    el.textContent = name;


    let item = document.getElementById('item-list');
    let total = document.getElementById('modal-total');


    item.insertBefore(el, total);

    let el2 = document.createElement("p");
    el2.textContent = price;


    let number = document.getElementById('price-list');
    let mealPrice = document.getElementById('modal-0');


    number.insertBefore(el2, mealPrice);
    mealPrice.innerHTML = parseFloat(el2.innerHTML) + parseFloat(mealPrice.innerHTML);
    }

    if (itemsNumber != null)
    itemsNumber.innerHTML = '1';

}

function set() {
    let cart = document.getElementById('cartHome');
    cart.innerHTML = '0';
    cart.display = "";
}

function btOrderNow(myModal, myModal2, cart) {
    document.getElementById('myModal').innerHTML = document.getElementById('myModal2').innerHTML;
    document.getElementById(cart).innerHTML = 0;
    document.getElementById('myModal').hide;

}

function countChars(obj) {
    let review = document.getElementById('review-area');
    let warning = document.getElementById('warning');

    if (review.value.length > 0)
        warning.style.display = "none";

    document.getElementById("charNum").innerHTML = obj.value.length + ' /500';
}
function hide() { document.getElementById("review-f").style.margin = "0px"; }
function showForm() {
    document.getElementById("review-f").style.display = "block";

    setTimeout(hide, 200);

}


function validate() {
    let review = document.getElementById('review-area');
    let warning = document.getElementById('warning');

    if (review.value.length == 0) {
        warning.style.display = "block";
        return false;
    } else return true;

}


// Hamburger

function myFunction() {
    var x = document.getElementById('myTopnav');
    if (x.className === 'topnav') {
        console.log("yay1");
        x.className += " responsive";
    } else {
        console.log("yayw2");
        x.className = "topnav";
    }
}

function selectSection(SectionName) {

  
    if (SectionName == "Description") {
        let section = document.getElementById("description");
        section.style.display = "block";

        let btn1 = document.getElementById('descBtn');
        btn1.classList.add("activated");


        let btn2 = document.getElementById('revBtn');
        btn2.classList.remove("activated");


        let section2 = document.getElementById("review");
        section2.style.display = "none";
    } else {

        let section = document.getElementById("review");
        section.style.display = "block";


        let btn1 = document.getElementById('revBtn');
        btn1.classList.add("activated");


        let btn2 = document.getElementById('descBtn');
        btn2.classList.remove("activated");

        let section2 = document.getElementById("description");
        section2.style.display = "none";
    }
}

function sendItem(id) {
    console.log("Sent");
    let itemsNumber = document.getElementById("numberOfItems").innerHTML;


    console.log(parseInt(itemsNumber));

    for (let i = 0; i <= parseInt(itemsNumber); i++) {
        window.location.href = 'php/cart.php?id=' + id + '&back=' + location.href;
    }

}





function showReviews(id) {

   
    document.getElementById(id).classList.add("activated");
    document.getElementById('descBtn').classList.remove("activated");
    $.ajax({
      url:"php/review.php",
      method:"GET",
      data:{meal_id:id,getMealReviews:true},
      dataType:"json",
      success:function(data){
      if (data==false) {
      $(".reviewMuch").html("<h3>No Reviews</h3>");  
      } else {
      $(".reviewMuch").html('<div class="testimonial-left"><div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"><div class="carousel-indicators whitebutoon"></div><div class="carousel-inner"></div><button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="visually-hidden">Previous</span></button><button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="visually-hidden">Next</span></button></div></div>');  
      data.forEach(function(Value,key){
      var rating = parseInt(Value.rating/20);
      var ratingStar = '';
      for (var j = 0; j < rating; j++) {
      ratingStar += '&#11088;';     
      }
      if (key==0) {
      $(".carousel-indicators").append('<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'+key+'" class="active" aria-current="true" aria-label="Slide '+key+'"></button>');  
      $(".carousel-inner").append('<div class="carousel-item active "><div class="row align-items-center"><div class="col-lg-6 final"><div class="pic"><img class="img-fluid" src="reviewImages/'+Value.image+'"></div></div><div class="col-lg-6"><div class="p2"><h4 class="final1">'+Value.reviewer_name+'</h4><h5 class="final1">'+Value.city+' - '+Value.date+' '+ratingStar+'</h5><p>'+Value.review+' </p></div></div></div></div>');
      } else {
      $(".carousel-indicators").append('<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'+key+'"  aria-current="true" aria-label="Slide '+key+'"></button>');    
      $(".carousel-inner").append('<div class="carousel-item "><div class="row align-items-center"><div class="col-lg-6 final"><div class="pic"><img class="img-fluid" src="reviewImages/'+Value.image+'"></div></div><div class="col-lg-6"><div class="p2"><h4 class="final1">'+Value.reviewer_name+'</h4><h5 class="final1">'+Value.city+' - '+Value.date+' '+ratingStar+'</h5><p>'+Value.review+' </p></div></div></div></div>');
      }
      
      });  
      
      
      
      }
      document.getElementById("description").style.display = "none";
      document.getElementById("review").style.display = "Block";
    
      }
    })
  }

  function show_disc() {
    document.getElementById("description").style.display = "Block";
    document.getElementById("review").style.display = "none";
    document.getElementById('descBtn').classList.add("activated");
  }

  $(document).on("submit","#Form",function(e){
    e.preventDefault();
    var id = $("#id").val();
    $.ajax({
    url:"php/review.php",
    method:"POST",
    data:new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    success:function(data){
    showReviews(id);
    document.getElementById("review").style.display = "none";
    
    }
    });
    });



    
