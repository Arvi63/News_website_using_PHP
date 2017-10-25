<?php 

require_once 'admin/class/category.class.php';
 $id = $_GET['catid'];
$category = new Category();
$category->id = $id;
$cname = $category->getCategoryName();
$title = $cname[0] ->name; 

require_once 'header.php';
 
  $news->set('category_id',$_GET['catid']);
  $cnews = $news->getNewsByCategoryID();

 ?>

<div class="wrapper">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>
      <li>&#187;</li>
      <li><a href="#">Grand Parent</a></li>
      <li>&#187;</li>
      <li><a href="#">Parent</a></li>
      <li>&#187;</li>
      <li class="current"><a href="#">Child</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div class="container">
  
    <ul>
    <?php foreach ($cnews as $cn) { ?>
       <a href="news.php"><li><?php echo $cn->title; ?></li> </a>
    <?php } ?>
    </ul>
    
    <br class="clear" />
  </div>
</div>
<?php include_once 'footer.php'; ?>