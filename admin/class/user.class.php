<?php 

require_once 'database.php';
class User extends Database{
	public $id,$name,$username,$email,$password,$status,$last_login,$role;

   	function login(){
   		 $sql = "select * from tbl_user where email='$this->email' and password='$this->password' and status=1";
   		$udata= $this->select($sql);
   		if(count($udata)==1){
   			session_start();
   			$_SESSION['admin_username']=$udata[0]->username;
   			$_SESSION['admin_email']=$udata[0]->email;
   			$_SESSION['admin_name']=$udata[0]->name;
   			$_SESSION['admin_role']=$udata[0]->role;
   			header('location:dashboard.php');
   		
   		}else{
   			return 'Login failed';

   		}
   		
   	} 


   	function create(){

   	}


	function edit(){
		
	}


	function remove(){
		
	}


	function lists(){
		
	}

}





 ?>