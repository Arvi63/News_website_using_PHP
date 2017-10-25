<?php 
require_once 'database.php';
class Category extends Database {
	public $id,$name,$rank,$status,$created_by,$modified_by,$created_date,$modified_date;

	function create(){
		$sql= "insert into tbl_category (name,rank,status,created_by,created_date) 
		values('$this->name','$this->rank','$this->status','$this->created_by','$this->created_date')";

		$st = $this->insert($sql);

		if(is_integer($st)) {
			return "Category inserted with id $st";
		} else{
			echo "Failed to insert category";
		}
   	}


	function edit(){
		$sql = "update tbl_category set name='$this->name',rank='$this->rank',status='$this->status',modified_by='$this->modified_by',modified_date='$this->modified_date' where id='$this->id'";
		$st = $this->update($sql);
		if($st){
			header ('location:list_category.php');
		} else{
			return 'Failed to update result';
		}
		
	}


	function remove(){
		$sql= "delete from tbl_category where id='$this->id'";
		$status = $this->delete($sql);
		if ($status){
			header ('location:list_category.php');
		}else {
			return "Cannot delete record";
		}
	}


	function lists(){
		$sql = "select * from tbl_category order by name";
		  return $this->select($sql);
	}


	function getCategoryByID(){
		$sql = "select * from tbl_category where id='$this->id '";
		  return $this->select($sql);
	}




	function getActiveCategory(){
		$sql = "select * from tbl_category where status=1 order by rank";
		  return $this->select($sql);
	}



	function getCategoryName(){
		$sql = "select * from tbl_category where status=1 ";
		print_r($sql);
		  return $this->select($sql);
	}



}






 ?>