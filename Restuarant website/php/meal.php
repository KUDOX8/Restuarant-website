<?php
	
	class meal
	{
		private $meal;
		function __construct()
        {
        	include 'meals.php';
            $this->meal = $meals;
        }
        function getAllMeals(){
        	$output = '';
            
        	foreach ($this->meal as $key => $value) {
         
             
               
                
                $output.= '         
          
                <div class="card">
        
                <a href="detail.php?id='.$value["id"].'"><img src="projectImages/'.$value["image"].'" alt="Meal"></a>
               
                
                <div style="padding: 16px;">
                    <p style="padding-bottom: 16px"><a href="#"> &#11088 '.$value["rating"].' rating</a></p>
                    <p id="meal1" style="padding-bottom: 16px"><strong><a href="#">'.$value["title"].'</a></strong></p>
                    <p style="padding-bottom: 16px"><a href="#">some description</a></p>
                    </div>

                    <p id="cartbtn"><button  id="'.$value["id"].'" onclick="sendItem(this.id)">add to cart</button>
                    <a id="price1" href="#">'.$value["price"].' SAR</a></p>
                
                    </div>
                
                ';
            }
            return $output;
          
        }
        function getMealById($id){
        foreach ($this->meal as $key => $value) {
        if ($value["id"]==$id) {
        return $value;
        }	
        }	
        } 

	} 


?>
