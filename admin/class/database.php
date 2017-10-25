<?php

abstract class Database{

	abstract function create();
	abstract function edit();
	abstract function remove();
	abstract function lists();

	function set($var,$value){
		$conn = $this->connect();
		$this->$var = $conn->real_escape_string($value);
	}



	function connect(){
		$conn = new mysqli('localhost','root','','news');

		if($conn->connect_errno !=0){
			die('Database connection failed');
		}
		else{
			return $conn;
		}
	}

	function select($sql){
		$connect = $this->connect();
		$res=$connect->query($sql);
		$data =[];
		if($res->num_rows>0){
			while($obj=$res->fetch_object()){
				array_push($data,$obj);
			}

		}
		return $data;

	}



		function insert($sql){
		$connect = $this->connect();
		$connect->query($sql);
		
		if($connect->affected_rows == 1 && $connect->insert_id>0){
			return $connect->insert_id;
		}
		else{
			return false;
		}
	}
		
		

	


		function delete($sql){
		$connect = $this->connect();
		$connect->query($sql);
		
		if($connect->affected_rows > 0){
			return true;
		}
		else{
			return false;
		}
		
	}	



		function update($sql){
		$connect = $this->connect();
		$connect->query($sql);
		
		if($connect->affected_rows > 0){
			return true;	
		}
		else{
			return false;
		}
		
		

	}


	




	
}






 ?>