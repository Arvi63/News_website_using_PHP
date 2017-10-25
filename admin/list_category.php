
 <?php require_once 'header.php'; ?>
 <?php
    require_once 'class/category.class.php';
    $category = new Category();
    $data = $category->lists();
    

   ?>

    <!-- DataTables CSS -->
    <link href="vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Category</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Category Listing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Rank</th>
                                        <th>Status</th>
                                        <th>Created by</th>
                                        <th>Modified by</th>
                                        <th>Created Date</th>
                                        <th>Modified Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i=1;
                                 foreach ($data as $key => $d) { ?>
                                       <tr class="odd gradeX">
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $d->name; ?></td>
                                        <td><?php echo $d->rank; ?></td>
                                        <td class="center"> <?php if($d->status==1){                                      

                                         echo "<label class='label label-success'> active </label>";
                                         }else {  
                                          echo "<label class='label label-danger'> deactive </label>";
                                            }
                                   
                                        ?> 

                                        </td>
                                        <td class="center"><?php echo $d->created_by; ?></td>
                                        <td><?php echo $d->modified_by; ?></td>
                                        <td><?php echo $d->created_date; ?></td>
                                        <td><?php echo $d->modified_date; ?></td>
                                        <td> <a href="edit_category.php?id=<?php echo $d->id?>" class='btn btn-warning'>
                                   <i class="fa fa-pencil"></i>Edit/</a>
                                        <a href="delete_category.php?id=<?php echo $d->id?>" class='btn btn-danger'
                                        onclick="return confirm('Are you sure to delete this?');"> <i class="fa fa-trash"></i>delete</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

         <?php require_once 'footer.php'; ?>


         <!-- DataTables JavaScript -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

     <script>
    $(document).ready(function() {
        $('#categorytable').DataTable({
            responsive: true
        });
    });
    </script>


