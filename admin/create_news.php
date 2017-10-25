
 <?php require_once 'header.php'; ?>

<?php 

    require_once 'class/category.class.php';
    $category = new Category();
    $catlist = $category->lists();

    require_once 'class/news.class.php';
    $news = new News();
    if(isset($_POST['save'])){
         $news->set('title',$_POST['title']);
         $news->set('category_id',$_POST['category_id']);
         $news->set('description',$_POST['description']);
         $news->set('short_description',$_POST['short_description']);
         if($_FILES['feature_image']['error']==0){
            $name = uniqid().'_'.$_FILES['feature_image']['name'];
            move_uploaded_file($_FILES['feature_image']['tmp_name'], 'images/'.$name);
                     $news->set('feature_image',$name);
         }
            
        
         $news->set('slider_key',$_POST['slider_key']);
         $news->set('feature_key',$_POST['feature_key']);
         $news->set('status',$_POST['status']);
         $news->set('created_by',$_SESSION['admin_username']);
         $news->set('created_date',date('Y-m-d'));

         $msg = $news->create();
         
    }






 ?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">News Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            create News
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                <?php 
                                    if(isset($msg)){
                                        echo $msg;
                                    }
                                 ?>


                                    <form role="form" action='' method='post' id='categoryform' enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Category</label>
                                           <select id='category_id' name='category_id' class='form-control'>
                                               <option value=''>Select category</option>
                                               <?php foreach ($catlist as $key => $c) { ?>
                                                   <option value='<?php echo $c->id; ?>'><?php echo $c->name; ?></option>
                                               <?php } ?>


                                           </select>
                                        </div>

                                         <div class="form-group">
                                            <label>Title</label>
                                            <input type='text' class="form-control" name="title" required="">
                                                                
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Short description</label>
                                            <textarea  class="form-control" name="short_description"></textarea> 
                                                                
                                        </div>

                                          <div class="form-group">
                                            <label>Description</label>
                                            <textarea  class="form-control ckeditor" name="description"></textarea> 
                                                                
                                        </div>


                                          <div class="form-group">
                                            <label>Feature Image</label>
                                            <input type='file'  class="form-control" name="feature_image">
                                                                
                                        </div>

                                     
                                        <div class="form-group">
                                            <label>Status</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" >Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline2" value="0" checked>Deactive
                                            </label>
                                          
                                        </div>

                                         <div class="form-group">
                                            <label>Slider Key</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="slider_key" id="slider_key" value="1" >Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="slider_key" id="slider_key" value="0" checked>No
                                            </label>
                                          
                                        </div>


                                        <div class="form-group">
                                            <label>Feature Key</label>
                                            <label class="radio-inline">
                                                <input type="radio" name="feature_key" id="feature_key" value="1" >Yes
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="feature_key" id="feature_key" value="0" checked>No
                                            </label>
                                          
                                        </div>




                                       
                                        <button type="submit" class="btn btn-info" name="save">Save category</button>
                                        <button type="reset" class="btn btn-danger">Clear</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
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

         <?php require_once 'footer.php'; ?>

         <script type="text/javascript" src='validation/dist/jquery.validate.min.js'></script>
         <script type="text/javascript" src='ckeditor/ckeditor.js'></script>
         <script type="text/javascript">

            $(document).ready(function(){
                $('#categoryform').validate();
            });
             




         </script>
