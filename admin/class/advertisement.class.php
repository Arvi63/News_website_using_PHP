<?php
require_once "database.php";
class Advertisement extends Database{

	public $id,$title,$rank,$status,$created_by,$modified_by,$created_date,$modified_date;

	function create(){
		$sql = "insert into tbl_advertise (title,link,rank,status,created_date,created_by) values 
		('$this->title','$this->link','$this->rank','$this->status','$this->created_date','$this->created_by')";
		$st = $this->insert($sql);
		if (is_integer($st)) {
			return "Advertisement Inserted with id $st";
		} else {
			echo "Failed to insert Advertisement";
		}
	}

	function remove(){
		$sql="delete from tbl_advertise where id='$this->id'";
		$status = $this->delete($sql);
		if($status){
			header('location:list_ads.php');
		}else{
			return 'Can not delete record!';
		}
	}

	function edit(){
		$sql = "update tbl_advertise set title='$this->title', link='$this->link', rank='$this->rank', status='$this->status', modified_date='$this->modified_date', modified_by='$this->modified_by' where id='$this->id'";
		$st = $this->update($sql);
		if ($st) {
			header('location:list_ads.php');
		} else {
			return "Failed to update Advertisement";
		}
	}

	function lists(){
		$sql = "select * from tbl_advertise order by created_date desc";
		return $this->select($sql);
	}

	function getAdsByID(){
		$sql = "select * from tbl_advertise where id='$this->id'";
		return $this->select($sql);
	}
}

?>