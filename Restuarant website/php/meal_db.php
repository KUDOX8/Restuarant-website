<?php
	class Meal_db
	{	
		private $connection;
		function __construct($connection)
        {
            $this->connection = $connection;
        }
        function getAllMeals(){
        	$output = '';
        	$fetch = $this->connection->prepare("SELECT * from meal");
            $fetch->execute();
        	while ($value = $fetch->fetch(PDO::FETCH_ASSOC)) {
        	$reviewQr = $this->connection->prepare("SELECT AVG(rating/20) AS rating from reviews WHERE meal_id = '".$value["id"]."'  ");
            $reviewQr->execute();
            $reviewRow = $reviewQr->fetch(PDO::FETCH_ASSOC);
            if (!empty($reviewRow)) {
            $rating = $reviewRow['rating'];
            } else {
            $rating = "0.0";
            }
        	$output.= ' <div class="card">
                     <a href="detail.php?id='.$value["id"].'"><img src="projectImages/'.$value["image"].'" alt="Meal"></a>
                            <div style="padding: 16px;">
                                <p style="padding-bottom: 16px"><a href="#"> &#11088 '.$rating.' rating</a></p>
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
        $fetch = $this->connection->prepare("SELECT * from meal WHERE id = '".$id."'  ");
        $fetch->execute();
        $row = $fetch->fetch(PDO::FETCH_ASSOC);
        $reviewQr = $this->connection->prepare("SELECT AVG(rating/20) AS rating from reviews WHERE meal_id = '".$id."'  ");
        $reviewQr->execute();
        $reviewRow = $reviewQr->fetch(PDO::FETCH_ASSOC);
        if (!empty($reviewRow)) {
        $rating = $reviewRow['rating'];
        } else {
        $rating = "0.0";    
        }  
        include 'meals.php';	
        foreach ($meals as $key => $value) {
        if ($value["id"]==$id) {
        $result = array("title" => $row['title'],"price" => $row['price'],"rating" => $rating,"description" => $row['description'],"image" => $row['image'],"id" => $row['id'],"nutrition"=> $value['nutrition']);    
        
        }	
        }
        return $result;	
        } 

        function getMealReviews($id){
        $fetch = $this->connection->prepare("SELECT * from reviews WHERE meal_id = '".$id."'  ");
        $fetch->execute();
        $result = [];
        while($row = $fetch->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;    
        }
        return $result;   
        }

        function addMealReview($picture,$rating,$reviewer_name,$review,$city,$meal_id){
        $image = $picture['name'];
        $picFile = $picture['tmp_name'];
        move_uploaded_file($picFile, "../reviewImages/".$image);
        $query = $this->connection->prepare("INSERT INTO reviews (reviewer_name,city,rating,image,review,meal_id) VALUES (:reviewer_name,:city,:rating,:image,:review,:meal_id) ");
        $query->bindParam(":reviewer_name",$reviewer_name);   
        $query->bindParam(":review",$review);   
        $query->bindParam(":city",$city);   
        $query->bindParam(":rating",$rating);   
        $query->bindParam(":image",$image);   
        $query->bindParam(":meal_id",$meal_id);
        $query->execute(); 
        return true;  
        }
	}

?>
