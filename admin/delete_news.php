<?php  
$id=$_GET['id'];
require_once 'class/news.class.php';
$news=new News();
$news->id=$id;
echo $news->remove();
?>

<a href="list_news.php">Go Back</a>