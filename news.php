<?php 

  require_once 'admin/class/news.class.php';
  $news = new News();

    require_once 'admin/class/comment.class.php';
    $comment = new Comment();

  $news->set('id',$_GET['id']);
  $n = $news->getNewsByID();
  $title = $n[0]->title;
  require_once 'header.php';
  $comment->set('news_id',$_GET['id']);
  if(isset($_POST['submit'])){
    $comment->set('comment',$_POST['comment']);
    $comment->set('comment_date',date('Y-m-d'));
    $comment->set('name',$_POST['name']);
    $comment->set('email',$_POST['email']);
   
  
    $msg = $comment->create();
     }

     $commentlist = $comment->getCommentByNewsID();
  
 ?>




<div class="wrapper">
  
  <div id="breadcrumb">
    <h1><?php echo $n[0]->title; ?></h1>
    <span style='color:Red'>Posted by:<?php echo $n[0]->created_by; ?>on <?php echo $n[0]->created_date ?></span>
    <img src="admin/images/<?php echo $n[0]->feature_image ?>" width='100' height='100'>
    <p> <?php echo $n[0]->description ?></p>



    <h2>Comments</h2>
    <ul class='commentlist'>
     <?php   if(count($commentlist)==0) { 
        echo 'No comments';
      }


    else { 
       foreach($commentlist as $cm) { ?>
        <li class='comment_odd'> 
            <a href="#"><?php echo $cm->name ?></a> wrote: <br>
            <span><a href="#"> <?php echo $cm->comment_date ?></a> </span>
            <p><?php echo $cm->comment ?></li> </p>
        <?php } } ?>
        

    </ul>




    <h2>Write a comment</h2>
    <form method='post' action=''>
      Name:<input type="text" name="name" id='name' size='22'><br>
      Email: <input type="email" name="email" id='email' required=""><br>
      Comment: <textarea rows="5" cols="50" name='comment'></textarea> <br><br><br>

      <input type="submit" value='submit' name="submit">






    </form>







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


<?php include_once 'footer.php'; ?>