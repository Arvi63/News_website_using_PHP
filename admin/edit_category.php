 <?php 
@session_start();

$id = $_GET['id'];
require_once 'class/category.class.php';
$category = new Category();
$category->id = $id;

    if(isset($_POST['update'])){
         $category->set('name',$_POST['name']);
         $category->set('rank',$_POST['rank']);
         $category->set('status',$_POST['status']);
         $category->set('modified_by',$_SESSION['admin_username']);
         $category->set('modified_date',date('Y-m-d'));

         $msg = $category->edit();
         
    }




$catdata =  $category->getCategoryByID();
require_once 'header.php';

 ?>


        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> Category Management</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

                 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update category
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                <?php 
                                    if(isset($msg)){
                                        echo $msg;
                                    }
                                 ?>


                                    <form role="form" action='' method='post' id='categoryform'>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" required="" value="<?php echo $catdata[0]->name ?>">
                                        </div>

                                         <div class="form-group">
                                            <label>Rank</label>
                                            <input type='number' class="form-control" name="rank" required="" value="<?php echo $catdata[0]->rank ?>">
                                                                                

                                        </div>
                                        
                                     
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php if($catdata[0]->status == 1) {?>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" checked>Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline2" value="0" >Deactive
                                            </label>
                                         <?php }else{ ?>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline1" value="1" >Active
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="status" id="optionsRadiosInline2" value="0" checked>Deactive
                                            </label>
                                            <?php } ?>
                                          
                                        </div>
                                       
                                        <button type="submit" class="btn btn-info" name="update">Update category</button>
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
         <script type="text/javascript">

            $(document).ready(function(){
                $('#categoryform').validate();
            });
             




         </script>

