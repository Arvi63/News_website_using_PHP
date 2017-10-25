
<?php require_once 'admin/class/category.class.php';
$category = new Category();

require_once 'admin/class/news.class.php';
$news = new News();
$catlist= $category->getActiveCategory();



 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Template Name: News Magazine
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> <?php if (isset($title)) {
  echo $title.'|';
} ?> News Magazine</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />
<script type="text/javascript" src="layout/scripts/jquery.min.js"></script>
<!-- Homepage Specific -->
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.timers.1.2.js"></script>
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.galleryview.2.1.1.min.js"></script>
<script type="text/javascript" src="layout/scripts/galleryviewthemes/jquery.galleryview.setup.js"></script>
<!-- / Homepage Specific -->
</head>
<body id="top">
<div class="wrapper col0">
  <div id="topline">
    <p>Tel: xxxxx xxxxxxxxxx | Mail: info@domain.com</p>
    <ul>
      <li><a href="#">About</a></li>
      <li><a href="#">Service</a></li>
      <li><a href="#">Vacany</a></li>
      <li class="last"><a href="#">Contact</a></li>
    </ul>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper">
  <div id="header">
    <div class="fl_left">
      <h1><a href="index.html"><strong>N</strong>ews <strong>M</strong>agazine</a></h1>
      <p>Truly Nepali News</p>
    </div>
    <div class="fl_right"><a href="#"><img src="images/demo/468x60.gif" alt="" /></a></div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="topbar">
    <div id="topnav">
      <ul>
      <?php 
        if($_SERVER['SCRIPT_NAME']=='/news/index.php'){
          $ca = 'active';
        } else{
          $ca='';
        }

       ?>
        <li class="<?php echo $ca; ?>"><a href="index.php">Home</a></li>
        <?php foreach ($catlist as $cat) { 
         if(isset($_GET['catid']) && $_GET['catid']==$cat->id){
           $cc = 'active';
          }else{
            $cc = '';
          }


          ?>
           
        <li class='<?php echo $cc ?>'><a href="category.php?catid=<?php echo $cat->id; ?>"><?php  echo $cat->name; ?></a></li>
       <?php } ?>

      </ul>
    </div>
    <div id="search">
      <form action="search.php" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" name='search' value="Search Our Website&hellip;" />
          <input type="submit" name="go" id="go" value="Search" />
        </fieldset>
      </form>
    </div>
    <br class="clear" />
  </div>
</div>