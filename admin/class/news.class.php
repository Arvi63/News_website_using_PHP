


<?php 
require_once 'database.php';
class News extends Database {
	public $id,$title,$category_id,$status,$slider_key,$feature_key,$feature_image,$short_description,$description,$created_by,$modified_by,$created_date,$modified_date;

	function create(){
		$sql= "insert into tbl_news (category_id,title,short_description,description,feature_image,status,slider_key,feature_key,created_by,created_date) 
		values('$this->category_id','$this->title','$this->short_description','$this->description','$this->feature_image','$this->status','$this->slider_key','$this->feature_key','$this->created_by','$this->created_date')";

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
		$sql = "select n.* ,c.name as cname from tbl_news n join tbl_category c on n.category_id=c.id order by n.created_date ";
		return $this->select($sql);
	}


	function getCategoryByID(){
		$sql = "select * from tbl_category where id='$this->id'";
		return $this->select($sql);
		
	}




	function getSliderNews(){
		$sql = "select n.* ,c.name as cname from tbl_news n join tbl_category c on n.category_id=c.id 
		where n.slider_key=1 and n.status=1 order by n.created_date desc limit 5";
		return $this->select($sql);
	}



	function getLatestNews(){
		$sql = "select n.* ,c.name as cname from tbl_news n join tbl_category c on n.category_id=c.id 
		where n.status=1 order by n.created_date desc limit 3";
		return $this->select($sql);
	}



	function getFeatureNews(){
		$sql = "select n.* ,c.name as cname from tbl_news n join tbl_category c on n.category_id=c.id 
		where n.feature_key=1 and n.category_id='$this->category_id' and  n.status=1 order by n.created_date desc limit 1";
		return $this->select($sql);
	}


	function getNewsByCategoryID($index=0){
		$sql = "select * from tbl_news where status=1 and category_id='$this->category_id' order by created_date limit 2
		offset $index";
		return $this->select($sql);
	}



	function getNewsByID(){
		$sql = "select * from tbl_news	 where id='$this->id '";
		return $this->select($sql);
		
	}

	function getNewsBySearchTitle(){
		$sql = "select * from tbl_news where status=1 and title like '%$this->title%' order by created_date";
		return $this->select($sql);
	}






}






?>












