<?php 
require_once 'database.php';
class Comment extends Database {
	public $id,$news_id,$name,$email,$status,$comment_date,$comment;

	function create(){
		$sql= "insert into tbl_comment (id,news_id,comment,comment_date,name,email,status) 
		values('$this->id','$this->news_id','$this->comment','$this->comment_date','$this->name' ,'$this->email','$this->status')";

		$st = $this->insert($sql);

		if(is_integer($st)) {
			return "Comment inserted with id $st";
		} else{
			echo "Failed to insert comment";
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
		$sql = "select * from tbl_comment order by comment_date";
		  return $this->select($sql);
	}


	function getCommentByNewsID(){
		$sql = "select * from tbl_comment where news_id='$this->news_id '";
		  return $this->select($sql);
		  
	}




	function getActiveCategory(){
		$sql = "select * from tbl_category where status=1 order by rank";
		  return $this->select($sql);
	}





}






 ?>