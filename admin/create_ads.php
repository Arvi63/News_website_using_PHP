<?php require_once "header.php"; ?>

<?php
require_once "class/advertisement.class.php";
$ads = new Advertisement();
if (isset($_POST['btnSave'])) {
	$ads->set('title',$_POST['title']);
	$ads->set('link',$_POST['link']);
	$ads->set('rank',$_POST['rank']);
	$ads->set('status',$_POST['status']);
	$ads->set('created_by',$_SESSION['admin_username']);
	$ads->set('created_date',date('Y-m-d H:i:s'));
	$msg =  $ads->create();
}
?>

<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Advertisement Management </h1>
			</div>
			<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						Create Advertisement
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-6">
								<?php
								if (isset($msg)) {
									echo $msg;
								}
								?>

								<form role="form" action="" method="post" id="categoryform">
									<div class="form-group">
										<label>Title</label>
										<input class="form-control" name="title" required="">

									</div>

									<div class="form-group">
										<label>Link</label>
										<input type="url" class="form-control" name="link" required="">

									</div>

									<div class="form-group">
										<label>Rank</label>
										<input type="number" class="form-control" name="rank" required="">

									</div>

									<div class="form-group">
										<label>Status</label>
										<label class="radio-inline">
											<input type="radio" name="status" id="status" value="1">Active
										</label>
										<label class="radio-inline">
											<input type="radio" name="status" id="status" value="0" checked="">De Active
										</label>                                    
									</div>

									<button type="submit" name="btnSave" class="btn btn-info">Save Advertisement</button>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#categoryform').validate();
	}); 
</script>