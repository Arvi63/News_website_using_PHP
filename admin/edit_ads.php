<?php
session_start();
$id=$_GET['id'];
require_once "class/advertisement.class.php";
$ads = new Advertisement();
$ads->id=$id;
$adsdata = $ads->getAdsByID();

if (isset($_POST['btnUpdate'])) {
	$ads->set('title',$_POST['title']);
	$ads->set('link',$_POST['link']);
	$ads->set('rank',$_POST['rank']);
	$ads->set('status',$_POST['status']);
	$ads->set('modified_by',$_SESSION['admin_username']);
	$ads->set('modified_date',date('Y-m-d H:i:s'));
	$msg =  $ads->edit();
}
require_once "header.php";
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
						Edit Advertisement
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
										<input class="form-control" name="title" required="" value="<?php echo $adsdata[0]->title ?>">

									</div>

									<div class="form-group">
										<label>Link</label>
										<input type="url" class="form-control" name="link" required="" value="<?php echo $adsdata[0]->link ?>">

									</div>

									<div class="form-group">
										<label>Rank</label>
										<input type="number" class="form-control" name="rank" required="" value="<?php echo $adsdata[0]->rank ?>">

									</div>

									<div class="form-group">
										<label>Status</label>

										<?php if ($adsdata[0]->status==1) { ?>
											<label class="radio-inline">
											<input type="radio" name="status" id="status" value="1" checked="">Active
										</label>
										<label class="radio-inline">
											<input type="radio" name="status" id="status" value="0">De Active
										</label>  
										<?php }else{ ?>
										<label class="radio-inline">
											<input type="radio" name="status" id="status" value="1">Active
										</label>
										<label class="radio-inline">
											<input type="radio" name="status" id="status" value="0" checked="">De Active
										</label>    
										<?php } ?>                               
									</div>

									<button type="submit" name="btnUpdate" class="btn btn-info">Update Advertisement</button>
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