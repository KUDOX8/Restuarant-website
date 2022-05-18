<?php
include "config.php"; 
include 'meal_db.php';
$db = new Meal_db($connection);
if (isset($_GET['meal_id']) && isset($_GET['getMealReviews'])) {
$getMealReviews=$db->getMealReviews($_GET['meal_id']);
echo json_encode($getMealReviews);
}
if (!empty($_POST)) {
$addMealReview=$db->addMealReview($_FILES['picture'],$_POST['volume'],$_POST['name'],$_POST['review'],$_POST['city'],$_POST['id']);
echo $addMealReview;

}

?>