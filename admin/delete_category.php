<?php 

$id = $_GET['id'];
require_once 'class/category.class.php';
$category = new Category();
$category->id = $id;
echo $category->remove();







?>

<a href='list_category.php'>Go Back</a>