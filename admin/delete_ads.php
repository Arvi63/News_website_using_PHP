<?php  
$id=$_GET['id'];
require_once 'class/advertisement.class.php';
$ads=new Advertisement();
$ads->id=$id;
echo $ads->remove();
?>

<a href="list_ads.php">Go Back</a>