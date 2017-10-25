<?php
session_start();
$id=$_GET['id'];
require_once 'class/news.class.php';
require_once 'class/category.class.php';
$category=new Category();
$catdata=$category->lists();

$news=new News();
$news->id=$id;
$newsdata = $news->getNewsByID();

if (isset($_POST['btnUpdate'])) {
    $news->set('category_id',$_POST['category_id']);
    $news->set('title',$_POST['title']);
    $news->set('short_description',$_POST['short_description']);
    $news->set('description',$_POST['description']);
    if($_FILES['feature_image']['error']==0){
        $name=uniqid().'_'.$_FILES['feature_image']['name'];
        move_uploaded_file($_FILES['feature_image']['tmp_name'], 'images/'.$name);
        $news->set('feature_image',$name);
    }else{
        $news->set('feature_image',$feature_image);
    }
    $news->set('slider_key',$_POST['slider_key']);
    $news->set('feature_key',$_POST['feature_key']);
    $news->set('status',$_POST['status']);
    $news->set('modified_by',$_SESSION['admin_username']);
    $news->set('modified_date',date('Y-m-d H:i:s'));
    $msg =  $news->edit();
}
require_once "header.php";
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News Management </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                     Create News
                 </div>
                 <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if (isset($msg)) {
                                echo $msg;
                            }
                            ?>

                            <form role="form" action="" method="post" id="newsform" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" required="" value="<?php echo $newsdata[0]->title ?>">
                                    </div>  
                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category_id" class="form-control" required="">
                                        <option value="">Select Category</option>
                                        <?php foreach ($catdata as $c) {?>
                                             <option value="<?php echo $c->id ?>" <?php if($c->id==$newsdata[0]->category_id){ echo 'selected'; } ?>><?php echo $c->name ?></option>
                                        <?php } ?>
                                    </select>                                  
                                </div>  
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea class="form-control" name="short_description" rows="5"><?php echo $newsdata[0]->short_description ?></textarea>                                 
                                </div>  
                                <div class="form-group">
                                   <label>Description</label>
                                    <textarea class="form-control ckeditor" name="description"><?php echo $newsdata[0]->description ?></textarea>                              
                                </div>  
                                <div class="form-group">                                    
                                    <div class="row">
                                    	<div class="col-sm-3">
                                    <label>Feature Image</label>
                                    	<div class="thumbnail">
                                    	<img src="images/<?php echo $newsdata[0]->feature_image ?>" class="img-responsive">
                                    </div>
                                    </div>
                                    </div>		
                                    <input type="file" name="feature_image">                                    
                                </div>   

                                <div class="form-group">
                                    <label>Slider Key</label>
                                    <?php if($newsdata[0]->slider_key==1){ ?>
                                    <label class="radio-inline">
                                        <input type="radio" name="slider_key" value="1" checked="">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="slider_key" value="0">No
                                    </label>
                                    <?php }else{?>
                                    	<label class="radio-inline">
                                        <input type="radio" name="slider_key" value="1">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="slider_key" value="0" checked="">No
                                    </label> 
                                    	<?php } ?> 

                                </div>

                                <div class="form-group">
                                    <label>Feature Key</label>
                                     <?php if($newsdata[0]->feature_key==1){ ?>
                                    <label class="radio-inline">
                                        <input type="radio" name="feature_key" value="1" checked="">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="feature_key" value="0">No
                                    </label>
                                    <?php }else{?>
                                    	<label class="radio-inline">
                                        <input type="radio" name="feature_key" value="1">Yes
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="feature_key" value="0" checked="">No
                                    </label> 
                                    	<?php } ?>                                     
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                     <?php if($newsdata[0]->status==1){ ?>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" checked="">Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="0">De Active
                                    </label>
                                    <?php }else{?>
                                    	<label class="radio-inline">
                                        <input type="radio" name="status" value="1">Active
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="0" checked="">De Active
                                    </label> 
                                    	<?php } ?>                               
                                </div>
                                
                                
                                <button type="submit" name="btnUpdate" class="btn btn-info">Update News</button>
                                <button type="reset" class="btn btn-danger">Clear</button>
                            </form>
                        </div>
                        
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<?php require_once "footer.php"; ?>

<script type="text/javascript" src="validation/dist/jquery.validate.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
    $('#newsform').validate();
}); 
</script>